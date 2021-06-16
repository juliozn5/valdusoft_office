<?php

namespace App\Http\Controllers;

class PayrollController extends Controller
{

    /**
     * Vista nomina
     *
     * @return void
     */
    public function index()
    {
        
           return view('landing.payroll.payroll'); 
        
    }
}
