<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    /** Home del Cliente
    *** Perfil: Cliente ***/
    public function index(){
        $client = User::all();

        return view('client.home')
        ->with('client', $client); 
    }

    /** Listado de Clientes
    *** Perfil: Admin ***/
    public function list(){
        $client = User::where('profile_id', '=', 2)
                    ->orderBy('name', 'ASC')
                    ->get();

        return view('admin.clients.list')
        ->with('client', $client); 
    }

    /** Crear Nuevo Cliente
    *** Perfil: Admin ***/
    public function create(){
        return view('admin.clients.create');

    }

    /** Guardar Datos del Nuevo Cliente
    *** Perfil: Admin ***/
    public function store(Request $request){
        $fields = [   ];

        $msj = [    ];

        $this->validate($request, $fields, $msj);

        $client = User::create($request->all());
        $client->save();

        return redirect()->route('admin.clients.list')->with('message','Se creo el Cliente Exitosamente');
        
    }

    /** Editar datos de un Cliente
    *** Perfil: Admin ***/
    public function edit($id){
        $client = User::find($id);

        return view('admin.clients.edit')
           ->with('client', $client); 
    }

    /** Guardar datos modificados de un Cliente
    *** Perfil: Admin ***/
    public function update(Request $request, $id){
        $client = User::find($id);

        $fields = [     ];

        $msj = [       ];

        $this->validate($request, $fields, $msj);

        $client->update($request->all());

        $client->save();

        return redirect()->route('admin.clients.list')->with('message','Se actualizo el Cliente Exitosamente');
    }

    /** Eliminar un Cliente
    *** Perfil: Admin ***/
    public function delete($id){
        $client = User::find($id);
    
        $client->delete();
      
        return redirect()->route('admin.clients.list')->with('message','Se elimino el Cliente'.' '.$client->client.' '.'Exitosamente');
        
    }
}
