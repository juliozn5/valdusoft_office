<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Hosting;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('auth');

    }

   
    /** 
     * Vista principal para cada rol
     *
     * @return void
     */
    public function index()
    {

        if (Auth::user()->profile_id == 1){

            return redirect('admin');

        }else if(Auth::user()->profile_id == 2){

        }else if(Auth::user()->profile_id == 3){

        }
        
        return view('home'); 
        
    }

    /**
     * Vista home del admin
     *
     * @return void
     */
    public function admin()
    {
        $user = User::all()->where('role', '=', 3);

        $hosting = Hosting::all();

        return view('home.admin')
        ->with('user', $user)
        ->with('hosting', $hosting); 

    }

      /**
     * Vista home del cliente
     *
     * @return void
     */
    public function client()
    {
           return view('home.client'); 
        
    }

      /**
     * Vista home del empleado
     *
     * @return void
     */
    public function employes()
    {
           return view('home.employe'); 
        
    }
}
