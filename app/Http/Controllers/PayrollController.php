<?php

namespace App\Http\Controllers;

use App\Models\Bond;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Payrolls;
use App\Models\Financing;
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

    public function create(){ 
        $employees = User::where('profile_id', '=',3)
                        ->where('price_per_hour', '<>', NULL)
                        ->orderBy('name', 'ASC')
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
            
            if ( (!is_null($request->$inputPriceByHour)) && (!is_null($request->$inputTotalHours)) ){
                $payrollEmployee = new PayrollEmployee();
                $payrollEmployee->payroll_id = $payroll->id;
                $payrollEmployee->user_id = $request->$inputEmployeeId;
                $payrollEmployee->price_by_hour = $request->$inputPriceByHour;
                $payrollEmployee->total_hours = $request->$inputTotalHours;
                $payrollEmployee->total_amount = $request->$inputTotalAmount;
                $payrollEmployee->save();

                $payroll_total += $payrollEmployee->total_amount;

                if ($request->$inputBond == 1){
                    $bond = new Bond();
                    $bond->user_id = $payrollEmployee->user_id;
                    $bond->payroll_employee_id = $payrollEmployee->id;
                    $bond->amount = $request->$inputBondAmount;
                    $bond->description = $request->$inputBondDescription;
                    $bond->save();

                    $payroll_total += $bond->amount;
                }
            }
        }

        $payroll->amount = $payroll_total;
        $payroll->save();

        return redirect()->route('admin.payrolls.list')->with('payroll-created', 'true');
    }

    public function show($id){
        $payroll = Payrolls::where('id', '=', $id)
                        ->with('payrolls_employee', 'payrolls_employee.user', 'payrolls_employee.bond')
                        ->first();

        return view('admin.payrolls.show', compact('payroll'));                             
    }

    public function edit($id){
        $payroll = Payrolls::where('id', '=', $id)
                        ->with('payrolls_employee', 'payrolls_employee.bond')
                        ->first();

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
            
            $payrollEmployee = PayrollEmployee::find($request->$inputPayrollEmployeeId);

            if ($payrollEmployee->total_hours != $request->$inputTotalHours){
                $payrollEmployee->total_hours = $request->$inputTotalHours;
                $payrollEmployee->total_amount = $request->$inputTotalAmount;
                $payrollEmployee->save();
            }

            $payroll_total += $payrollEmployee->total_amount;

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

                    $payroll_total += $bond->amount;
                }
            }else{
                if ($request->$inputBond == 0){
                    $bond->delete();
                }else{
                    $bond->amount = $request->$inputBondAmount;
                    $bond->description = $request->$inputBondDescription;
                    $bond->save();
                    
                    $payroll_total += $bond->amount;
                }
            }
        }

        $payroll = Payrolls::find($request->payroll_id);
        $payroll->update($request->all());
        $payroll->amount = $payroll_total;
        $payroll->save();

        return redirect()->route('admin.payrolls.list')->with('payroll-updated', 'true');
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
}