<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class PayrollController extends Controller
{
    public function index()
    {
        if (Auth::guest()){
            return redirect('login');
        }else{
           return view('landing.payroll'); 
        }
        
    }
}
