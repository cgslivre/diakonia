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

    public function store( MusicaEventoRequest $request){

        $input = $request->all();
        $id = MusicaEvento::create($input)->id;

        //return redirect('musica/calendario')->with('message', 'Evento adicionado!');
        return Redirect::route('musica.evento.edit',['user'=>$id])->with('message', 'Evento adicionado!');
    }

    public function edit( $id ){
        $evento = MusicaEvento::findOrFail( $id );
        return view('musica.evento.edit', compact('user'));

    }
}
