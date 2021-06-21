<?php

namespace App\Http\Controllers;

use App\Models\Project;;
use Illuminate\Http\Request;
use Auth;

class ProjectsController extends Controller
{
    /** Listado de Proyectos 
    *** Perfil: Admin - Cliente - Empleados ***/
    public function list(){
        if (Auth::user()->profile_id == 1){
            $projects = Project::orderBy('id', 'DESC')->get();
            
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
        return view('admin.projects.create');
    }

    /** Guardar datos del Nuevo Proyecto
    *** Perfil: Admin ***/
    public function store(Request $request){
        $projects = Project::all();

        $fields = [   ];

        $msj = [    ];

        $this->validate($request, $fields, $msj);

        $projects = Project::create($request->all());

        $projects->save();

        return redirect()->route('admin.projects.list')->with('message','Se creo el Proyecto Exitosamente'); 
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

    public function delete($id)
    {

        $projects = Project::find($id);
    
        $projects->delete();
      
        return redirect()->route('admin.projects.list')->with('message','Se elimino el Proyecto'.' '.$projects->client.' '.'Exitosamente');

    }
}
