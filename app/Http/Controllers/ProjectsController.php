<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class ProjectsController extends Controller
{
    public function index()
    {
           return view('landing.projects.projects'); 
        
    }
}
