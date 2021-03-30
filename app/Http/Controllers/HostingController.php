<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\Models\Hosting;

class HostingController extends Controller
{

    public function index()
    {
        $hosting = Hosting::all();
           return view('landing.hosting.hosting')
           ->with('hosting', $hosting); 
        
    }

    public function create()
    {
        return view('landing.hosting.create');
    }

    public function store(Request $request)
    {
        $hosting = Hosting::all();

        $fields = [   ];

        $msj = [    ];

        $this->validate($request, $fields, $msj);

           // foto
           $hosting = Hosting::create($request->all());

           if ($request->hasFile('photo')) {
               if(!$hosting->getMedia('photo')->isEmpty()) {
                   $hosting->getFirstMedia('photo')->delete();
               }
               $hosting->addMediaFromRequest("photo")->toMediaCollection('photo');
           }
        $hosting->save();

        return redirect()->route('landing.hosting')->with('message','Se creo el Hosting Exitosamente');
        
    }

    public function edit($id)
    {
        $hosting = Hosting::find($id);
           return view('landing.hosting.edit')
           ->with('hosting', $hosting); 
        
    }

    public function update(Request $request, $id)
    {
        $hosting = Hosting::find($id);

        $fields = [     ];

        $msj = [       ];

        $this->validate($request, $fields, $msj);

        // foto

        $hosting->update($request->all());

        if ($request->hasFile('photo')) {
            if(!$hosting->getMedia('photo')->isEmpty()) {
                $hosting->getFirstMedia('photo')->delete();
            }
            $hosting->addMediaFromRequest("photo")->toMediaCollection('photo');
        }

        $hosting->save();

        return redirect()->route('landing.hosting')->with('message','Se actualizo el Hosting Exitosamente');
    }

    public function delete($id)
    {

        $hosting = Hosting::find($id);
    
        $hosting->delete();
      
        return redirect()->route('landing.hosting')->with('message','Se elimino el Hosting'.' '.$hosting->client.' '.'Exitosamente');
    }
}
