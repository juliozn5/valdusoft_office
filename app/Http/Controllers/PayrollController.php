<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class PayrollController extends Controller
{
    public function index()
    {
           return view('landing.payroll.payroll'); 
        
    }
}
