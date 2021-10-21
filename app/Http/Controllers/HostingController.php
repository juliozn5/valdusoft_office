<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Bill;
use App\Models\User;
use App\Models\Hosting;
use Illuminate\Http\Request;
use App\Models\RenewalHosting;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

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
        
        $fields = [
            "hosting_url" => ['required', 'min:4', 'max:255'],
            "date" => ['required'],
            "client" => ['required'],
            "date_end" => ['required'],
            "price" => ['required'],
            "cpanel_url" => ['string'],
            "cpanel_email" => ['string', 'email'],
            "cpanel_password" => ['string'],
            "status" => ['required']
        ];

        $msj = [
            'hosting_url.required' => 'La URL es requerida',
            'hosting_url.min' => 'La URL debe tener al menos 4 caracteres',
            'hosting_url.max' => 'La URL no puede sobrepasar 255 caracteres',
            'date.required' => 'La Fecha es requerida',
            'client.required' => 'El cliente es requerido',
            'date_end.required' => 'Los Años de vencimiento son requeridos',
            'price.required' => 'El Precio es requerido',
            'status.required' => 'El estado es requerido',
            'cpanel_email' => 'El Email es inválido'
        ];
        // dd($request);
        $validate = $this->validate($request, $fields, $msj);
        try {
            if($validate){
                DB::beginTransaction();
                $fecha = new Carbon($request->date);
                    $hosting = Hosting::create([
                        'url' => $request->hosting_url,
                        'create_date' => $request->date,
                        'due_date' => $fecha->addYears($request->date_end),
                        'price' => $request->price,
                        'renewal_price' => $request->renewal_price,
                        'years' => $request->date_end,
                        'cpanel_url' => $request->cpanel_url,
                        'cpanel_email' => $request->cpanel_email,
                        'cpanel_password' => $request->cpanel_password,
                        'user_id' => $request->client,
                        'status' => $request->status
                    ]);
                    $hosting->save();
    
                    $bill = Bill::create([
                        'user_id' => $hosting->user_id,
                        'amount' => $hosting->price,
                        'date' => $hosting->create_date,
                        'payed_at' => null,
                        'status' => '0',
                        'type' => 'H',
                        'hosting_id' => $hosting->id
                    ]);
                    

                DB::commit();
                return redirect()->route('admin.hostings.list')->with('message', 'Se creo el Hosting Exitosamente');
            }
        } catch (\Throwable $th) {
            DB::rollback();
            Log::error('HostingController - store -> Error: '.$th);
            abort(403, "Ocurrio un error, contacte con el administrador");
        }
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
            "hosting_url" => ['required', 'min:4', 'max:255'],
            "date" => ['required'],
            "client" => ['required'],
            "date_end" => ['required'],
            "price" => ['required'],
            "cpanel_url" => ['string'],
            "cpanel_email" => ['string', 'email'],
            "cpanel_password" => ['string']
        ];

        $msj = [
            'hosting_url.required' => 'La URL es requerida',
            'hosting_url.min' => 'La URL debe tener al menos 4 caracteres',
            'hosting_url.max' => 'La URL no puede sobrepasar 255 caracteres',
            'date.required' => 'La Fecha es requerida',
            'client.required' => 'El cliente es requerido',
            'date_end.required' => 'Los Años de vencimiento son requeridos',
            'price.required' => 'El Precio es requerido',
            'cpanel_email.email' => 'El Email es inválido'
        ];

        $this->validate($request, $fields, $msj);
        // dd("Pasó Validación");
        // $hosting->update($request->all());
        $hosting->url = $request->hosting_url;
        $hosting->user_id = $request->client;
        $hosting->create_date = $request->date;
        $fecha = new Carbon($hosting->create_date);
        $hosting->due_date = $fecha->addYears($request->date_end);
        // $hosting->renewal_hosting = strtotime(date($hosting->due_date));
        $hosting->years = $request->date_end;
        $hosting->price = $request->price;
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

        $fields = [
            "hosting_id" => ['required'],
            "renewal_price" => ['required'],
            "years" => ['required'],
            "create_date" => ['required']
        ];

        $msj = [
            'renewal_price.required' => 'El precio de renovación es requerido',
            'years.required' => 'Los años de renovación son requeridos',
            'created_date.required' => 'La Fecha es requerida'
        ];

        $validate = $this->validate($request, $fields, $msj);
        try {
            if($validate){
                // dd($validate);
                DB::beginTransaction();
                $fecha = new Carbon($request->create_date);
                    $renewal = RenewalHosting::create([
                        'hosting_id' => $request->hosting_id,
                        'renewal_price' => $request->renewal_price,
                        'years' => $request->years,
                        'create_date' => $request->create_date,
                        'expire_date' => $fecha->addYears($request->years)
                    ]);

                    Bill::create([
                        'user_id' => $hosting->user_id,
                        'amount' => $renewal->renewal_price,
                        'date' => $renewal->create_date,
                        'payed_at' => null,
                        'status' => '0',
                        'type' => 'H',
                        'hosting_id' => $renewal->hosting_id
                    ]);
                    

                DB::commit();
                return redirect()->back()->with('message', 'Renovación creada Exitosamente');
            }
        } catch (\Throwable $th) {
            DB::rollback();
            Log::error('HostingController - store -> Error: '.$th);
            abort(403, "Ocurrio un error, contacte con el administrador");
        }

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
