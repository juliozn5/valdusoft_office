<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Hosting;
use Auth; use DB;

class AdminController extends Controller
{
    public function index(){
        $user = User::all()->where('role', '=', 3);
        $hosting = Hosting::all();

        return view('home.admin')
            ->with('user', $user)
            ->with('hosting', $hosting); 
    }

    public function check_email($email){
        $check = DB::table('users')
                    ->where('email', '=', $email)
                    ->first();
        
        if (is_null($check)){
            return response()->json(false, 200);
        }else{
            return response()->json(true, 200);
        }
    }
}