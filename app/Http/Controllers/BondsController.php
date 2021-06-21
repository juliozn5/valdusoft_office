<?php

namespace App\Http\Controllers;

class BondsController extends Controller
{
    /** De Interés - Bonos
    *** Perfil: Empleado ***/
    public function list(){
        return view('employee.bonds');   
    }
}
