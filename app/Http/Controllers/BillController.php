<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class BillController extends Controller
{
    public function index()
    {
        if (Auth::guest()){
            return redirect('login');
        }else{
           return view('landing.bill'); 
        }
        
    }
}
