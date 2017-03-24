<?php

namespace App\Http\Controllers\membro;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;
use Validator;
use Bouncer;
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

    public function lista(){
        $grupos = GrupoCaseiro::orderBy('nome','asc')->get();
        return $grupos;
    }

    public function salvar(Request $request){
        if(Bouncer::denies('membro-grupo-create')){
            abort(403);
        }

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

      $grupo->save();

      return redirect('membro/grupo-caseiro')->with('message', 'Grupo Caseiro adicionado!');
    }

    public function atualizar(GrupoCaseiro $grupo, Request $request){
        if(Bouncer::denies('membro-grupo-edit')){
            abort(403);
        }
        $request["nome"] = $request["nomeEdicao"];

        $validator = Validator::make($request->all(), [
                'nome' => 'required|min:2|unique:grupo_caseiro,nome,' . $grupo->id
        ]);

        if( $validator->fails()){
          return redirect('membro/grupo-caseiro')->withErrors($validator);
        }

        $grupo->update( $request->all());

        return redirect('membro/grupo-caseiro')->with('message', 'Grupo Caseiro atualizado!');
    }

    public function remover($id){
        if(Bouncer::denies('membro-grupo-remove')){
            abort(403);
        }
        $grupo = GrupoCaseiro::findOrFail($id);
        $nomeGrupo = $grupo->nome;
        if($grupo->membros->isEmpty()){
            $grupo->delete();
            return redirect('membro/grupo-caseiro')
                ->with('message', 'Grupo ' . $nomeGrupo . ' removido.');
        } else{
            return redirect('membro/grupo-caseiro')->with('erro', 'Existem membros vinculados a este grupo caseiro.' .
                'Não é possível remover o grupo.');
        }
    }

}
