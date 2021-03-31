<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use Auth;

class LandingController extends Controller
{
    public function __construct()
    {
        $this->date = new Carbon();
    }

}

