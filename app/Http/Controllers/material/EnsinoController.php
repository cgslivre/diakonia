<?php

namespace App\Http\Controllers\material;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class EnsinoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }




}
