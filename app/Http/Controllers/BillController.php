<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Bill;

class BillController extends Controller
{
    /** Listado de Facturas
    *** Perfil: Admin ***/
    public function list(){
        if (Auth::user()->profile_id == 1){
            return view('admin.bills.list');
        }else if (Auth::user()->profile_id == 2){
            $bills = Bill::where('user_id', '=', Auth::user()->id)->paginate(10);
            return view('client.bills')->with('bills', $bills); ;
        }else if (Auth::user()->profile_id == 3){
            $bills = Bill::where('user_id', '=', Auth::user()->id)->paginate(10);
            return view('employee.bills')->with('bills', $bills);
        }

    }

    public function details(){
            return view('employee.billdetail');
        }
}

