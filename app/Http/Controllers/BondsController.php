<?php

namespace App\Http\Controllers;

class BondsController extends Controller
{
    /**
     * Vista bonos
     *
     * @return void
     */
    public function index()
    {

        return view('landing.bonds.bonds'); 

        
    }
}
