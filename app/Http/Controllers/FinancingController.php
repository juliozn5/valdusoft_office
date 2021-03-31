<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class FinancingController extends Controller
{
    public function index()
    {
           return view('landing.financing.financing'); 
        
    }
}
