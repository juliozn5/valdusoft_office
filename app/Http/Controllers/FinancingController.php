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
        $financing = Financing::where('user_id', Auth::id())
                        ->with('financing_payments')
                        ->where('status', '=', '0')
                        ->first();
        $accum = 0;
        if (!is_null($financing)){
            if (!is_null($financing->financing_payments)){
                foreach ($financing->financing_payments as $financing_payment) {
                    $accum += $financing_payment->amount;
                }
            }
        }
        
        $fechaActual = Carbon::now();
        $fechaUser = new Carbon(Auth::user()->admission_date);
        $fechaUser->addYear(1);

        return view('employee.financing')->with(compact('financing', 'fechaUser', 'accum')); 
    }
}
