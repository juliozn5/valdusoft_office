<?php

namespace App\Http\Controllers;

use Auth;


class BillController extends Controller
{
    /** Listado de Facturas
    *** Perfil: Admin ***/
    public function list(){
        if (Auth::user()->profile_id == 1){
            return view('admin.bills.list'); 
        }else if (Auth::user()->profile_id == 2){
            return view('client.bills');
        }
        
    }
}
