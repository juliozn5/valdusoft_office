<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class DomainController extends Controller
{
    public function index()
    {
           return view('landing.domain.domain'); 
        
    }
}
