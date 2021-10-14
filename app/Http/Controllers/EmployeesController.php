<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Financing;
use App\Models\PayrollEmployee;
use App\Models\User;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str as Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class EmployeesController extends Controller
{
    /** Home del Empleado
     *** Perfil: Empleado ***/
    public function index()
    {
        $user = Auth::user();
        $fechaActual = Carbon::now();
        $fechaUser = new Carbon($user->admission_date);
        $fechaUser->addYear(1);

        $project = Project::where('user_id', Auth::id());
        $payrolls = PayrollEmployee::where('user_id', Auth::id());
        $proyects_user = Auth::user()->projects;
        $user = Auth::user();

        return view('employee.home')->with(compact('project', 'payrolls', 'user', 'proyects_user', 'fechaUser'));
    }

    /** Listado de Empleados
     *** Perfil: Admin ***/
    public function list()
    {
        $employees = User::where('profile_id', '=', 3)->paginate(10);

        return view('admin.employees.list')
            ->with('employees', $employees);
    }

    

    /** Crear nuevo empleado
     *** Perfil: Admin ***/
    public function create()
    {
        $skills = DB::table('skills')
            ->orderBy('skill', 'ASC')
            ->get();

        return view('admin.employees.create')->with(compact('skills'));
    }

    /** Editar datos de un empleado
     *** Perfil: Admin ***/
    public function edit($id)
    {
        $employee = User::find($id);
        return view('admin.employees.edit', compact('employee'));
    }

        /** Guardar datos modificados de un empleado
     *** Perfil: Admin ***/
    public function update(Request $request, $id)
    {
        // dd($request);
        $employee = User::find($id);
        $msj = [
            'name.required' => 'El nombre es requerido.',
            'name.max' => 'El nombre debe tener como máximo 50 caracteres.',
            'last_name.required' => 'El apellido es requerido.',
            'last_name.max' => 'El apellido debe tener como máximo 50 caracteres.',
            'email.unique' => 'El correo ya se encuentra registrado.',
            'phone' => 'El teléfono es requerido',
            'photo.mimes' => 'Archivos no permitido, solo jpeg, jpg y png',
            'photo.max' => 'La imagen no debe ser mayor de 2048 Kilobytes'
        ];
        $validate = $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'last_name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $employee->id . ',id'],
            'phone' => ['required', 'string', 'max:18'],
            'photo' => ['nullable', 'mimes:jpeg,png', 'max:2048']
        ], $msj);

        if ($validate) {
            $employee->update($request->all());
            $employee->slug = Str::slug($request->name . "-" . $request->last_name);
            if ($request->hasFile('photo')) {
                $file = $request->file('photo');
                $name = $employee->id . "." . $file->getClientOriginalExtension();
                $file->move(public_path('storage') . '/photo-profile', $name);
                $employee->photo = $name;
            }
            $employee->save();
            return redirect()->route('admin.employees.list')->with('message', 'Se actualizó el Empleado Exitosamente');
        }
    }

    /** Guardar datos del nuevo empleado
     *** Perfil: Admin ***/
    public function store(Request $request)
    {
        $employee = new User($request->all());

        $employee->slug = Str::slug($request->name . "-" . $request->last_name);

        $employee->password = Hash::make($request->password);

        $employee->profile_id = 3;

        $employee->save();

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $name = $employee->id . "." . $file->getClientOriginalExtension();
            $file->move(public_path() . '/uploads/images/users/photos', $name);
            $employee->photo = $name;
        }

        if ($request->hasFile('curriculum')) {
            $file2 = $request->file('curriculum');
            $name2 = $employee->id . "." . $file2->getClientOriginalExtension();
            $file2->move(public_path() . '/uploads/documents/curriculums', $name2);
            $employee->curriculum = $name2;
        }

        $employee->save();

        if (!is_null($request->skills)) {
            foreach ($request->skills as $skill) {
                DB::table('skills_users')->insert(
                    ['skill_id' => $skill, 'user_id' => $employee->id]
                );
            }
        }

        return redirect()->route('admin.employees.list')->with('msj-exitoso', 'true');
    }

    /** Ver datos de un empleado
     *** Perfil: Admin ***/
    public function show($slug, $id)
    {
        $employee = User::where('id', '=', $id)
            ->with('projects', 'skills')
            ->withCount('skills')
            ->first();

        $fechaActual = Carbon::now();
        $fechaUser = new Carbon($employee->admission_date);
        $fechaUser->addYear(1);

        $projectsID = array();

        foreach ($employee->projects as $project) {
            array_push($projectsID, $project->id);
        }

        $availableProjects = Project::whereNotIn('id', $projectsID)->get();
        $facturas = Bill::where('user_id', $id)->get();
        $projectColors = ['#FF3F3F', '#12A0B4', '#940385'];
        $financiamiento = Financing::where(['user_id' => $id, 'status' => '0'])->sum('total_amount');

        return view('admin.employees.show')->with(compact('employee', 'projectColors', 'availableProjects', 'fechaUser', 'facturas', 'financiamiento'));
    }

    /** Asignar proyecto a un empleado
     *** Perfil: Admin ***/
    public function assign_projects(Request $request)
    {
        $fecha = date('Y-m-d H:i:s');
        if (!is_null($request->projects)) {
            foreach ($request->projects as $project) {
                DB::table('projects_users')->insert(
                    ['project_id' => $project, 'user_id' => $request->employee_id, 'created_at' => $fecha, 'updated_at' => $fecha]
                );
            }

            return redirect()->back()->with('msj-exitoso', 'true');
        }
    }
    public function profile()
    {

        $user = Auth::user();
        $fechaActual = Carbon::now();
        $fechaUser = new Carbon($user->admission_date);
        $fechaUser->addYear(1);

        $project = Project::all()->where('user_id', Auth::user()->id);

        $skillsActivos = [];
        foreach ($user->skills as $skill) {
            array_push($skillsActivos, $skill->id);
        }
        $availableSkills = DB::table('skills')
            ->orderBy('skill', 'ASC')
            ->get();

        $itemColors = ['#FF3F3F', '#12A0B4', '#940385'];

        return view('landing.profile.profile')
            ->with(compact('user', 'skillsActivos', 'project', 'availableSkills', 'itemColors', 'fechaUser'));
    }

    public function editPhone(Request $request)
    {

        $user = Auth::user();
        $user->update($request->all());
        $user->phone = $request->phone;
        $user->save();

        return redirect()->back()->with('message','Se actualizo tu perfil');
    }

    /*actualizar los skills*/
    public function update_skills(Request $request)
    {
        $user = User::find($request->user_id);/*buscar el usuario legeado*/

        DB::table('skills_users')
            ->where('user_id', '=', $user->id)
            ->delete();
        if (!is_null($request->skills)) {
            foreach ($request->skills as $skill) {
                $user->skills()->attach($skill);
            }
        }

        return redirect()->back()->with('msj-exitoso', 'true');
    }

    public function update_wallet(Request $request)
    {

        // $user = User::find($request);

        // DB::table('users')
        // ->where('user_id', '=', $user->id)
        // ->delete();
        // if (!is_null($request->	tron_wallet)){
        // foreach ($request->	tron_wallet as $wallet){
        //     $user->	tron_wallet()->attach($wallet);
        // }
        //}

        $user = Auth::user();

        $user->update($request->all());

        $user->tron_wallet = $request->tron_wallet;

        $user->save();


        return redirect()->back()->with('msj-exitoso', 'Billetera Guardada Exitosamente');
    }

    public function upload_curriculum(Request $request)
    {

        $user = User::find(Auth::user()->id);

        $user->update($request->all());

        if ($request->hasFile('archivo')) {
            $file = $request->file('archivo');
            $name = $user->id . "." . $file->getClientOriginalExtension();
            $file->move(public_path('storage') . '/flie-curriculum', $name);
            $user->curriculum = $name;
        }


        $user->save();

        return redirect()->route('employee.profile')->with('message', 'Se actualizo tu perfil');
    }
}
