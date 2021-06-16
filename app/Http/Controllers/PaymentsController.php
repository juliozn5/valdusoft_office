<?php

namespace App\Http\Controllers;

class PaymentsController extends Controller
{

    /**
     * Vista pagos
     *
     * @return void
     */
    public function index()
    {

           return view('landing.payments.payments'); 
           
        
    }
}
