<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PayrollEmployee;
use App\Models\Payrolls;

class PayrollEmployeeController extends Controller
{
    
    public function upgenerate(Request $request){
        $payrolls = PayrollEmployee::find($request->payroll_id);

        $payrolls->upgenerate($request->all());

        $payrolls -> price_by_price = $request -> price_by_price;
        $payrolls->save();


    }
}
