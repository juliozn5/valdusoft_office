<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
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


    public function admin()
    {
        $user = User::all()->where('role', '=', 3);
        $hosting = Hosting::all();

        return view('home.admin')
        ->with('user', $user)
        ->with('hosting', $hosting); 
    }

    public function client()
    {
           return view('home.client'); 
        
    }

    public function employes()
    {
           return view('home.employe'); 
        
    }
}
