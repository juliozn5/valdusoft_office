<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
class ClientsController extends Controller
{

    /**
     * Vista clientes
     *
     * @return void
     */
    public function index()
    {

        $client = Client::all();

        return view('landing.clients.clients')
        ->with('client', $client); 
 
    }

    /**
     * Vista crear cliente
     *
     * @return void
     */
    public function create()
    {

        return view('landing.clients.create');

    }

    /**
     * Funcion crear cliente
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $client = Client::all();

        $fields = [   ];

        $msj = [    ];

        $this->validate($request, $fields, $msj);

        $client = Client::create($request->all());

        $client->save();

        return redirect()->route('clients')->with('message','Se creo el Cliente Exitosamente');
        
    }

    /**
     * Vista editar cliente
     *
     * @param [type] $id
     * @return void
     */
    public function edit($id)
    {

        $client = Client::find($id);

           return view('landing.clients.edit')
           ->with('client', $client); 
        
    }

    /**
     * Funcion editar cliente
     *
     * @param Request $request
     * @param [type] $id
     * @return void
     */
    public function update(Request $request, $id)
    {
        $client = Client::find($id);

        $fields = [     ];

        $msj = [       ];

        $this->validate($request, $fields, $msj);

        $client->update($request->all());

        $client->save();

        return redirect()->route('clients')->with('message','Se actualizo el Cliente Exitosamente');

    }

    /**
     * Funcion eliminar cliente
     *
     * @param [type] $id
     * @return void
     */
    public function delete($id)
    {

        $client = Client::find($id);
    
        $client->delete();
      
        return redirect()->route('clients')->with('message','Se elimino el Cliente'.' '.$client->client.' '.'Exitosamente');
        
    }
}
