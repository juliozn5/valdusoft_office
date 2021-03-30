<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\Models\Hosting;

class HostingController extends Controller
{
    public function index()
    {
        $hosting = Hosting::all();
           return view('landing.hosting.hosting')
           ->with('hosting', $hosting); 
        
    }
}
