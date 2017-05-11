<?php

namespace App\Http\Controllers\musica;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use App\Model\evento\Evento;
use App\Model\musica\ColaboradorMusica;
use App\Model\musica\EscalaMusica;
use App\Model\musica\ServicoMusica;
use App\Model\musica\Tarefa;

class EscalaMusicaController extends Controller
{
    public function eventos()
    {
        $eventosEm30Dias = Evento::proximos30Dias()->get()->sortBy('data_hora_inicio');
        $eventosDepois30Dias = Evento::apos30Dias()->get()->sortBy('data_hora_inicio');

        return view('musica.escala.eventos')
            ->with('eventos30Dias', $eventosEm30Dias)
            ->with('eventosApos30Dias', $eventosDepois30Dias);
    }

    public function addTarefa($escala_id, $servico_id){
        $escala = EscalaMusica::findOrFail($escala_id);
        $servico = ServicoMusica::findOrFail($servico_id);
        $colaboradoresServico = $escala->tarefas->pluck('colaborador_id')->toArray();

        return view('musica.escala.add-tarefa')
            ->with('escala', $escala)
            ->with('colaboradoresServico', $colaboradoresServico)
            ->with('servico', $servico);
    }

    public function addTarefaAction(Request $request, $escala_id, $servico_id){
        $col = ColaboradorMusica::findOrFail($request["colaborador_id"]);
        $escala = EscalaMusica::findOrFail($escala_id);
        $servico = ServicoMusica::findOrFail($servico_id);

        $tarefa = new Tarefa;
        $tarefa->escala_id = $escala->id;
        $tarefa->colaborador_id = $col->id;
        $tarefa->servico_id = $servico->id;

        $tarefa->save();

        return Redirect::route('musica.escala.edit', $escala->id)
            ->with('message', $col->user->name . ' escalado para o serviço de '
                . $servico->descricao);

    }

    public function deleteTarefaAction($tarefa_id){
        $tarefa = Tarefa::findOrFail($tarefa_id);
        $tarefa->delete();

        return Redirect::route('musica.escala.edit', $tarefa->escala->id)
            ->with('message', $tarefa->colaborador->user->name .
                ' removido do serviço ' . $tarefa->servico->descricao);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($evento_id)
    {
        $evento = Evento::findOrFail($evento_id);
        $lideres = ColaboradorMusica::lideres()->get();
        return view('musica.escala.create')
            ->with('evento', $evento)
            ->with('lideres', $lideres);
    }

    public function updateLider(Request $request, $id)
    {
        $lider = ColaboradorMusica::findOrFail($request["lider_id"]);
        $evento = Evento::findOrFail($id);
        if(isset($request["escala_id"])){
            // Já existe a escala
            $escala = EscalaMusica::findOrFail($request["escala_id"]);
        } else{
            $escala = new EscalaMusica;
        }

        $escala->lider_id = $lider->id;
        $escala->evento_id = $evento->id;
        $escala->save();
        $evento->escala_musica_id = $escala->id;
        $evento->save();

        // Salvar e redirecionar para edição
        return Redirect::route('musica.escala.edit', $escala->id)
            ->with('message', 'Líder atualizado!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($escala_id)
    {
        $escala = EscalaMusica::findOrFail($escala_id);
        $lideres = ColaboradorMusica::lideres()->get();
        $servicos = ServicoMusica::all();

        return view('musica.escala.edit')
            ->with('evento', $escala->evento)
            ->with('servicos', $servicos)
            ->with('escala', $escala)
            ->with('lideres', $lideres);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
