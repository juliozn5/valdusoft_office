<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use App\User;
use App\Config;
use App\RequestQuotation;
use Mail;
use App\Mail\requestQuotationMail;
use App\Mail\requestQuotationAdminMail;
use App\Mail\createAccountMail;
use Auth;
use Response;
use Notification;
use App\Notifications\PushMessage;
use Illuminate\Support\Facades\Hash;

class LandingController extends Controller
{
    public function __construct()
    {
        $this->date = new Carbon();
    }

    public function index(Request $request)
    {
        $fx_rates = FxRate::all();
        $reviewe = Review::where('show_review', true)->get();
        
        return view('landing.index');
    }

    public function register()
    {
        if(!Auth::check()){
            return view('auth.register');
        }

        return redirect()->route('welcome');
    }

    public function registerSave(Request $request)
    {
        $fields = [
            "name" => ['required'],
            "last_name" => ['required'],
            // "dni" => ['required'],
            // "uid_discord" => [
            //     'required',
            //     'integer',
            //     'alpha_dash',
            //     Rule::unique('users')->where(function ($query) use ($request) {
            //         return $query->where('uid_discord', $request->uid_discord);
            //     }),
            // ],
            // "name_discord" => ['required'],
            // "phone" => ['required'],
            "email" => [
                'required',
                'string',
                'email',
                'confirmed',
                'max:255',
                Rule::unique('users')->where(function ($query) use ($request) {
                    return $query->where('email', $request->email);
                }),
            ],
            "password" => ['required', 'string', 'min:8', 'confirmed'],
        ];
        $request["role"] = 'client';

        $msj = [
            'name.required' => 'El nombre es requerido',
            'apellido.required' => 'El apellido es requerido',
            'email.unique' => 'El correo debe ser unico',
            'email.required' => 'El correo es requerido',
            'email.confirmed' => 'El correo no coinciden',
            'dni.required' => 'El documento de identidad es requerido',
            'password.required' => 'Debes colocar una contraseña',
            'password.min' => 'El minimo de la contraseña es de 8 caracteres',
            'password.confirmed' => 'La contraseña no coincide',
            'role.required' => 'The role is required',
            'phone.required' => 'El telefono es requerido',
            'photo.required' => 'The photo is required',
        ];

        $this->validate($request, $fields, $msj);

        $request['password'] = Hash::make($request->password, ['rounds' => 10]);

        $user = User::create($request->all());

        $user->enabled = true;
        $user->info_update = true;
        $user->save();

        $stripeCustomer = $user->createAsStripeCustomer();
        // if ($request->hasFile('photo')) {
        //     $user->addMediaFromRequest("photo")->toMediaCollection('photo');
        // }

        Mail::to($user->email)
        	->send(new createAccountMail(
                $user,
                $this->date->setTimezone('America/Caracas')->isoFormat('D-M-Y H:m:s A')
        ));

        toastr()->success('Se creo tu usuario con Exito', '', ['timeOut' => 3000]);

        return redirect()->route('welcome');
    }



    public function editProfile()
    {
        $user = Auth::user();
        return view('profile.edit')
            ->with('user',$user);
    }
    
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $fields = [
            
            "email" => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->where(function ($query) use ($request,$user) {
                    return $query->where('email', $request->email)
                                ->where('id','!=',$user->id);
                }),
            ],
        ];

        if ($request->hasFile('photo')) {
            if ($user->getMedia('photo')->isEmpty()) {
                $fields["photo"] = ['required','file','max:100','mimes:jpeg,png,gif'];
            }
        }

        $msj = [
            'photo.required' => 'Es requerido una foto de Perfil',
            'photo.image' => 'Es requerido que sea solo imagen',
            'photo.max' => 'El peso maximo es de 100kbs 70x70',
            'photo.mimes' => 'Los formatos permitidos son jpeg,png,gif',
            'name.required' => 'El nombre es requerido',
            'email.unique' => 'El correo debe ser unico',
            'uid_discord.unique' => 'El ID del discord es unico',
            'email.required' => 'El correo es requerido',
            'dni.required' => 'El documento de identidad es requerido',
            // 'name_discord.required' => 'El nombre de discord es requerido',
            'password.required' => 'Debes colocar una contraseña',
            'password.min' => 'El minimo de la contraseña es de 8 caracteres',
            'password.confirmed' => 'La contraseña no coincide',
            'role.required' => 'The role is required',
            'phone.required' => 'El telefono es requerido',
        ];

        $this->validate($request, $fields, $msj);

        if ($request->hasFile('photo')) {
            if(!$user->getMedia('photo')->isEmpty()) {
                $user->getFirstMedia('photo')->delete();
            }
            $user->addMediaFromRequest("photo")->toMediaCollection('photo');
        }

        $user->update($request->only([
            'email'
        ]));
        toastr()->success('Se actualizo solo tu perfil', '', ['timeOut' => 3000]);
        return redirect()->route('profile')->withSuccess('Se actualizo solo tu perfil');

        // if ($request->current_trunk_password != '' && $request->trunk_password != '') {
        //     if ($user->trunk_password != null) {
        //         if (Hash::check($request->trunk_password,$user->password)) {
        //             return redirect()->route('profile')->withErrors(array('trunk_password' => 'Debes usar una distinta al inicio sesión' ));
        //         }
        //         if (Hash::check($request->current_trunk_password,$user->trunk_password )) {
        //              $user->update($request->only([
        //                 'name_discord',
        //                 'notify_by_sms',
        //                 'notify_by_email',
        //                 'email',
        //                 'trunk_password'
        //             ]));
        //         }else{
        //             return redirect()->route('profile')->withErrors(array('current_trunk_password' => 'No Coinside con la contraseña actual' ));
        //         }
        //     }else{
        //         return redirect()->route('profile')->withErrors(array('trunk_password' => 'Ocurrio un error intente de nuevo' ));
        //     }
        // }else if($user->trunk_password == null){
        //     if ($request->trunk_password != '') {
        //         if (Hash::check($request->trunk_password,$user->password)) {
        //             return redirect()->route('profile')->withErrors(array('trunk_password' => 'Debes usar una distinta al inicio sesión' ));
        //         }else{
        //             $user->update($request->only([
        //                 'name_discord',
        //                 'notify_by_sms',
        //                 'notify_by_email',
        //                 'email',
        //                 'trunk_password'
        //             ]));
        //             if ($request->session()->has('route')) {
        //                 $route = $request->session()->get('route');
        //                 $request->session()->forget('route');
        //                 return redirect()->route($route)->withSuccess('Se actualizo tu Clave del Baul');
        //             }else{
        //                 return redirect()->route('profile')->withSuccess('Se actualizo tu perfil y Clave del Baul');
        //             }
        //         }
        //     }else{
        //         return redirect()->route('profile')->withErrors(array('trunk_password' => 'Ocurrio un error intente de nuevo' ));
        //     }
        // }else{

        // }

    }
}

