<?php

namespace App\Http\Controllers\musica;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use App\Model\musica\ColaboradorMusica;
use App\Model\musica\ServicoMusica;
use App\Http\Requests\musica\ColaboradorMusicaRequest;
use App\User;

class ColaboradorMusicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        $servicos = ServicoMusica::all();
        $usuarios = User::all();
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
        $input = $request->all();
        $colaborador = new ColaboradorMusica;
        $colaborador->user_id = $input['user_id'];
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\model\ColaboradorMusica  $colaboradorMusica
     * @return \Illuminate\Http\Response
     */
    public function edit(ColaboradorMusica $colaboradorMusica)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\model\ColaboradorMusica  $colaboradorMusica
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ColaboradorMusica $colaboradorMusica)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\model\ColaboradorMusica  $colaboradorMusica
     * @return \Illuminate\Http\Response
     */
    public function destroy(ColaboradorMusica $colaboradorMusica)
    {
        //
    }
}
