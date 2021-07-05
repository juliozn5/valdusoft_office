<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Payrolls;
use Illuminate\Http\Request;

class PayrollController extends Controller
{
    /** Listado de Nóminas
    *** Perfil: Admin ***/
    public function list(){
        if (Auth::user()->profile_id == 1){
            $payrolls = Payrolls::paginate(10);
             return view('admin.payrolls.list')->with('payrolls', $payrolls);
        }
    }
    


    public function update(Request $request){

        $payrolls = Payrolls::find($request->payroll_id);

        $payrolls->update($request->all());

        $payrolls->amount = $request->payroll_amount;

        $payrolls->save();

        return redirect()->route('admin.payrolls.list');
    }

    public function generate(){
        return view('admin.payrolls.generate');                             
    }
    public function DetailPayroll(){
        return view('admin.payrolls.DetailPayroll');                             
    }

    public function PayrollList(){
        return view('admin.payrolls.PayrollList');                             
    }

  
}
