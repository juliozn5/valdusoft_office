<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str as Str;
use Illuminate\Support\Facades\Hash;
use App\Models\Bill;
use App\Models\Hosting;
use App\Models\Project;

class ClientsController extends Controller
{
    /** Home del Cliente
    *** Perfil: Cliente ***/
    public function index(){
        $clients = Bill::all()->where('type', 'C');
        $hostings = Hosting::paginate(10);
        $projects = Project::paginate(10);
        return view('client.home')->with(compact('clients', 'hostings', 'projects'));

      
    }
    

    /** Listado de Clientes
    *** Perfil: Admin ***/
    public function list(){
        $client = User::where('profile_id', '=', 2)
                    ->orderBy('name', 'ASC')
                    ->paginate(10);
                    

        return view('admin.clients.list')
        ->with('client', $client); 
    }

    /** Crear Nuevo Cliente
    *** Perfil: Admin ***/
    public function create(){
        $skills = DB::table('skills')
        ->orderBy('skill', 'ASC')
        ->get();

    return view('admin.clients.create')->with(compact('skills'));

    }

       //detalle del proyecto
       public function show(Request $request, $slug,$id){
        $client = User::where('id', '=', $id)
                        ->first();
        $client_bill =Bill::where('user_id', $request->id)->paginate(10);
        
        $projects= Project::where('user_id', $request->id)->paginate(5);
       
        $hosting = Hosting::all()->where('user_id', $request->id);

        return view('admin.clients.show')
        ->with(compact('client','client_bill','hosting','projects'));
    }

    /** Guardar Datos del Nuevo Cliente
    *** Perfil: Admin ***/
    public function store(Request $request){

        $client = new User($request->all());

        $client->slug = Str::slug($request->name."-".$request->last_name);

        $client->password = Hash::make($request->password);

        $client->profile_id = 2;

        $client->save();

        if ($request->hasFile('photo')){
            $file = $request->file('photo');
            $name = $client->id.".".$file->getClientOriginalExtension();
            $file->move(public_path().'/uploads/images/users/photos', $name);
            $client->photo = $name;
        }

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
    public function delete(Request $request){
        $client = User::find($request->id);
        $client->delete();
      
        return redirect()->route('admin.clients.list')->with('message','Se elimino el Cliente'.' '.$client->client.' '.'Exitosamente');
        
    }


}
