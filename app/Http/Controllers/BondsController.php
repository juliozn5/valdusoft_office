<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class BondsController extends Controller
{
    public function index()
    {
        return view('landing.bonds.bonds'); 
        
    }
}
