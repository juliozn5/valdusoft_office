<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\User;
use App\Models\Payrolls;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use PDF; use DB; use Mail;

class BillController extends Controller
{
     /** Listado de Facturas
      *** Perfil: Admin ***/
     public function list()
     {
          if (Auth::user()->profile_id == 1) {
               $employee_bills = Bill::where('type', 'E')
                                   ->with('user:id,name,last_name')
                                   ->orderBy('id', 'DESC')
                                   ->get();

               $client = Bill::all()->where('type', 'C');
               $hosting = Bill::all()->where('type', 'H');
               

               $user_client = User::all()->where('profile_id', '2');
               $user_employer = User::all()->where('profile_id', '3');


               return view('admin.bills.list', compact('client', 'hosting', 'employee_bills', 'user_client', 'user_employer'));

          } else if (Auth::user()->profile_id == 2) {
               $bills = Bill::where('user_id', '=', Auth::user()->id)->paginate(10);

               return view('client.bills')->with('bills', $bills);
          } else if (Auth::user()->profile_id == 3) {
               $bills = Bill::where('user_id', '=', Auth::user()->id)->paginate(10);
     
               return view('employee.bills')->with('bills', $bills);
          }
     }

     public function show($id){
          $bill = Bill::where('id', '=', $id)
                    ->with('user:id,name,last_name,phone,email', 'payroll_employee', 'payroll_employee.payroll', 'payroll_employee.financing', 'payroll_employee.financing_payment', 'payment')
                    ->first();

          if (Auth::user()->profile_id == 1){
               return view('admin.bills.show')->with(compact('bill')); 
          }else if (Auth::user()->profile_id == 3){
               return view('employee.showBill')->with(compact('bill'));
          }
          
     }

     /* Guarda las facturas individuales de una nomina específica*/
     public function store_payrolls_bills($payroll_id){
          $payroll = Payrolls::where('id', '=', $payroll_id)
                        ->with('payrolls_employee')
                        ->first();
          $payroll->status = '1';
          $payroll->save();
          
          foreach ($payroll->payrolls_employee as $payroll_employee){
               $bill = new Bill();
               $bill->payroll_employee_id = $payroll_employee->id;
               $bill->user_id = $payroll_employee->user_id;
               $bill->amount = $payroll_employee->total_amount;
               $bill->date = date('Y-m-d');
               $bill->type = 'E';
               $bill->save();
          }
          
          DB::table('payrolls_employee')
               ->where('payroll_id', '=', $payroll->id)
               ->update(['status' => '1']);
          
          return redirect()->route('admin.payrolls.list', $payroll_id)->with('bills-created', true);
     }

     public function download($bill_id){
          $bill = Bill::where('id', '=', $bill_id)
                    ->with('user:id,name,last_name,phone,email', 'payroll_employee', 'payroll_employee.payroll', 'payroll_employee.financing', 'payroll_employee.financing_payment', 'payment')
                    ->first();

          if ($bill->type == 'E'){
               $pdf = PDF::loadView('pdfs.payrollEmployeeBill', compact('bill'));
          }
          
          return $pdf->stream('factura_'.$bill->id.'.pdf');
     }

     public function send(Request $request){
          $bill = Bill::find($request->bill_id);

          if ($bill->type == 'E'){
              $pdf = PDF::loadView('pdfs.payrollEmployeeBill', compact('bill')); 
          }

          $data['email'] = $request->email;
          $data['subject'] = $request->subject;
          $data['message'] = $request->message;
          $data['bill_id'] = $request->bill_id;

          Mail::send('emails.invoice', ['data' => $data], function ($mail) use ($pdf, $data) {
               $mail->to($data['email']);
               $mail->subject($data['subject']);
               $mail->attachData($pdf->output(), 'factura_'.$data['bill_id'].'.pdf');
          });

          return redirect()->back()->with('msj-send', 'true');
     }



     public function detail()
     {
          return view('client.billdetail');
     }

     public function saveInvoice(Request $request)
     {
          $bill = new Bill($request->all()); 
          $bill->type = 'C';
          $bill->status = '1';
          $bill->date = Carbon::now();
          $bill->payed_at = Carbon::now();
          $bill->save();

          if ($request->tipo_pago == "C") {

               $msj = [
                    'name.required' => 'El nombre es requerido.', 
                    'hash.required' => 'El hash de la operación es requerido.',
                    'amount.required' => 'El monto es requerido.',
                    'amount.numeric' => 'El monto debe ser en números.',
                    'tipo_billetera,required' => 'Por favor ingrese el tipo de documento.'                  
                ];
               $validate = $request->validate([
                    'name' => ['required', 'string', 'max:50'],
                    'tipo_billetera' => ['required', 'string', 'max:50'],
                    'hash' => ['required', 'string', 'max:50'],
                    'amount' => ['required', 'numeric', 'max:50'],
               ], $msj);
               
        
               if ($validate) {
                    $bill->save();
                  
               }else{
                    return redirect()->back()->with('message', 'Ocurrió un error al crear la renovación');
               }

          } else {
               $msj = [
                    'comprobante.required' => 'El comprobante es requerido.', 
                ];
               $validate = $request->validate([
                    'comprobante' => ['required'],
               ], $msj);   
               
               if ($validate) {
                    if ($request->hasFile('comprobante')) {
                         $file = $request->file('comprobante');
                         $name = $bill->id . "." . $file->getClientOriginalExtension();
                         $file->move(public_path('storage') . '/comprobantes', $name);
                         $bill->comprobante = 'comprobantes/' . $name;
                    }
                    $bancolombia = [
                         'nombre' => 'Estefanny Torrado',
                         'cuenta' => '91201530453',
                         'tipo_cuenta' => 'Ahorro',
                         'cedula' => '1.148.456.331',
                    ];     

                    $bill->bancolombia = json_encode($bancolombia);
                    $bill->amount = 0;
                    $bill->save();

                    return redirect()->back()->with('message', 'Renovacion de hosting exitosa');

               }else{
                    return redirect()->back()->with('message', 'Ocurrió un error al crear la renovación');
               }
          }

     }
}
