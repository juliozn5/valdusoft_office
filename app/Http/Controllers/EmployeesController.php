<?php

namespace App\Http\Controllers;

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
        $project = Project::all()->where('user_id', Auth::user()->id);
        $payrolls = PayrollEmployee::all()->where('user_id', Auth::user()->id);

        $user = User::all()->where('user_id', Auth::user()->id);

        return view('employee.home')->with(compact('project', 'payrolls', 'user'));
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
        $fechaUser->addYear(1) >= $employee->admission_date;

        $projectsID = array();

        foreach ($employee->projects as $project) {
            array_push($projectsID, $project->id);
        }

        $availableProjects = Project::whereNotIn('id', $projectsID)->get();

        $projectColors = ['#FF3F3F', '#12A0B4', '#940385'];

        return view('admin.employees.show')->with(compact('employee', 'projectColors', 'availableProjects'));
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
            ->with(compact('user', 'skillsActivos', 'project', 'availableSkills', 'itemColors',));
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
