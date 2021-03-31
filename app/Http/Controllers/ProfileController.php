<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;


use App\Models\User;
class ProfileController extends Controller
{
    public function index()
    {
        if (Auth::guest()){
            return redirect('login');
        }else{
           return view('landing.profile'); 
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
        $user = Auth::user();

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

        if ($request->hasFile('photo')) {
            if(!$user->getMedia('photo')->isEmpty()) {
                $user->getFirstMedia('photo')->delete();
            }
            $user->addMediaFromRequest("photo")->toMediaCollection('photo');
        }
        $user->save();

        return redirect()->route('profile')->with('message','Se actualizo tu perfil');
        
    }

}
