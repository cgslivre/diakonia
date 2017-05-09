<?php

namespace App\Http\Controllers\musica;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\evento\Evento;

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
        return view('musica.escala.create')
            ->with('evento', $evento);
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
    public function edit($id)
    {
        //
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
