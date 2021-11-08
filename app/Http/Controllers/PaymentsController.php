<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Payments;
use App\Models\User;
use App\Models\Bill;
use App\Models\PayrollEmployee;
use Faker\Provider\ar_SA\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentsController extends Controller
{
    /** Listado de Pagos
    *** Perfil: Admin ***/
    public function list()
    {
        if (Auth::user()->profile_id == 1){
            $payments = Payments::with('user:id,name,last_name')
                            ->orderBy('id', 'DESC')
                            ->paginate(10);

            $bills = Bill::where('status', '0')->get();
            return view('admin.payments.list')->with(compact('payments', 'bills'));
        }
    }

    public function store(Request $request)
    {
        $bill = Bill::with('payments')
                    ->where('id', '=', $request->bill_id)
                    ->first();
        
        if (!is_null($request->discount_amount)){
            $payment = new Payments();
            $payment->bill_id = $bill->id;
            $payment->user_id = $bill->user_id;
            $payment->amount = 0;
            $payment->discount_amount = $request->discount_amount;
            $payment->total = $request->discount_amount;
            $payment->discount_description = $request->discount_description;
            $payment->date = date('Y-m-d');
            $payment->status = '1';
            $payment->save();
        }
    
        if (!is_null($request->amount)){
            $payment2 = new Payments($request->all());
            $payment2->user_id = $bill->user_id;
            $payment2->amount = $request->amount;
            $payment2->total = $request->amount;
            $payment2->date = date('Y-m-d');
            $payment2->status = '1';
            $payment2->save();
        }

        if ($request->hasFile('support')) {
            $file = $request->file('support');
            $name = $payment->id . "." . $file->getClientOriginalExtension();
            $file->move(public_path() . '/uploads/images/payment-supports', $name);
            $payment->support = $name;
            $payment->save();
        }

        if ($bill->type == 'E'){
            $bill->status = '1';
            $bill->payed_at = date('Y-m-d');
        }else{
            $paymentsTotal = $bill->amount;
            if (isset($payment)){
                $paymentsTotal -= $payment->total;
            }
            if (isset($payment2)){
                $paymentsTotal -= $payment2->total;
            }
            foreach ($bill->payments as $p){
                $paymentsTotal -= $p->total;
            }

            if ($paymentsTotal == 0){
                $bill->status = '1';
                $bill->payed_at = date('Y-m-d');
            }else{
                $bill->status = '2';
            }
        }
        
        $bill->save();

        if (!is_null($bill->payroll_employee_id)){
            $payrollEmployee = PayrollEmployee::find($bill->payroll_employee_id);
            $payrollEmployee->status = '1';
            $payrollEmployee->save();

            $checkPayroll = DB::table('payrolls_employee')
                                ->where('payroll_id', '=', $payrollEmployee->payroll_id)
                                ->where('status', '=', '0')
                                ->count();

            if ($checkPayroll == 0){
                DB::table('payrolls')
                    ->where('id', '=', $payrollEmployee->payroll_id)
                    ->update(['status' => '1', 'updated_at' => date('Y-m-d H:i:s')]);
            }
        }

        return redirect()->back()->with('message', 'El pago ha sido agregado con éxito');
    }
  
}
