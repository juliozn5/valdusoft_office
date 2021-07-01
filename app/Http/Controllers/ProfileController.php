<?php

namespace App\Http\Controllers;

use App\Models\User;
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
 
        $user = User::find(Auth::user()->id);

        $user->update($request->all());

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $name = $user->id.".".$file->getClientOriginalExtension();
            $file->move(public_path('storage') . '/photo-profile', $name);
            $user->photo = $name;
         }  


        $user->save();

        return redirect()->route('profile')->with('message','Se actualizo tu perfil');
        
    }

}
