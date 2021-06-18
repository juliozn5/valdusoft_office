<?php

namespace App\Http\Controllers;

class PaymentsController extends Controller
{
    /** Listado de Pagos
    *** Perfil: Admin ***/
    public function list(){
        return view('admin.payments.list');    
    }
}
