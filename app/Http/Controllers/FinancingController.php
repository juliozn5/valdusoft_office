<?php

namespace App\Http\Controllers;

class FinancingController extends Controller
{

    /**
     * Vista financiamiento
     *
     * @return void
     */
    public function index()
    {

           return view('landing.financing.financing'); 
        
    }
}
