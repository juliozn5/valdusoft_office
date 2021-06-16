<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ProfileController extends Controller
{

    /**
     * Vista perfil
     *
     * @return void
     */
    public function index()
    {

        if (Auth::guest()){

            return redirect('login');

        }else{

           return view('landing.profile.profile'); 

        }
        
    }

    /**
     * Vista editar perfil
     *
     * @return void
     */
    public function edit()
    {

        $user = Auth::user();

        return view('user.profile')
        ->with('user',$user);

    }

    /**
     * Funcion editar perfil
     *
     * @param Request $request
     * @return void
     */
    public function update(Request $request)
    {

        $user = Auth::user()->id;

        $fields = [    ];

        $msj = [    ];

        $this->validate($request, $fields, $msj);

        $user->update($request->all());

        $user->save();

        return redirect()->route('profile')->with('message','Se actualizo tu perfil');
        
    }

}
