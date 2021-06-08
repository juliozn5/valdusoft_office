<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ProfileController extends Controller
{
    public function index()
    {
        if (Auth::guest()){
            return redirect('login');
        }else{
           return view('landing.profile.profile'); 
        }
        
    }

    public function edit()
    {
        $user = Auth::user();

        return view('user.profile')
        ->with('user',$user);
    }

    public function update(Request $request)
    {

        $user = Auth::user()->id;

        $fields = [

        //  "name" => ['required'],
        //  "role" => ['required'],
        //  "email" => [
        //     'required',
        //     'string',
        //     'email',
        //     'max:255',
        // ],
        ];

        $msj = [
            // 'name.required' => 'El nombre es requerido',
            // 'role.required' => 'El telefono es requerido',
            // 'email.unique' => 'El correo debe ser unico',
        ];

        $this->validate($request, $fields, $msj);

        // foto
        $user->update($request->all());

        $user->save();

        return redirect()->route('profile')->with('message','Se actualizo tu perfil');
        
    }

}
