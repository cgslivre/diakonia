<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
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

    $grupos = GrupoInscricao::orderBy('nome','asc')->get();

    return view('retiros.grupos' , compact( 'grupos'));
  }

  public function salvar(Request $request){
    //$input = Request::all();

    $validator = Validator::make($request->all(), [
            'nome' => 'required|min:2|unique:grupo_inscricao'
    ]);

    if( $validator->fails()){
      return redirect('/retiros/grupos')->withErrors($validator);
      //dd($validator);
    }

    $input = $request->all();

    $grupo = new GrupoInscricao;
    $grupo->nome = $input['nome'];
    //$grupo->ativo = true;

    $grupo->save();

    return redirect('/retiros/grupos')->with('message', 'Grupo adicionado!');
  }
}
