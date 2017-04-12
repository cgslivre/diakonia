<?php

namespace App\Http\Controllers\evento;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Model\evento\Evento;
use App\Http\Requests\evento\EventoRequest;


use Bouncer;
use DB;
use Auth;
use Validator;



class EventoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $eventos = Evento::all();

        return $eventos->pluck('titulo');
    }

    public function create(){
        $evento = new Evento;

        $tipos = \App\Model\evento\TipoEvento::all();
        $publicos = \App\Model\evento\PublicoAlvo::all()->sortBy('nome');
        $locais = \App\Local::all();
        return view('evento.evento-create')
            ->with('evento', $evento)
            ->with('tipos',$tipos)
            ->with('locais',$locais)
            ->with('publicos',$publicos);
    }

    public function store(EventoRequest $request){
        $request['created_by'] = Auth::user()->id;
        $request['updated_by'] = Auth::user()->id;
        //dd($request->all());
        $evento = Evento::create($request->all());

        return redirect()->route('evento.edit', ['id' => $evento->id])
            ->with('message', 'Evento salvo!');;

    }

    public function update($id, EventoRequest $request){
        $evento = Evento::findOrFail($id);

        $request['updated_by'] = Auth::user()->id;

        $evento->update( $request->all());

        return Redirect::route('evento.edit', $id)
            ->withInput()->with('message', 'Evento atualizado!');
    }

    public function edit( $id ){
        $evento = Evento::findOrFail($id);

        $tipos = \App\Model\evento\TipoEvento::all();
        $publicos = \App\Model\evento\PublicoAlvo::all()->sortBy('nome');
        $locais = \App\Local::all();

        return view('evento.evento-edit')
            ->with('evento', $evento)
            ->with('tipos',$tipos)
            ->with('locais',$locais)
            ->with('publicos',$publicos);;

    }

    public function destroy( $id ){
        $evento = Evento::findOrFail($id);
        $evento->delete();

        return Redirect::route('evento.index')->with('message',
            'Evento: ' . $evento->titulo . ' removido!');
    }



}
