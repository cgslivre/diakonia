<?php

namespace App\Http\Controllers\membro;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;
use Validator;
use App\Model\membro\GrupoCaseiro;

class GrupoCaseiroController extends Controller
{
    /**
     * Método construtor para submeter controlador a ambiente autenticado.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

      $grupos = GrupoCaseiro::orderBy('nome','asc')->get();

      return view('membro.grupo-caseiro' , compact( 'grupos'));
    }

    public function salvar(Request $request){
      //$input = Request::all();

      $validator = Validator::make($request->all(), [
              'nome' => 'required|min:2|unique:grupo_caseiro'
      ]);

      if( $validator->fails()){
        return redirect('membro/grupo-caseiro')->withErrors($validator);
        //dd($validator);
      }

      $input = $request->all();

      $grupo = new GrupoCaseiro;
      $grupo->nome = $input['nome'];
      //$grupo->ativo = true;

      $grupo->save();

      return redirect('membro/grupo-caseiro')->with('message', 'Grupo Caseiro adicionado!');
    }

}