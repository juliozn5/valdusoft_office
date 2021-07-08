<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Payrolls;
use Illuminate\Http\Request;
use App\Models\PayrollEmployee;
use App\Models\User;

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
        $employees = User::where('profile_id', '=',3)->get();
        return view('admin.payrolls.generate')->with(compact('employees'));                             
    }

    public function DetailPayroll(){
        return view('admin.payrolls.DetailPayroll');                             
    }
    

    public function PayrollList(){
        return view('admin.payrolls.PayrollList');                             
    }

}