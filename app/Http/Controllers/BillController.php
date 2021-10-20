<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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

          if ($request->payment_type == "C") {

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

                    return redirect()->back()->with('message', 'Ocurrió un error al crear la renovación');

               }else{
                    return redirect()->back()->with('message', 'Ocurrió un error al crear la renovación');
               }
          }

     }
}
