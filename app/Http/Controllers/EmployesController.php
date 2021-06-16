<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str as Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EmployesController extends Controller
{ 

    /**
     * Vista empleado
     *
     * @return void
     */
    public function index()
    {

        $employes = User::where('profile_id', '=', 3)->paginate(10);

        return view('landing.employes.employes')->with('employes', $employes); 

    }


    /**
     * Vista crear empleado
     *
     * @return void
     */
    public function create(){

        $skills = DB::table('skills')
                    ->orderBy('skill', 'ASC')
                    ->get();

        return view('landing.employes.create')->with(compact('skills'));

    }

    /**
     * Funcion crear empleado
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request){

        $employe = new User($request->all());

        $employe->slug = Str::slug($request->name."-".$request->last_name);

        $employe->password = Hash::make($request->password);

        $employe->profile_id = 3;

        $employe->save();

        if ($request->hasFile('photo')){

            $file = $request->file('photo');
            $name = $employe->id.".".$file->getClientOriginalExtension();
            $file->move(public_path().'/uploads/images/users/photos', $name);
            $employe->photo = $name;

        }

        if ($request->hasFile('curriculum')){

            $file2 = $request->file('curriculum');
            $name2 = $employe->id.".".$file2->getClientOriginalExtension();
            $file2->move(public_path().'/uploads/documents/curriculums', $name2);
            $employe->curriculum = $name2;

        }

        $employe->save();

        if (!is_null($request->skills)) {

            foreach ($request->skills as $skill) {
                DB::table('skills_users')->insert(
                    ['skill_id' => $skill, 'user_id' => $employe->id]
                );
            }

        }

        return redirect()->route('admin.employes')->with('msj-exitoso', 'true');

    }

    /**
     * Vista ver empleado
     *
     * @param [type] $slug
     * @param [type] $id
     * @return void
     */
    public function show($slug, $id){

        $employe = User::where('id', '=', $id)
                        ->with('projects', 'skills')
                        ->first();

        $projectsID = array();

        foreach ($employe->projects as $project){

            array_push($projectsID, $project->id);

        }
        
        $availableProjects = Project::whereNotIn('id', $projectsID)->get();
        
        $projectColors = ['#FF3F3F', '#12A0B4', '#940385'];

        return view('landing.employes.show')->with(compact('employe', 'projectColors', 'availableProjects'));

    }


    /**
     * Comentario
     *
     * @param Request $request
     * @return void
     */
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
