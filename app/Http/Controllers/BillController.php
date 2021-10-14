<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class BillController extends Controller
{
     /** Listado de Facturas
      *** Perfil: Admin ***/
     public function list()
     {
          if (Auth::user()->profile_id == 1) {

               $client_bill = Bill::all()->where('type', 'C');


               $hosting = Bill::all()->where('type', 'H');


               $employer = Bill::all()->where('type', 'E');

               return view('admin.bills.list', compact('client_bill', 'hosting', 'employer'));
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

    public function details($id){
          $factura = Bill::find($id);
          $user = User::find($factura->user_id);
            return view('employee.billdetail', compact('factura', 'user'));
        }
   
        public function BillList(){
          return
               view('admin.bills.BillList');
     }

     public function bill()
     {
          
     }
}
