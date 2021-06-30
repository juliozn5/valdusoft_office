<?php

namespace App\Http\Controllers;

use App\Models\Hosting;
use Illuminate\Http\Request;
use Auth;
use DB;

class HostingController extends Controller
{
    /** Listado de Hostings
    *** Perfil: Admin - Cliente ***/
    public function list(){
        if (Auth::user()->profile_id == 1){
            $hostings = Hosting::all();
        
            return view('admin.hostings.list')->with('hostings', $hostings); 
        }else if (Auth::user()->profile_id == 2){
            $hostings = Hosting::where('user_id', '=', Auth::user()->id)->get();
        
            return view('client.hostings')->with('hostings', $hostings);   
        }
    }

    /** Crear Nuevo Hosting
    *** Perfil: Admin ***/
    public function create(){
        $clients = DB::table('users')
        ->select('id', 'name', 'last_name')
        ->where('profile_id', '=', 2)
        ->orderBy('name', 'ASC')
        ->get();

        return view('admin.hostings.create')->with(compact('clients'));
    }

    /** Guardar datos del Nuevo Hosting
    *** Perfil: Admin ***/
    public function store(Request $request){
        $fields = [   ];

        $msj = [    ];

        $this->validate($request, $fields, $msj);

        $hosting = Hosting::create($request->all());
        $hosting->save();

        return redirect()->route('admin.hostings.list')->with('message','Se creo el Hosting Exitosamente');
    }

    /** Editar datos de un Hosting
    *** Perfil: Admin ***/
    public function edit($id){
        $hosting = Hosting::find($id);

        return view('admin.hostings.edit')
           ->with('hosting', $hosting);  
    }

    /** Guardar datos modificados de un Hosting
    *** Perfil: Admin ***/
    public function update(Request $request, $id){
        $hosting = Hosting::find($id);

        $fields = [     ];

        $msj = [       ];

        $this->validate($request, $fields, $msj);

        $hosting->update($request->all());

        $hosting->save();

        return redirect()->route('admin.hostings.list')->with('message','Se actualizo el Hosting Exitosamente');
    }

    /** Eliminar un Hosting
    *** Perfil: Admin ***/
    public function delete($id){

        $hosting = Hosting::find($id);
    
        $hosting->delete();
      
        return redirect()->route('admin.hostings.list')->with('message','Se elimino el Hosting'.' '.$hosting->client.' '.'Exitosamente');
    }
}
