<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\MusicaEventoRequest;
use App\MusicaEvento;
use Auth;
use Carbon\Carbon;

//use App\Http\Requests;

class MusicaEventoController extends Controller
{
    /**
     * Método construtor para submeter controlador a ambiente autenticado.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Método para criar um Evento de Música
     * @return Uma visão para criação do evento de música.
     */
    public function create(){
        return view('musica.evento.create');
    }

    public function edit( $id ){
        $evento = MusicaEvento::findOrFail( $id );
        return view('musica.evento.edit', compact('evento'));
    }

    public function store( MusicaEventoRequest $request){
        $input = $request->all();
        $input['modified_by'] = Auth::user()->id;
        $input['created_by'] = Auth::user()->id;

        $id = MusicaEvento::create($input)->id;
        return Redirect::route('musica.evento.edit',['user'=>$id])->with('message', 'Evento adicionado!');
    }

    public function update( $id, MusicaEventoRequest $request ){
        $evento = MusicaEvento::findOrFail( $id );

        $input = $request->all();
        $input['modified_by'] = Auth::user()->id;

        $evento->update($input);
        return Redirect::route('musica.evento.edit',['user'=>$id])->with('message', 'Evento alterado!');
    }

    public function removerEvento( $id ){
        $evento = MusicaEvento::findOrFail( $id );
        return view('musica.evento.remove', compact('evento'));
    }

    public function destroy($id){
        $evento = MusicaEvento::findOrFail( $id );
        $evento->delete();
        return Redirect::route('musica.evento.index')->with('message', 'Evento removido!');
    }

    public function index(){
        $eventos30 = MusicaEvento::proximos30Dias()->orderBy('hora')->get();
        $eventosFuturos = MusicaEvento::apos30Dias()->orderBy('hora')->get();
        return view('musica.evento.index' , compact( 'eventos30', 'eventosFuturos'));
    }

}
