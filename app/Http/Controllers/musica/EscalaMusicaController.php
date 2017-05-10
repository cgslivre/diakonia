<?php

namespace App\Http\Controllers\musica;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use App\Model\evento\Evento;
use App\Model\musica\ColaboradorMusica;
use App\Model\musica\EscalaMusica;
use App\Model\musica\ServicoMusica;

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
        if(isset($request["escala_id"])){
            // Já existe a escala
        } else{
            $lider = ColaboradorMusica::findOrFail($request["lider_id"]);
            $evento = Evento::findOrFail($id);
            $escala = new EscalaMusica;
            $escala->lider_id = $lider->id;
            $escala->evento_id = $evento->id;
            $escala->save();

            // Salvar e redirecionar para edição
            return Redirect::route('musica.escala.edit', [$id, $escala->id])
                ->with('message', 'Líder atualizado!');
        }
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
    public function edit($evento_id, $escala_id)
    {
        $evento = Evento::findOrFail($evento_id);
        $escala = EscalaMusica::findOrFail($escala_id);
        $lideres = ColaboradorMusica::lideres()->get();
        $servicos = ServicoMusica::all();

        return view('musica.escala.edit')
            ->with('evento', $evento)
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
