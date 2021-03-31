<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HolidaysController extends Controller
{
    public function index()
    {
           return view('landing.holidays.holidays'); 
        
    }
}
