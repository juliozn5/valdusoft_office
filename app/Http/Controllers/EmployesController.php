<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class EmployesController extends Controller
{
    public function index()
    {
        $user = User::all()->where('role', '=', 3);

           return view('landing.employes.employes')
           ->with('user', $user); 
    }
}
