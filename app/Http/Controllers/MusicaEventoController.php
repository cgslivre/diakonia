<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\MusicaEventoRequest;
use App\MusicaEvento;
use Auth;

//use App\Http\Requests;

class MusicaEventoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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
        //dd($input);
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

}
