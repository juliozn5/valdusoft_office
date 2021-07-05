<?php

namespace App\Http\Controllers;

use App\Models\PayrollEmployee;
use Illuminate\Support\Facades\Auth;

class FinancingController extends Controller
{   
    /** De Interés - Financiamiento
    *** Perfil: Empleado ***/
    public function list(){

        $employes = PayrollEmployee::where('user_id', Auth::id())->paginate(10);

        return view('employee.financing')->with(compact('employes')); 
    }
}
