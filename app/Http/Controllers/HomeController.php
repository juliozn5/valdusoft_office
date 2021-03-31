<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\Models\User;
use App\Models\Hosting;

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
           return view('home'); 
        
    }

    public function new()
    {
           return view('home.new'); 
        
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

    public function employe()
    {
           return view('home.employe'); 
        
    }
}
