<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\User;
use App\Models\Payrolls;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use PDF; use DB;

class BillController extends Controller
{
     /** Listado de Facturas
      *** Perfil: Admin ***/
     public function list()
     {
          if (Auth::user()->profile_id == 1) {

               $client = Bill::all()->where('type', 'C');
               $hosting = Bill::all()->where('type', 'H');
               $employer = Bill::all()->where('type', 'E');

               $user_client = User::all()->where('profile_id', '2');
               $user_employer = User::all()->where('profile_id', '3');


               return view('admin.bills.list', compact('client', 'hosting', 'employer', 'user_client', 'user_employer'));

          } else if (Auth::user()->profile_id == 2) {
               $bills = Bill::where('user_id', '=', Auth::user()->id)->paginate(10);

               return view('client.bills')->with('bills', $bills);
          } else if (Auth::user()->profile_id == 3) {
               $bills = Bill::where('user_id', '=', Auth::user()->id)->paginate(10);
               return view('employee.bills')->with('bills', $bills);
          }
     }

     public function detail()
     {
          return view('client.billdetail');
     }

     public function details($id)
     {
          $factura = Bill::find($id);
          $user = User::find($factura->user_id);
          return view('employee.billdetail', compact('factura', 'user'));
     }

     public function BillList()
     {
          return view('admin.bills.BillList');
     }

     public function bill(Request $request)
     {
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

     public function prueba(){
          //$pdf = PDF::loadView('pdfs.payrollEmployeeBill');//->setPaper('a4', 'landscape');
        /*$output = $pdf->output();
        $path = public_path()."/certificates/courses/".Auth::user()->ID."-".$curso_id.".pdf"; 
        file_put_contents($path, $output);*/
        //return $pdf->download('certificate.pdf');

        $pdf = PDF::loadView('layouts.bills');
        return $pdf->stream('invoice.pdf');
     }

}
