<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use App\Models\Project;
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
            $projects = Project::where('status', '<>', '4')
                            ->orderBy('id', 'DESC')
                            ->paginate(10);
            
            return view('admin.projects.list')
            ->with('projects', $projects); 
        }else if (Auth::user()->profile_id == 2){
            $projects = Project::where('user_id', '=', Auth::user()->id)
                            ->where('status', '<>', '4')
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
        $project = Project::with('employees', 'technologies', 'attachments')
                    ->where('id', '=', $id)
                    ->first();
        
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
        
        foreach ($project->attachments as $attachment){
            $attachment->date = date('d', strtotime($attachment->created_at)).' de '.$this->getMonthName(date('m', strtotime($attachment->created_at))).' de '.date('Y', strtotime($attachment->created_at));
            $attachment->time = date('H:i', strtotime($attachment->created_at));
        }

       // dd($availableEmployees);

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
        $project->status = 4;
        $project->save();
      
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

    /** Agregar un archivo adjunto al proyecto
    *** Perfil: Admin ***/
    public function add_attachment(Request $request){
        $project = Project::find($request->project_id);
        
        if ($request->hasFile('file')){
            $file = $request->file('file');
            $name = $file->getClientOriginalName();
            $file->move(public_path().'/uploads/attachments', $name);

            $attachment = new Attachment(['name' => $request->name, 'file_name' => $name, 'file_type' => $request->file_type]);
            $project->attachments()->save($attachment);
        }

        return redirect()->back()->with('msj-attachment', 'true');
    }

    /** Editar un archivo adjunto del proyecto
    *** Perfil: Admin ***/
    public function update_attachment(Request $request){
        $attachment = Attachment::find($request->attachment_id);
        $attachment->fill($request->all());

        if ($request->hasFile('file')){
            $file = $request->file('file');
            $name = $file->getClientOriginalName();
            $file->move(public_path().'/uploads/attachments', $name);
            $attachment->file_name = $name;
        }

        $attachment->save();

        return redirect()->back()->with('msj-attachment', 'true');
    }

    /** Eliminar un archivo adjunto del proyecto
    *** Perfil: Admin ***/
    public function delete_attachment($id){
        $attachment = Attachment::find($id);

        $path = public_path().'/uploads/attachments/'.$attachment->file_name;
        if (getimagesize($path)) {
            unlink($path);
        }

        $attachment->delete();
      
        return redirect()->back()->with('attachment-deleted', 'done');
    }

    public function getMonthName($month){
        switch ($month){
            case 1:
                return 'Enero';
            break;
            case 2:
                return 'Febrero';
            break;
            case 3:
                return 'Marzo';
            break;
            case 4:
                return 'Abril';
            break;
            case 5:
                return 'Mayo';
            break;
            case 6:
                return 'Junio';
            break;
            case 7:
                return 'Julio';
            break;
            case 8:
                return 'Agosto';
            break;
            case 9:
                return 'Septiembre';
            break;
            case 10:
                return 'Octubre';
            break;
            case 11:
                return 'Noviembre';
            break;
            case 12:
                return 'Diciembre';
            break;
        }
    }
}
