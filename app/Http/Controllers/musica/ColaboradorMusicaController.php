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
        $result = DB::select( DB::raw("SELECT * FROM escalas_musica WHERE id = :escala_id"), [
            'escala_id' => $escala_id
        ]);
        return $result;
    }

    protected function historicoColaborador($colaborador_id){
        return "tudo";

    }


}
