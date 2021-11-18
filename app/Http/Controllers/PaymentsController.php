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
    public function list($bill_id = NULL)
    {
        if (Auth::user()->profile_id == 1){
            if (is_null($bill_id)){
                $payments = Payments::with('user:id,name,last_name')
                            ->orderBy('id', 'DESC')
                            ->paginate(10);

            }else{
                $payments = Payments::with('user:id,name,last_name')
                                ->where('bill_id', $bill_id)
                                ->orderBy('id', 'DESC')
                                ->paginate(10);
            }
           
            $bills = Bill::where('status', '<>', '1')->get();
            return view('admin.payments.list')->with(compact('payments', 'bills', 'bill_id'));
        }
    }

    public function store(Request $request)
    {
        $bill = Bill::with('payments')
                    ->where('id', '=', $request->bill_id)
                    ->first();
        
        if ($request->payment_type == 'Descuento'){
            $payment = new Payments();
            $payment->bill_id = $bill->id;
            $payment->user_id = Auth::user()->id;
            $payment->amount = 0;
            $payment->discount_amount = $request->discount_amount;
            $payment->total = $request->discount_amount;
            $payment->discount_description = $request->discount_description;
            $payment->date = date('Y-m-d');
            $payment->status = '1';
            $payment->save();
        }else{
            $payment = new Payments($request->all());
            $payment->user_id = $bill->user_id;
            $payment->amount = $request->amount;
            $payment->total = $request->amount;
            $payment->date = date('Y-m-d');
            if (Auth::user()->profile_id == 1){
                $payment->status = '1';
            }else{
                $payment->status = '0';
            }
            $payment->save();

            if ($request->hasFile('support')) {
                $file = $request->file('support');
                $name = $payment->id . "." . $file->getClientOriginalExtension();
                $file->move(public_path() . '/uploads/images/payment-supports', $name);
                $payment->support = $name;
                $payment->save();
            }
        }

        if ($bill->type == 'E'){
            $bill->status = '1';
            $bill->payed_at = date('Y-m-d');
        }else{
            if (Auth::user()->profile_id == 1){
                $paymentsTotal = $bill->amount;
                $paymentsTotal -= $payment->total;

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

        return redirect()->back()->with('msj-store', 'El pago ha sido agregado con éxito');
    }

    public function confirm(Request $request){
        $payment = Payments::find($request->payment_id);

        if ($request->action == 'confirm'){
            $payment->fee = $request->fee;
            $payment->status = '1';
            $payment->save();

            $bill = Bill::with('payments')
                        ->where('id', $payment->bill_id)
                        ->first();

            $totalBill = $bill->amount;
            foreach ($bill->payments as $p) {
                if ($p->status == '1'){
                    $totalBill -= $p->total;
                }
            }

            if ($totalBill <= 0 ){
                $bill->status = '1';
                $bill->payed_at = date('Y-m-d');
            }else{
                if ($totalBill != $bill->amount){
                    $bill->status = '2';
                }
            }

            $bill->save();

            return redirect()->back()->with('msj-confirm', 'true');
        }else{
            $payment->status = '2';
            $payment->save();

            return redirect()->back()->with('msj-cancel', 'true');
        }
    }
    /** Listado de Pagos Pendientes de una Factura
    *** Perfil: Admin ***/
    public function bill_list($bill_id)
    {
        $payments = Payments::with('user:id,name,last_name')
                        ->where('status', '0')
                        ->orderBy('id', 'ASC')
                        ->get();

        return view('admin.bills.partials.paymentsTable')->with(compact('payments'));
    }
  
}
