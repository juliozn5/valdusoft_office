<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str as Str;
use App\Models\User;
use App\Models\Project;
use DB;

class EmployeesController extends Controller
{ 
    public function index()
    {
        $employees = User::where('profile_id', '=', 3)->paginate(10);

        return view('landing.employees.employees')->with('employees', $employees); 
    }

    public function create(){
        $skills = DB::table('skills')
                    ->orderBy('skill', 'ASC')
                    ->get();

        return view('landing.employees.create')->with(compact('skills'));
    }

    public function store(Request $request){
        $employee = new User($request->all());
        $employee->slug = Str::slug($request->name."-".$request->last_name);
        $employee->password = Hash::make($request->password);
        $employee->profile_id = 3;
        $employee->save();

        if ($request->hasFile('photo')){
            $file = $request->file('photo');
            $name = $employee->id.".".$file->getClientOriginalExtension();
            $file->move(public_path().'/uploads/images/users/photos', $name);
            $employee->photo = $name;
        }

        if ($request->hasFile('curriculum')){
            $file2 = $request->file('curriculum');
            $name2 = $employee->id.".".$file2->getClientOriginalExtension();
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

        return redirect()->route('admin.employees')->with('msj-exitoso', 'true');
    }

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

        return view('landing.employees.show')->with(compact('employee', 'projectColors', 'availableProjects'));
    }

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
