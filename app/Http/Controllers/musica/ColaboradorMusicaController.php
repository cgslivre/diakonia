<?php

namespace App\Http\Controllers\musica;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use App\Model\musica\ColaboradorMusica;
use App\Model\musica\ServicoMusica;
use App\Http\Requests\musica\ColaboradorMusicaRequest;
use App\User;
use Bouncer;
use DB;

class ColaboradorMusicaController extends Controller
{
    public $LIMIT_QUERY_HISTORICO_REFERENCIA = "5";
    public $LIMIT_QUERY_HISTORICO_COLABORADOR = "5";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Bouncer::denies('musica-colaborador-view')){
            abort(403);
        }
        $equipe = ColaboradorMusica::all();
        $servicos = ServicoMusica::all();
        return view('musica.colaboradores.index' , compact( 'equipe','servicos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Bouncer::denies('musica-colaborador-edit')){
            abort(403);
        }
        $servicos = ServicoMusica::all();
        $usuarios = User::query()->whereNotIn('id', function( $query){
            $query->select('user_id')
                ->from('colaboradores_musica');
            })->orderBy('name','ASC')->get();
        return view('musica.colaboradores.create' , compact( 'servicos','usuarios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ColaboradorMusicaRequest $request)
    {
        if(Bouncer::denies('musica-colaborador-edit')){
            abort(403);
        }
        $input = $request->all();
        $colaborador = new ColaboradorMusica;
        $colaborador->user_id = $input['user_id'];
        $colaborador->id = $input['user_id'];
        $colaborador->lider = $input['lider'];
        $colaborador->save();

        $colaborador->servicos()->attach($input['servico']);

        return Redirect::route('musica.colaborador.index')
            ->with('message', 'Membro da equipe de música adicionado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\model\ColaboradorMusica  $colaboradorMusica
     * @return \Illuminate\Http\Response
     */
    public function show(ColaboradorMusica $colaboradorMusica)
    {
        if(Bouncer::denies('musica-colaborador-view')){
            abort(403);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\model\ColaboradorMusica  $colaboradorMusica
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        if(Bouncer::denies('musica-colaborador-edit')){
            abort(403);
        }
        $colaborador = colaboradorMusica::findOrFail($id);
        $servicos = ServicoMusica::all();
        return view('musica.colaboradores.edit', compact('colaborador','servicos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\model\ColaboradorMusica  $colaboradorMusica
     * @return \Illuminate\Http\Response
     */
    public function update(ColaboradorMusicaRequest $request, $id)
    {
        if(Bouncer::denies('musica-colaborador-edit')){
            abort(403);
        }
        $colaborador = ColaboradorMusica::findOrFail($id);
        $input = $request->all();
        $colaborador->lider = $input['lider'];
        $colaborador->save();
        $colaborador->servicos()->sync($input['servico']);

        return Redirect::route('musica.colaborador.index')
            ->with('message', 'Membro da equipe de música atualizado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\model\ColaboradorMusica  $colaboradorMusica
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        if(Bouncer::denies('musica-colaborador-remove')){
            abort(403);
        }
        $colaborador = ColaboradorMusica::findOrFail( $id );
        $colaborador->delete();
        return Redirect::route('musica.colaborador.index')
            ->with('message', 'Usuário removido da equipe de música!');
    }

    public function historico($colaborador_id, $escala_id = null){
        if(Bouncer::denies('musica-colaborador-view')){
            abort(403);
        }

        if( $escala_id == NULL){
            return self::historicoColaborador($colaborador_id);
        } else{
            return self::historicoReferencia($colaborador_id, $escala_id);
        }


    }

    protected function historicoReferencia($colaborador_id, $escala_id){
        $result = DB::select(
    DB::raw("SELECT * FROM (
            (SELECT
              DATE_FORMAT(e.data_hora_inicio,'%d/%m/%Y') AS data
              , e.data_hora_inicio
              , e.escala_musica_id
              , CASE WHEN (SELECT COUNT(1)
                  FROM tarefas_escala_musica t
            	  WHERE t.escala_id = e.escala_musica_id
                  AND t.colaborador_id = :colaborador_id1) > 0 THEN 'escalado' ELSE 'nao-escalado' END AS escalado
              , 'antes' AS referencia
              FROM eventos e
              WHERE e.escala_musica_id IS NOT NULL
                AND e.data_hora_inicio < (SELECT data_hora_inicio FROM eventos WHERE escala_musica_id = :escala_id1)
              ORDER BY e.data_hora_inicio DESC
              LIMIT $this->LIMIT_QUERY_HISTORICO_REFERENCIA
              )
            UNION
            (
            SELECT
            	DATE_FORMAT(e.data_hora_inicio,'%d/%m/%Y') AS data
                , e.data_hora_inicio
                , e.escala_musica_id
                , CASE WHEN (SELECT COUNT(1)
                  FROM tarefas_escala_musica t
            	  WHERE t.escala_id = :escala_id2
                  AND t.colaborador_id = :colaborador_id2) > 0 THEN 'escalado' ELSE 'nao-escalado' END AS escalado
            	, 'atual' AS referencia
            FROM eventos e
            WHERE e.escala_musica_id = :escala_id3
            )
            UNION
            (
            SELECT
              DATE_FORMAT(e.data_hora_inicio,'%d/%m/%Y') AS data
              , e.data_hora_inicio
              , e.escala_musica_id
              , CASE WHEN (SELECT COUNT(1)
                  FROM tarefas_escala_musica t
            	  WHERE t.escala_id = e.escala_musica_id
                  AND t.colaborador_id = :colaborador_id3) > 0 THEN 'escalado' ELSE 'nao-escalado' END AS escalado
              , 'depois' AS referencia
              FROM eventos e
              WHERE e.escala_musica_id IS NOT NULL
                AND e.data_hora_inicio > (SELECT data_hora_inicio FROM eventos WHERE escala_musica_id = :escala_id4)
              ORDER BY e.data_hora_inicio
              LIMIT $this->LIMIT_QUERY_HISTORICO_REFERENCIA
              )
            ) AS C ORDER BY data_hora_inicio"), [
            'escala_id1' => $escala_id,
            'escala_id2' => $escala_id,
            'escala_id3' => $escala_id,
            'escala_id4' => $escala_id,
            'colaborador_id1' => $colaborador_id,
            'colaborador_id2' => $colaborador_id,
            'colaborador_id3' => $colaborador_id,

        ]);
        return $result;
    }

    protected function historicoColaborador($colaborador_id){
        return "tudo";

    }


}
