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
    }

    public function create(){
        $evento = new Evento;

        $tipos = \App\Model\evento\TipoEvento::all()->sortBy('nome');
        $publicos = \App\Model\evento\PublicoAlvo::all()->sortBy('nome');
        $locais = \App\Local::all();
        return view('evento.evento-create')
            ->with('evento', $evento)
            ->with('tipos',$tipos)
            ->with('locais',$locais)
            ->with('publicos',$publicos);
    }

    public function store(EventoRequest $request){
        dd($request);
    }

}
