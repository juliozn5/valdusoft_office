<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PayrollEmployee;
use App\Models\Payrolls;

class PayrollEmployeeController extends Controller
{
    
    public function upgenerate(Request $request){
        $payroll = new Payrolls($request->all());
        $payroll->amount = 0;
        $payroll->save();

        $payroll_total = 0;
        for ($i = 1; $i <= $request->employees_count; $i++){
            $inputEmployeeId = 'employee_id_'.$i;
            $inputPriceByHour = 'price_by_hour_'.$i;
            $inputTotalHours = 'total_hours_'.$i;

            $total = $request->$inputPriceByHour * $request->$inputTotalHours;

            $payrollEmployee = new PayrollEmployee();
            $payrollEmployee->payroll_id = $payroll->id;
            $payrollEmployee->user_id = $request->$inputEmployeeId;
            $payrollEmployee->price_by_hour = $request->$inputPriceByHour;
            $payrollEmployee->total_hours = $request->$inputTotalHours;
            $payrollEmployee->date = $request->date;
            $payrollEmployee->total_amount = $total;
            $payrollEmployee->save();

            $payroll_total = $payroll_total + $total;
        }

        $payroll->amount = $payroll_total;
        $payroll->save();

        return redirect()->route('admin.payrolls.generate');
    }
}
