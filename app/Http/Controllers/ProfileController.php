<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ProfileController extends Controller
{

    /** Editar Perfil
    *** Perfil: Admin - Empleado - Cliente ***/
    public function edit(){
        $user = Auth::user();

        return view('editProfile')
        ->with('user',$user);

    }

    /** Guardar datos modificados del perfil
    *** Perfil: Admin - Empleado - Cliente ***/
    public function update(Request $request)
    {

        $user = Auth::user();

        $fields = [    ];

        $msj = [    ];

        $this->validate($request, $fields, $msj);

        $user->update($request->all());

        $user->save();

        return redirect()->route('profile')->with('message','Se actualizo tu perfil');
        
    }

}
