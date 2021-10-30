<?php

namespace App\Http\Controllers;

use App\Models\Bond;
use Illuminate\Support\Facades\Request;

class BondsController extends Controller
{
    /** De Interés - Bonos
    *** Perfil: Empleado ***/
    public function list(){
        return view('employee.bonds');   
    }
}
