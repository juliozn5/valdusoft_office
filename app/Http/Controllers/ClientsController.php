<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str as Str;
use Illuminate\Support\Facades\Hash;
use App\Models\Bill;
use App\Models\Hosting;

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
        $hosting = Hosting::all()->where('user_id', $request->id);

        return view('admin.clients.show')
        ->with(compact('client','client_bill','hosting'));
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
            $file->move(public_path('storage') . '/photo-profile', $name);
            $client->photo = $name;
        }

        $client->save();
 
        if (!is_null($request->skills)) {
            foreach ($request->skills as $skill) {
                DB::table('skills_users')->insert(
                    ['skill_id' => $skill, 'user_id' => $client->id]
                );
            }
        }
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
        $client->profile_id = 0;
        $client->save();
      
        return redirect()->route('admin.clients.list')->with('message','Se elimino el Cliente'.' '.$client->client.' '.'Exitosamente');
        
    }


}
