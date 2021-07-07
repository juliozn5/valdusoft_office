<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PayrollEmployee;

class PayrollsEmployeeController extends Controller
{
    public function PayrollEmployee(){
        if (Auth::user()->profile_id == 1){
            $payroll = PayrollEmployee::where('user_id', Auth::id())->paginate(10);
            return view('admin.payrolls.generate')->with('payrolls', $payrolls);
        }
}
