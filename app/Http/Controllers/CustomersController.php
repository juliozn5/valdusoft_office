<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class CustomersController extends Controller
{
    public function index()
    {
        return view('landing.customers.customers'); 
 
    }
}
