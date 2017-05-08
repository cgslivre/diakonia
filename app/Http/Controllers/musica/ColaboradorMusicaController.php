<?php

namespace App\Http\Controllers\musica;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\musica\ColaboradorMusica;
use App\Model\musica\ServicoMusica;

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
        //
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
