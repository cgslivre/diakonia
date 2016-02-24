<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\GrupoInscricao;

class GrupoInscricaoController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index(){

    $grupos = GrupoInscricao::all();

    return view('retiros.grupos' , compact( 'grupos'));
  }
}
