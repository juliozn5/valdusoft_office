<?php

namespace App\Http\Controllers;

use App\Models\Project;;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{

    /**
     * Vista proyecto
     *
     * @return void
     */
    public function index()
    {

        $projects = Project::all();
        
        return view('home.employe')
        ->with('projects', $projects); 

    }

    /**
     * Vista lista proyecto
     *
     * @return void
     */
    public function list()
    {

        $projects = Project::all();
        
        return view('landing.projects.projects')
        ->with('projects', $projects); 

    }

    /**
     * Vista crear proyecto
     *
     * @return void
     */
    public function create()
    {

        return view('landing.projects.create');

    }

    /**
     * Funcion crear proyecto
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {

        $projects = Project::all();

        $fields = [   ];

        $msj = [    ];

        $this->validate($request, $fields, $msj);

        $projects = Project::create($request->all());

        $projects->save();

        return redirect()->route('projects')->with('message','Se creo el Proyecto Exitosamente');
        
    }

    /**
     * Vista editar proyecto
     *
     * @param [type] $id
     * @return void
     */
    public function edit($id)
    {

        $projects = Project::find($id);

           return view('landing.projects.edit')
           ->with('projects', $projects); 
        
    }

    /**
     * Funcion editar proyecto
     *
     * @param Request $request
     * @param [type] $id
     * @return void
     */
    public function update(Request $request, $id)
    {
        $projects = Project::find($id);

        $fields = [     ];

        $msj = [       ];

        $this->validate($request, $fields, $msj);

        $projects->update($request->all());
      
        $projects->save();

        return redirect()->route('projects')->with('message','Se actualizo el Proyecto Exitosamente');
        
    }

    public function delete($id)
    {

        $projects = Project::find($id);
    
        $projects->delete();
      
        return redirect()->route('projects')->with('message','Se elimino el Proyecto'.' '.$projects->client.' '.'Exitosamente');

    }
}
