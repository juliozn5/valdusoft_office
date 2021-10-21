<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Financing;
use App\Models\PayrollEmployee;
use Illuminate\Support\Facades\Auth;

class FinancingController extends Controller
{   
    /** De Interés - Financiamiento
    *** Perfil: Empleado ***/
    public function list(){
        $user = Auth::user();
        $employes = Financing::where('user_id', Auth::id())->paginate(10);
        $fechaActual = Carbon::now();
        $fechaUser = new Carbon($user->admission_date);
        $fechaUser->addYear(1);
        

        return view('employee.financing')->with(compact('employes', 'fechaUser')); 
    }
}
