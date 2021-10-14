<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Payrolls;
use App\Models\Financing;
use Illuminate\Http\Request;
use App\Models\PayrollEmployee;
use App\Models\PaymentFinancing;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
        $employees = PayrollEmployee::all();
        $bons = financing::all();
        return view('admin.payrolls.DetailPayroll', compact('employees','bons'));                             
    }
    

    public function PayrollList(){
        return view('admin.payrolls.PayrollList');                             
    }
    public function generateloan(Request $request)
    { 
        $data = request();

        DB::table('financing')->insert([
            'total_amount'=> $data['total_amount'],
            'percentage'=> $data['percentage'],
            'user_id' => Auth::user()->id,
           ]);

       return redirect( route('admin.payrolls.generate'));
    }
    public function generatebond(Request $request)
    {
        $data = request();

        DB::table('financing_payments')->insert([
            'amount'=> $data['amount'],
            'description'=> $data['description'],
            // 'financing_id' => ,
        ]);
       
       return redirect( route('admin.payrolls.generate'));

    }
}