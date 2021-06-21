<?php

namespace App\Http\Controllers;

class FinancingController extends Controller
{   
    /** De Interés - Financiamiento
    *** Perfil: Empleado ***/
    public function list(){
        return view('employee.financing'); 
    }
}
