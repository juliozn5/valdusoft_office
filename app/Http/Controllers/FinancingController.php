<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Bond;
use App\Models\Financing;
use App\Models\PayrollEmployee;
use App\Models\Payrolls;
use Illuminate\Support\Facades\Auth;

class FinancingController extends Controller
{
    /** De Interés - Financiamiento
    *** Perfil: Empleado ***/
     public function list(){


        // $financing = PayrollEmployee::where('user_id', Auth::id())->OrderByDesc('created_at')->first();

         //PRESTAMO
        $financing = Financing::where('user_id', Auth::id())->where('status', '0')->OrderByDesc('created_at')->first();


        //    $financing = Financing::where('user_id', Auth::id())
        //    ->with('financing_payments')
        //    ->where('status', '=', '0')
        //    ->first();

        // $accum = 0;
        // if (!is_null($financing)){
        //  if (!is_null($financing->financing_payments)){
        //         foreach ($financing->financing_payments as $financing_payment) {
        //             $accum += $financing_payment->amount;
        //         }
        //     }
        // }

        $fechaUser = new Carbon(Auth::user()->admission_date);
        $fechaUser->addYears(1);

        if($fechaUser->year <= 2021){
            $fechaUser->year = 2022;
        }

        return view('employee.financing')->with(compact('financing', 'fechaUser'));
    }
}
