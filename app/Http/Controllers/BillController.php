<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\Payrolls;
use App\Models\Payments;
use App\Models\Project;
use App\Models\Hosting;
use PDF; use DB; use Mail;
use Carbon\Carbon;

class BillController extends Controller
{
     /** Listado de Facturas
      *** Perfil: Admin ***/
     public function list($type = 'E', $status = '0'){
          if (Auth::user()->profile_id == 1) {
               if ($status == NULL){
                    $employee_bills = Bill::where('type', 'E')
                                        ->with('user:id,name,last_name')
                                        ->orderBy('id', 'DESC')
                                        ->get();

                    $client_bills = Bill::where('type', 'C')
                                        ->with('user:id,name,last_name', 'payments')
                                        ->orderBy('id', 'DESC')
                                        ->get();

                    $hosting_bills = Bill::where('type', 'H')
                                        ->with('hosting:id,url')
                                        ->orderBy('id', 'DESC')
                                        ->get();
               }else{
                    $employee_bills = Bill::where('type', 'E')
                                        ->where('status', $status)
                                        ->with('user:id,name,last_name')
                                        ->orderBy('id', 'DESC')
                                        ->get();

                    $client_bills = Bill::where('type', 'C')
                                        ->where('status', $status)
                                        ->with('user:id,name,last_name', 'payments')
                                        ->orderBy('id', 'DESC')
                                        ->get();

                    $hosting_bills = Bill::where('type', 'H')
                                        ->where('status', $status)
                                        ->with('hosting:id,url')
                                        ->orderBy('id', 'DESC')
                                        ->get();
               }

               foreach($client_bills as $cb){
                    $cb->paid_amount = 0;
                    $cb->pending_payments = false;
                    foreach ($cb->payments as $p){
                         if ($p->status == '1'){
                             $cb->paid_amount += $p->total;
                         }elseif ($p->status == '0'){
                              $cb->pending_payments = true;
                         }
                    }
               }

               $clients = DB::table('users')
                              ->where('profile_id', '2')
                              ->where('status', '1')
                              ->select('id', 'name', 'last_name')
                              ->orderBy('name', 'DESC')
                              ->get();

               $hostings = DB::table('hostings')
                              ->where('status', '0')
                              ->select('id', 'url')
                              ->orderBy('url', 'DESC')
                              ->get();

              return view('admin.bills.list', compact('employee_bills', 'client_bills', 'hosting_bills', 'clients', 'hostings', 'type', 'status'));

          } else if (Auth::user()->profile_id == 2) {
               $bills = Bill::where('user_id', '=', Auth::user()->id)->paginate(10);

               return view('client.bills')->with('bills', $bills);
          } else if (Auth::user()->profile_id == 3) {
               $bills = Bill::where('user_id', '=', Auth::user()->id)->paginate(10);

               return view('employee.bills')->with('bills', $bills);
          }
     }

     public function store(Request $request){
          $total = $request->partial_total;

          $bill = new Bill();
          if (!is_null($request->client_id)){
               $bill->user_id = $request->client_id;
               $bill->type = 'C';
               $bill->project_id = $request->project_id;
          }else{
               $userHosting = DB::table('hostings')
                                   ->select('user_id')
                                   ->where('id', '=', $request->hosting_id)
                                   ->first();

               $bill->user_id = $userHosting->user_id;
               $bill->hosting_id = $request->hosting_id;
               $bill->type = 'H';
          }
          $bill->amount = $request->partial_total;
          $bill->date = date('Y-m-d');
          $bill->save();

          for ($i = 0; $i < count($request->description); $i++){
               $detail = new BillDetail();
               $detail->bill_id = $bill->id;
               $detail->description = $request->description[$i];
               $detail->units = $request->unit[$i];
               $detail->price = $request->price[$i];
               $detail->save();
          }

          if (!is_null($request->discount)){
               $payment = new Payments();
               $payment->bill_id = $bill->id;
               $payment->user_id = $bill->user_id;
               $payment->amount = 0;
               $payment->discount_amount = $request->discount;
               $payment->total = $request->discount;
               $payment->discount_description = 'Descuento general de la factura';
               $payment->date = date('Y-m-d');
               $payment->status = '1';
               $payment->save();

               $total -= $payment->total;
          }

          if (!is_null($request->payed)){

               $payment2 = new Payments();
               $payment2->bill_id = $bill->id;
               $payment2->user_id = $bill->user_id;
               $payment2->amount = $request->payed;
               $payment2->total = $request->payed;
               $payment2->date = date('Y-m-d');
               $payment2->status = '1';
               $payment2->save();

               $total -= $payment2->total;
          }

          if ($total == 0){
               $bill->status = '1';
               $bill->payed_at = date('Y-m-d');
               $bill->save();
          }

          return redirect()->route('admin.bills.list', [$bill->type, '0'])->with('msj-store', 'true');
     }

     public function show($id){
          $bill = Bill::where('id', '=', $id)
                    ->with('user:id,name,last_name,phone,email,tron_wallet', 'payroll_employee', 'payroll_employee.payroll', 'payroll_employee.financing', 'payroll_employee.financing_payment', 'payments')
                    ->first();

          $bill->remaining = $bill->amount;
          foreach ($bill->payments as $payment) {
               if ($payment->status == '1'){
                    $bill->remaining -= $payment->total;
               }
          }

          if (Auth::user()->profile_id == 1){
               return view('admin.bills.show')->with(compact('bill'));
          }else if (Auth::user()->profile_id == 3){
               return view('employee.showBill')->with(compact('bill'));
          }else{
               return view('client.showBill')->with(compact('bill'));
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

          return redirect()->route('admin.payrolls.list', $payroll_id)->with('bills-created', true);
     }

     public function download($bill_id){
          $bill = Bill::where('id', '=', $bill_id)
                    ->with('user:id,name,last_name,phone,email', 'payroll_employee', 'payroll_employee.payroll', 'payroll_employee.financing', 'payroll_employee.financing_payment', 'payments', 'details')
                    ->first();

          if ($bill->type == 'E'){
               $pdf = PDF::loadView('pdfs.payrollEmployeeBill', compact('bill'));
          }else{
               $pdf = PDF::loadView('pdfs.clientBill', compact('bill'));
          }

          return $pdf->stream('factura_'.$bill->id.'.pdf');
     }

     public function downloadPDF($bill_id){
        $bill = Bill::where('id', '=', $bill_id)
                  ->with('user:id,name,last_name,phone,email', 'payroll_employee', 'payroll_employee.payroll', 'payroll_employee.financing', 'payroll_employee.financing_payment', 'payments', 'details')
                  ->first();

        if ($bill->type == 'E'){
             $pdf = PDF::loadView('pdfs.payrollEmployeeBill', compact('bill'));
        }else{
             $pdf = PDF::loadView('pdfs.clientBill', compact('bill'));
        }

        return $pdf->download('factura_'.$bill->id.'.pdf');
   }

     public function send(Request $request){
          $bill = Bill::find($request->bill_id);

          if ($bill->type == 'E'){
              $pdf = PDF::loadView('pdfs.payrollEmployeeBill', compact('bill'));
          }

          $pdf = PDF::loadView('pdfs.clientBill', compact('bill'));
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

     public function saveInvoice(Request $request)
     {

          $bill = new Bill($request->all());
          $bill->type = 'C';
          $bill->status = '0';
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

     public function pending()
     {
      $bills = Bill::where('status', '0')->get();

      return view('admin.bills.pending', compact('bills'));

     }
     public function renovation($id){
          $hosting = Hosting::find($id);
          return view('client.renovation',compact('hosting'));
     }

}
