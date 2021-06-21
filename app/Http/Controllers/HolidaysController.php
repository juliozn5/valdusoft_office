<?php

namespace App\Http\Controllers;


class HolidaysController extends Controller
{
    /** De Interés - Vacaciones
    *** Perfil: Empleado ***/
    public function list(){
        return view('employee.holidays'); 
        
    }
}
