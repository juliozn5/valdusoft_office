<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\Payrolls;

class PayrollController extends Controller
{
    /** Listado de Nóminas
    *** Perfil: Admin ***/
    public function list(){
        if (Auth::user()->profile_id == 1){
            $payrolls = Payrolls::paginate(10);
             return view('admin.payrolls.list')->with('payrolls', $payrolls);
        }
    }
    
    public function generate(){
        return view('admin.payrolls.generate');                             
    }
    
  
   
}
