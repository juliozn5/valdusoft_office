<?php

namespace App\Http\Controllers;


class BillController extends Controller
{
    /**
     * Vista factura
     *
     * @return void
     */
    public function index()
    {
        return view('landing.bill.bill'); 
        
    }
}
