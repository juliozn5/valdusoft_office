<?php

namespace App\Http\Controllers;

use App\Models\Hosting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class HostingController extends Controller
{
    /** Listado de Hostings
     *** Perfil: Admin - Cliente ***/
    public function list()
    {
        if (Auth::user()->profile_id == 1) {
            $hostings = Hosting::paginate(10);
            $client = User::all()->where('profile_id', '2');
            return view('admin.hostings.list')->with(compact('client', 'hostings'));
        } else if (Auth::user()->profile_id == 2) {
            $hostings = Hosting::where('user_id', '=', Auth::user()->id)->paginate(10);
            return view('client.hostings')
                ->with('hostings', $hostings);
        }
    }

    function show(Request $request, $id)
    {
        $hosting = Hosting::where('id', '=', $id)->first();
        $client = User::all()->where('profile_id', '2');
        return view('admin.hostings.show')->with(compact('hosting', 'client'));
    }

    /** Crear Nuevo Hosting
     *** Perfil: Admin ***/
    public function create()
    {
        $clients = DB::table('users')
            ->select('id', 'name', 'last_name')
            ->where('profile_id', '=', 2)
            ->orderBy('name', 'ASC')
            ->get();

        return view('admin.hostings.create')->with(compact('clients'));
    }

    /** Guardar datos del Nuevo Hosting
     *** Perfil: Admin ***/
    public function store(Request $request)
    {
      
        $fecha = new Carbon($request->create_date);
        $renewal_hosting = $fecha->addYears($request->years);

       
            Hosting::create([
                'user_id' => $request->user_id,
                'url' => $request->url,
                'create_date' => $request->create_date,
                'due_date' => $request->due_date,
                'renewal_hosting' => strtotime(date($renewal_hosting)),
                'price' => $request->price,
                'renewal_price' => $request->renewal_price,
                'years' => $request->years,
                'cpanel_url' => $request->cpanel_url,
                'cpanel_email' => $request->cpanel_email,
                'status' => $request->status,
                'cpanel_password' => $request->cpanel_password,
            ]);
        
        return redirect()->route('admin.hostings.list')->with('message', 'Se creo el Hosting Exitosamente');
    }

    /** Editar datos de un Hosting
     *** Perfil: Admin ***/
    public function edit($id)
    {
        $hosting = Hosting::find($id);
        dd($hosting);

        return view('admin.hostings.edit')
            ->with('hosting', $hosting);
    }

    /** Guardar datos modificados de un Hosting
     *** Perfil: Admin ***/
    public function update(Request $request)
    {
        // dd($request);
        $hosting = Hosting::find($request->hosting_id);


        $fields = [

             "hosting_id" => ['required'],
             "hosting_url" => [
                'required',
                'max:255',
            ],
            "date" => ['required'],
            "client" => ['required'],
            "date_end" => ['required'],
            "price" => ['required'],
            "cpanel_url" => ['string'],
            "status" => ['required'],
            "cpanel_email" => ['string', 'email'],
            "cpanel_password" => ['string']
            

        ];

        $msj = [
            'hosting_url.required' => 'La URL es requerida',
            'date.required' => 'La Fecha es requerida',
            'client.required' => 'El cliente es requerido',
            'date_end.required' => 'Los Años de vencimiento son requeridos',
            'price.required' => 'El Precio es requerido',
           
        ];

        $this->validate($request, $fields, $msj);
        // dd("Pasó Validación");
        // $hosting->update($request->all());
        $hosting->url = $request->hosting_url;
        $hosting->user_id = $request->client;
        $hosting->create_date = $request->date;
        $fecha = new Carbon($hosting->create_date);
        $hosting->due_date = $fecha->addYears($request->date_end);
        $hosting->renewal_hosting = strtotime(date($hosting->due_date));
        $hosting->years = $request->date_end;
        $hosting->price = $request->price;
        $hosting->status = $request->status;
        $hosting->renewal_price = $request->renewal_price;
        // $hosting->cpanel_url = $request->cpanel_url;
        // $hosting->cpanel_email = $request->cpanel_email;
        // $hosting->cpanel_password = $request->cpanel_password;
        
        

        $hosting->save();

        return redirect()->back()->with('message', 'Se actualizo el Hosting Exitosamente');
    }

    public function renewal(Request $request)
    {
        $hosting = Hosting::find($request->hosting_id);

        $hosting->update($request->all());

        $hosting->renewal_price = $request->renewal_price;
        $hosting->renewal_hosting = $request->renewal_hosting;

        $hosting->save();

        return redirect()->back()->with('message', 'Se actualizo el Hosting Exitosamente');
    }

    /** Eliminar un Hosting
     *** Perfil: Admin ***/
    public function delete($id)
    {

        $hosting = Hosting::find($id);

        $hosting->delete();

        return redirect()->route('admin.hostings.list')->with('message', 'Se elimino el Hosting' . ' ' . $hosting->client . ' ' . 'Exitosamente');
    }
    /**detalles de Hosting 
     * para cliente */
    public function showHosting($id)
    {   
        $hosting = Hosting::find($id); 
      return view('client.showHosting', compact('hosting'));
    }
}
