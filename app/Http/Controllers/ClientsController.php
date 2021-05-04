<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Auth;
class ClientsController extends Controller
{
    public function index()
    {
        $client = Client::all();

        return view('landing.clients.clients')
        ->with('client', $client); 
 
    }

    public function create()
    {
        return view('landing.clients.create');
    }

    public function store(Request $request)
    {
        $client = Client::all();

        $fields = [   ];

        $msj = [    ];

        $this->validate($request, $fields, $msj);

           // foto
           $client = Client::create($request->all());

           if ($request->hasFile('photo')) {
               if(!$client->getMedia('photo')->isEmpty()) {
                   $client->getFirstMedia('photo')->delete();
               }
               $client->addMediaFromRequest("photo")->toMediaCollection('photo');
           }
        $client->save();

        return redirect()->route('landing.clients')->with('message','Se creo el Cliente Exitosamente');
        
    }

    public function edit($id)
    {
        $client = Client::find($id);
           return view('landing.clients.edit')
           ->with('client', $client); 
        
    }

    public function update(Request $request, $id)
    {
        $client = Client::find($id);

        $fields = [     ];

        $msj = [       ];

        $this->validate($request, $fields, $msj);

        // foto

        $client->update($request->all());

        if ($request->hasFile('photo')) {
            if(!$client->getMedia('photo')->isEmpty()) {
                $client->getFirstMedia('photo')->delete();
            }
            $client->addMediaFromRequest("photo")->toMediaCollection('photo');
        }

        $client->save();

        return redirect()->route('landing.clients')->with('message','Se actualizo el Cliente Exitosamente');
    }

    public function delete($id)
    {

        $client = Client::find($id);
    
        $client->delete();
      
        return redirect()->route('landing.clients')->with('message','Se elimino el Cliente'.' '.$client->client.' '.'Exitosamente');
    }
}
