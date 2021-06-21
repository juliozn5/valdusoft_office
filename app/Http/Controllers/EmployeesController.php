<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str as Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EmployeesController extends Controller
{ 
    /** Home del Empleado
    *** Perfil: Empleado ***/
    public function index(){
        $employes = Project::all();

        return view('employee.home')->with('employes', $employes); 
    }

    /** Listado de Empleados
    *** Perfil: Admin ***/
    public function list(){
        $employees = User::where('profile_id', '=', 3)->paginate(10);
        
        return view('admin.employees.list')
        ->with('employees', $employees); 
    }

    /** Crear nuevo empleado
    *** Perfil: Admin ***/
    public function create(){
        $skills = DB::table('skills')
                    ->orderBy('skill', 'ASC')
                    ->get();

        return view('admin.employees.create')->with(compact('skills'));
    }

    /** Guardar datos del nuevo empleado
    *** Perfil: Admin ***/
    public function store(Request $request){
        $employee = new User($request->all());

        $employee->slug = Str::slug($request->name."-".$request->last_name);

        $employee->password = Hash::make($request->password);

        $employee->profile_id = 3;

        $employee->save();

        if ($request->hasFile('photo')){
            $file = $request->file('photo');
            $name = $employe->id.".".$file->getClientOriginalExtension();
            $file->move(public_path().'/uploads/images/users/photos', $name);
            $employee->photo = $name;
        }

        if ($request->hasFile('curriculum')){
            $file2 = $request->file('curriculum');
            $name2 = $employe->id.".".$file2->getClientOriginalExtension();
            $file2->move(public_path().'/uploads/documents/curriculums', $name2);
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
    public function show($slug, $id){
        $employee = User::where('id', '=', $id)
                        ->with('projects', 'skills')
                        ->first();

        $projectsID = array();

        foreach ($employee->projects as $project){
            array_push($projectsID, $project->id);

        }
        
        $availableProjects = Project::whereNotIn('id', $projectsID)->get();
        
        $projectColors = ['#FF3F3F', '#12A0B4', '#940385'];

        return view('admin.employees.show')->with(compact('employee', 'projectColors', 'availableProjects'));
    }

    /** Asignar proyecto a un empleado
    *** Perfil: Admin ***/
    public function assign_projects(Request $request){
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
}
