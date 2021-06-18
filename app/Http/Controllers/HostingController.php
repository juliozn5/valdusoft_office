<?php

namespace App\Http\Controllers;

use App\Models\Hosting;
use Illuminate\Http\Request;

class HostingController extends Controller
{

    /**
     * Vista hosting
     *
     * @return void
     */
    public function index()
    {

        $hosting = Hosting::all();

           return view('landing.hosting.hosting')
           ->with('hosting', $hosting); 
        
    }

    /**
     * Vista lista proyecto
     *
     * @return void
     */
    public function list()
    {

        $hosting = Hosting::all();
        
        return view('landing.hosting.list')
        ->with('hosting', $hosting); 

    }

    /**
     * Vista crear hosting
     *
     * @return void
     */
    public function create()
    {

        return view('landing.hosting.create');

    }

    /**
     * Funcion crear hosting
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {

        $hosting = Hosting::all();

        $fields = [   ];

        $msj = [    ];

        $this->validate($request, $fields, $msj);

        $hosting = Hosting::create($request->all());
   
        $hosting->save();

        return redirect()->route('hosting')->with('message','Se creo el Hosting Exitosamente');
        
    }

    /**
     * Vista editar hosting
     *
     * @param [type] $id
     * @return void
     */
    public function edit($id)
    {

        $hosting = Hosting::find($id);

           return view('landing.hosting.edit')
           ->with('hosting', $hosting); 
        
    }

    /**
     * Funcion editar hosting
     *
     * @param Request $request
     * @param [type] $id
     * @return void
     */
    public function update(Request $request, $id)
    {

        $hosting = Hosting::find($id);

        $fields = [     ];

        $msj = [       ];

        $this->validate($request, $fields, $msj);

        $hosting->update($request->all());

        $hosting->save();

        return redirect()->route('hosting')->with('message','Se actualizo el Hosting Exitosamente');

    }

    /**
     * Funcion eliminar hosting
     *
     * @param [type] $id
     * @return void
     */
    public function delete($id)
    {

        $hosting = Hosting::find($id);
    
        $hosting->delete();
      
        return redirect()->route('hosting')->with('message','Se elimino el Hosting'.' '.$hosting->client.' '.'Exitosamente');

    }
}
