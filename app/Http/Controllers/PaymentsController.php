<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Payments;
use App\Models\User;
use App\Models\bill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentsController extends Controller
{
    /** Listado de Pagos
    *** Perfil: Admin ***/
    public function list(){
         $users = User::all();
         $bills = bill::where('status', '0')->get();

         if (Auth::user()->profile_id == 1){
            $payments = payments::where('user_id', '=', Auth::user()->id)->paginate(10);
            return view('admin.payments.list')->with('payments', $payments)->with('users', $users)->with('bills', $bills);
        }

    }

    public function billpayment(){
        return view('admin.payments.billpayment');
    }
    public function generate(request $request)
    {

       $data = request();

       DB::table('payments')->insert([
           'user_id' => $data['user_id'],
           'bill_id' => $data['bill_id'],
           'payment_method' => $data['payment_method'],
           'amount' => $data['amount'],
           'fee' => $data['fee'],
           'total' => $data['total'],
           'date' => $data['date'],
       ]);



        return redirect()->back()->with('msj-success', 'Saldo retirado con exito');
    }
}
