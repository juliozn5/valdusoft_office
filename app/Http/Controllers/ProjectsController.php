<?php

namespace App\Http\Controllers;

use App\Models\Project;;
use Illuminate\Http\Request;
use Illuminate\Support\Str as Str;
use Auth;
use DB;

class ProjectsController extends Controller
{
    /** Listado de Proyectos 
    *** Perfil: Admin - Cliente - Empleados ***/
    public function list(){
        if (Auth::user()->profile_id == 1){
            $projects = Project::orderBy('id', 'DESC')->paginate(10);
            
            return view('admin.projects.list')
            ->with('projects', $projects); 
        }else if (Auth::user()->profile_id == 2){
            $projects = Project::where('user_id', '=', Auth::user()->id)
                            ->orderBy('id', 'DESC')
                            ->get();

            return view('client.projects')
            ->with('projects', $projects); 
        }else if (Auth::user()->profile_id == 3){
            $projects = Auth::user()->projects;

            return view('employee.projects')->with('projects', $projects);
        }
    }

    /** Crear Nuevo Proyecto
    *** Perfil: Admin ***/
    public function create(){
        $clients = DB::table('users')
                        ->select('id', 'name', 'last_name')
                        ->where('profile_id', '=', 2)
                        ->orderBy('name', 'ASC')
                        ->get();
        
        $countries = DB::table('countries')
                        ->select('id', 'name')
                        ->orderBy('name', 'ASC')
                        ->get();
        
        $technologies = DB::table('technologies')
                        ->select('id', 'name')
                        ->orderBy('name', 'ASC')
                        ->get();

        return view('admin.projects.create')->with(compact('clients', 'countries', 'technologies'));
    }

    /** Guardar datos del Nuevo Proyecto
    *** Perfil: Admin ***/
    public function store(Request $request){
        $project = new Project($request->all());
        $project->slug = Str::slug($request->name);
        $project->status = '0';
        $project->save();

        if ($request->hasFile('logo')){
            $file = $request->file('logo');
            $name = $project->id.".".$file->getClientOriginalExtension();
            $file->move(public_path().'/uploads/images/projects', $name);
            $project->logo = $name;
            $project->save();
        }

        if (!is_null($request->technologies)) {
            foreach ($request->technologies as $technology) {
                $project->technologies()->attach($technology);
            }
        }

        return redirect()->route('admin.projects.list')->with('msj-exitoso','done'); 
    }

    /** Ver detalles de un Proyecto
    *** Perfil: Admin ***/
    public function show($slug, $id){
        $project = Project::find($id);
        
        $employeesID = array();

        foreach ($project->employees as $employee){
            array_push($employeesID, $employee->id);
        }
        
        $availableEmployees = DB::table('users')
                                ->select('id', 'name', 'last_name')
                                ->where('profile_id', '=', 3)
                                ->whereNotIn('id', $employeesID)
                                ->get();
        
        $technologiesID = array();

        foreach ($project->technologies as $technology){
            array_push($technologiesID, $technology->id);
        }
        
        $availableTechnologies = DB::table('technologies')
                                    ->select('id', 'name')
                                    ->whereNotIn('id', $technologiesID)
                                    ->get();

        return view('admin.projects.show')->with(compact('project', 'availableEmployees', 'availableTechnologies'));   
    }

    /** Editar un Proyecto
    *** Perfil: Admin ***/
    public function edit($id){

        $projects = Project::find($id);

           return view('admin.projects.edit')
           ->with('projects', $projects);   
    }

    /** Guardar datos modificados del Proyecto
    *** Perfil: Admin ***/
    public function update(Request $request, $id){
        $projects = Project::find($id);

        $fields = [     ];

        $msj = [       ];

        $this->validate($request, $fields, $msj);

        $projects->update($request->all());
      
        $projects->save();

        return redirect()->route('admin.projects.list')->with('message','Se actualizo el Proyecto Exitosamente');  
    }

    public function delete($id){
        $project = Project::find($id);
        foreach ($project->technologies as $technology){
            $project->technologies()->detach($technology->id);
        }
        foreach ($project->employees as $employee){
            $project->employees()->detach($employee->id);
        }
        $project->delete();
      
        return redirect()->route('admin.projects.list')->with('msj-deleted','done');

    }

     /** Asignar miembro a un proyecto
    *** Perfil: Admin ***/
    public function assign_members(Request $request){
        $fecha = date('Y-m-d H:i:s');
        if (!is_null($request->employees)) {
            foreach ($request->employees as $employee) {
                DB::table('projects_users')->insert(
                    ['project_id' => $request->project_id, 'user_id' => $employee, 'created_at' => $fecha, 'updated_at' => $fecha]
                );
            }

            return redirect()->back()->with('msj-exitoso', 'true');
        }
    }

     /** Asignar tecnología a un proyecto
    *** Perfil: Admin ***/
    public function assign_technologies(Request $request){
        $fecha = date('Y-m-d H:i:s');
        if (!is_null($request->technologies)) {
            foreach ($request->technologies as $technology) {
                DB::table('projects_technologies')->insert(
                    ['project_id' => $request->project_id, 'technology_id' => $technology, 'created_at' => $fecha, 'updated_at' => $fecha]
                );
            }

            return redirect()->back()->with('msj-exitoso', 'true');
        }
    }
    //detalle del proyecto
   public function detail(){
    return view('employee.projectsdetail');
}
}
