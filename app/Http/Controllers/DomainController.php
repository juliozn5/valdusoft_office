<?php

namespace App\Http\Controllers;


class DomainController extends Controller
{

    /**
     * Vista dominio
     *
     * @return void
     */
    public function index()
    {

        return view('landing.domain.domain'); 
        
    }
}
