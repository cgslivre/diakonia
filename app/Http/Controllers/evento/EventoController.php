<?php

namespace App\Http\Controllers\evento;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Model\evento\Evento;
use App\Http\Requests\evento\EventoRequest;

use Carbon\Carbon;


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
        if(Bouncer::denies('evento-view')){
            abort(403);
        }

        $eventosEm30Dias = Evento::proximos30Dias()->get()->sortBy('data_hora_inicio');
        $eventosDepois30Dias = Evento::apos30Dias()->get()->sortBy('data_hora_inicio');

        return view('evento.evento-index')
            ->with('eventos30Dias', $eventosEm30Dias)
            ->with('eventosApos30Dias', $eventosDepois30Dias);
    }

    public function passado(){

        $eventos = Evento::where('data_hora_inicio', '<=', Carbon::now())->get()
            ->sortByDesc('data_hora_inicio');

        return view('evento.evento-passado')
            ->with('eventos', $eventos);
    }

    public function create(){
        if(Bouncer::denies('evento-edit')){
            abort(403);
        }

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
        if(Bouncer::denies('evento-edit')){
            abort(403);
        }

        $request['created_by'] = Auth::user()->id;
        $request['updated_by'] = Auth::user()->id;
        //dd($request->all());
        $evento = Evento::create($request->all());

        return redirect()->route('evento.edit', ['id' => $evento->id])
            ->with('message', 'Evento salvo!');;

    }

    public function update($id, EventoRequest $request){
        if(Bouncer::denies('evento-edit')){
            abort(403);
        }

        $evento = Evento::findOrFail($id);

        $request['updated_by'] = Auth::user()->id;

        $evento->update( $request->all());

        return Redirect::route('evento.edit', $id)
            ->withInput()->with('message', 'Evento atualizado!');
    }

    public function edit( $id ){
        if(Bouncer::denies('evento-edit')){
            abort(403);
        }

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
        if(Bouncer::denies('evento-remove')){
            abort(403);
        }

        $evento = Evento::findOrFail($id);
        $evento->delete();

        return Redirect::route('evento.index')->with('message',
            'Evento: ' . $evento->titulo . ' removido!');
    }

    public function show( $id ){
        if(Bouncer::denies('evento-view')){
            abort(403);
        }

        $evento = Evento::findOrFail($id);

        return view('evento.evento-show')
            ->with('evento',$evento);

    }



}
