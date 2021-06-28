<?php

namespace App\Http\Controllers;

class PayrollController extends Controller
{
    /** Listado de Nóminas
    *** Perfil: Admin ***/
    public function list(){
        return view('admin.payrolls.list'); 
    }
    
    public function generate(){
        return view('admin.payrolls.generate');                             
    }
   
}
