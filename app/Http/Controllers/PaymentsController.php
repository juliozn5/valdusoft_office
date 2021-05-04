<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class PaymentsController extends Controller
{
    public function index()
    {
           return view('landing.payments.payments'); 
        
    }
}
