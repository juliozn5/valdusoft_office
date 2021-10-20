<?php

namespace App\Http\Controllers;

use App\Models\Bond;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Payrolls;
use App\Models\Financing;
use App\Models\FinancingPayment;
use App\Models\PayrollEmployee;
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

    public function create(){ 
        $employees = User::where('profile_id', '=',3)
                        ->where('price_per_hour', '<>', NULL)
                        ->with(['financings' => function($query){
                            $query->where('status', '=', '0');
                        }])->orderBy('name', 'ASC')
                        ->get();
        
        return view('admin.payrolls.create')->with(compact('employees'));                             
    }

    public function store(Request $request){
        $payroll = new Payrolls($request->all());
        $payroll->amount = 0;
        $payroll->save();

        $payroll_total = 0;
        for ($i = 1; $i <= $request->employees_count; $i++){
            $inputEmployeeId = 'employee_id_'.$i;
            $inputPriceByHour = 'price_per_hour_'.$i;
            $inputTotalHours = 'hours_'.$i;
            $inputTotalAmount = 'total_'.$i;
            $inputBond = 'bond_'.$i;
            $inputBondAmount = 'bond_amount_'.$i;
            $inputBondDescription = 'bond_description_'.$i;
            $inputFinancing = 'financing_'.$i;
            $inputFinancingAmount = 'financing_amount_'.$i;
            $inputFinancingDescription = 'financing_description_'.$i;
            $inputFinancingPercentage = 'financing_percentage_'.$i;
            
            if ( (!is_null($request->$inputPriceByHour)) && (!is_null($request->$inputTotalHours)) ){
                $payrollEmployee = new PayrollEmployee();
                $payrollEmployee->payroll_id = $payroll->id;
                $payrollEmployee->user_id = $request->$inputEmployeeId;
                $payrollEmployee->price_by_hour = $request->$inputPriceByHour;
                $payrollEmployee->total_hours = $request->$inputTotalHours;
                $payrollEmployee->total_amount = $request->$inputTotalAmount;
                $payrollEmployee->save();

                if ($request->$inputBond == 1){
                    $bond = new Bond();
                    $bond->user_id = $payrollEmployee->user_id;
                    $bond->payroll_employee_id = $payrollEmployee->id;
                    $bond->amount = $request->$inputBondAmount;
                    $bond->description = $request->$inputBondDescription;
                    $bond->save();
                }

                $checkFinancing = Financing::where('user_id', '=', $payrollEmployee->user_id)
                                        ->with('payments')
                                        ->where('status', '=', '0')
                                        ->first();
                
                if (!is_null($checkFinancing)){
                    $accumulated = 0;
                    foreach ($checkFinancing->payments as $pay){
                        $accumulated += $pay->amount;
                    }

                    $remaining = $checkFinancing->total_amount - $accumulated;
                    
                    $payment = new FinancingPayment();
                    $payment->financing_id = $checkFinancing->id;
                    $payment->payroll_employee_id = $payrollEmployee->id;

                    $fee = ($checkFinancing->total_amount * $checkFinancing->percentage) / 100;
                    if ($remaining > $fee){
                        $payment->amount = $fee;
                    }else{
                        $payment->amount = $remaining;
                        $checkFinancing->status = '1';
                        $checkFinancing->save();
                    }
                    
                    $payment->description = 'Descuento quincenal del financiamiento por concepto de '.$checkFinancing->description;
                    $payment->date = date('Y-m-d');
                    $payment->save();
                }else{
                    if ($request->$inputFinancing == 1){
                        $financing = new Financing();
                        $financing->user_id = $payrollEmployee->user_id;
                        $financing->payroll_employee_id = $payrollEmployee->id;
                        $financing->total_amount = $request->$inputFinancingAmount;
                        $financing->description = $request->$inputFinancingDescription;
                        $financing->percentage = $request->$inputFinancingPercentage;
                        $financing->date = date('Y-m-d');
                        $financing->save();
                    }
                }

                $payroll_total += $payrollEmployee->total_amount;
            }
        }

        $payroll->amount = $payroll_total;
        $payroll->save();

        return redirect()->route('admin.payrolls.list')->with('payroll-created', 'true');
    }

    public function show($id){
        $payroll = Payrolls::where('id', '=', $id)
                        ->with('payrolls_employee', 'payrolls_employee.user', 'payrolls_employee.bond', 'payrolls_employee.financing', 'payrolls_employee.financing_payment')
                        ->first();

        return view('admin.payrolls.show', compact('payroll'));                             
    }

    public function edit($id){
        $payroll = Payrolls::where('id', '=', $id)
                        ->with('payrolls_employee', 'payrolls_employee.bond')
                        ->first();
        
        foreach ($payroll->payrolls_employee as $payroll_employee) {
            $financings = DB::table('financing')
                            ->where('user_id', '=', $payroll_employee->user_id)
                            ->where('status', '=', '0')
                            ->first();
            
            $payroll_employee->financings = $financings;
        }

        return view('admin.payrolls.edit', compact('payroll'));                             
    }

    public function update(Request $request){
        $payroll_total = 0;
        for ($i = 1; $i <= $request->payrolls_employees_count; $i++){
            $inputPayrollEmployeeId = 'payroll_employee_id_'.$i;
            $inputTotalHours = 'hours_'.$i;
            $inputTotalAmount = 'total_'.$i;
            $inputBond = 'bond_'.$i;
            $inputBondAmount = 'bond_amount_'.$i;
            $inputBondDescription = 'bond_description_'.$i;
            $inputFinancing = 'financing_'.$i;
            $inputFinancingId = 'financing_id_'.$i;
            $inputFinancingAmount = 'financing_amount_'.$i;
            $inputFinancingDescription = 'financing_description_'.$i;
            $inputFinancingPercentage = 'financing_percentage_'.$i;
            
            $payrollEmployee = PayrollEmployee::find($request->$inputPayrollEmployeeId);
            $payrollEmployee->total_hours = $request->$inputTotalHours;
            $payrollEmployee->total_amount = $request->$inputTotalAmount;
            $payrollEmployee->save();

            $bond = Bond::where('payroll_employee_id', '=', $payrollEmployee->id)
                        ->first();

            if (is_null($payrollEmployee->bond)){
                if ($request->$inputBond == 1){
                    $bond = new Bond();
                    $bond->user_id = $payrollEmployee->user_id;
                    $bond->payroll_employee_id = $payrollEmployee->id;
                    $bond->amount = $request->$inputBondAmount;
                    $bond->description = $request->$inputBondDescription;
                    $bond->save();
                }
            }else{
                if ($request->$inputBond == 0){
                    $bond->delete();
                }else{
                    $bond->amount = $request->$inputBondAmount;
                    $bond->description = $request->$inputBondDescription;
                    $bond->save();
                }
            }
                
            if ( ($request->$inputFinancingId == 0) && ($request->$inputFinancing == 1) ){
                $financing = new Financing();
                $financing->user_id = $payrollEmployee->user_id;
                $financing->payroll_employee_id = $payrollEmployee->id;
                $financing->total_amount = $request->$inputFinancingAmount;
                $financing->description = $request->$inputFinancingDescription;
                $financing->percentage = $request->$inputFinancingPercentage;
                $financing->date = date('Y-m-d');
                $financing->save();
            }

            $payroll_total += $payrollEmployee->total_amount;
        }

        $payroll = Payrolls::find($request->payroll_id);
        $payroll->update($request->all());
        $payroll->amount = $payroll_total;
        $payroll->save();

        return redirect()->route('admin.payrolls.list')->with('payroll-updated', 'true');
    }
}