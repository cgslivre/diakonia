<?php

namespace App\Http\Controllers\evento;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Model\evento\TipoEvento;


use Bouncer;
use DB;
use Auth;
use Validator;



class TipoEventoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $tipos = TipoEvento::all()->sortBy('nome');
        return $tipos;
    }



}
