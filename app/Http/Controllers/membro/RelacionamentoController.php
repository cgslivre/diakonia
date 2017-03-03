<?php

namespace App\Http\Controllers\membro;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

use App\Http\Requests;
use Response;
use App\Model\membro\Membro;
use App\Model\membro\Relacionamento;
use App\Model\membro\RelacionamentoMembro;

class RelacionamentoController extends Controller
{
    /**
     * Método construtor para submeter controlador a ambiente autenticado.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function relacionamentosMembro( $membro , $categoria = null){
        if( $categoria == null ){
            return RelacionamentoMembro::where('membro_de_id',$membro)->get();
        }

        if( $categoria == Relacionamento::CATEGORIA_IGREJA ||
            $categoria == Relacionamento::CATEGORIA_FAMILIA ){
                $rels = RelacionamentoMembro::with('relacionamento')
                    ->join('relacionamentos', 'relacionamento_id', '=', 'relacionamentos.id')
                    ->where('membro_de_id',$membro)
                    ->where('relacionamentos.categoria','=',$categoria)
                    ->get();
                return $rels;
        } else{
            abort(404);
        }
    }

    public function relacionamentos( $categoria = null ){
        if( $categoria == null ){
            return Relacionamento::orderby('categoria')->get();
        }

        if( $categoria == Relacionamento::CATEGORIA_IGREJA ||
            $categoria == Relacionamento::CATEGORIA_FAMILIA ){
            $rels = Relacionamento::where('categoria',$categoria)->get();
            return $rels;
        } else{
            abort(404);
        }
    }

    public function addRelacionamento( $membro, Request $request ){

        $membroOrigem = Membro::findOrFail($membro);

        $rel_id = $request->input('relacionamento');
        $relacionamento = Relacionamento::findOrFail($rel_id);

        $membroDestino = Membro::findOrFail($request->input('membroDestino'));

        $data = [];
        $erros = [];
        if( $membroOrigem == $membroDestino ){
            $erros[] = "Não é possível fazer um auto-relacionamento.";
        }

        $outrosRels = RelacionamentoMembro::join('relacionamentos','relacionamento_id','=','relacionamentos.id')
            ->where('membro_de_id',$membro)
            ->where('membro_para_id',$membroDestino->id)
            ->where('relacionamentos.categoria','=',$relacionamento->categoria)
            ->get();

        if( !$outrosRels->isEmpty()){
            $erros[] = "Já existe um relacionamento com " . $membroDestino->nome . ".";
        }

        if (!empty($erros)) {
            $data['erros']  = $erros;
        } else {
            $data['mensagem'] = 'Relacionamento adicionado!';
        }

        return Response::json($data);

    }

}
