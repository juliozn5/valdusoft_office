<?php

namespace App\Http\Controllers;


class HolidaysController extends Controller
{

    /**
     * Vista vacaciones
     *
     * @return void
     */
    public function index()
    {

           return view('landing.holidays.holidays'); 
        
    }
}
