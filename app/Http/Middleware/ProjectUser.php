<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use DB;

class ProjectUser
{
    protected $auth;
    public function __construct(Guard $guard){
        $this->auth=$guard;
    }

    public function handle(Request $request, Closure $next)
    {
        if ($this->auth->user()->profile_id == 2){
            $check = DB::table('projects')
                        ->select('user_id')
                        ->where('id', '=', $request->route('id'))
                        ->first();
            
            if ($check->user_id != $this->auth->user()->id){
                return redirect()->route('client.home');
            }
        }elseif ($this->auth->user()->profile_id == 3){
            $check = DB::table('projects_users')
                        ->where('user_id', '=', $this->auth->user()->id)
                        ->where('project_id', '=', $request->route('id'))
                        ->first();
            
            if (is_null($check)){
                return redirect()->route('employee.home');
            }
        }

        return $next($request);
    }
}
