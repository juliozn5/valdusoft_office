<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class BillController extends Controller
{
    public function index()
    {
        return view('landing.bill.bill'); 
        
    }
}
