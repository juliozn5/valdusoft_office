<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\Models\Project;;


class ProjectsController extends Controller
{
    public function index()
    {

        $projects = Project::all();
        
        return view('landing.projects.projects')
        ->with('projects', $projects); 
    }

    public function create()
    {
        return view('landing.projects.create');
    }

    public function store(Request $request)
    {
        $projects = Project::all();

        $fields = [   ];

        $msj = [    ];

        $this->validate($request, $fields, $msj);

        $projects = Project::create($request->all());
        $projects->save();

        return redirect()->route('landing.projects')->with('message','Se creo el Proyecto Exitosamente');
        
    }

    public function edit($id)
    {
        $projects = Project::find($id);
           return view('landing.projects.edit')
           ->with('projects', $projects); 
        
    }

    public function update(Request $request, $id)
    {
        $projects = Project::find($id);

        $fields = [     ];

        $msj = [       ];

        $this->validate($request, $fields, $msj);

        $projects->update($request->all());
      
        $projects->save();

        return redirect()->route('landing.projects')->with('message','Se actualizo el Proyecto Exitosamente');
    }

    public function delete($id)
    {

        $projects = Project::find($id);
    
        $projects->delete();
      
        return redirect()->route('landing.projects')->with('message','Se elimino el Proyecto'.' '.$projects->client.' '.'Exitosamente');
    }
}
