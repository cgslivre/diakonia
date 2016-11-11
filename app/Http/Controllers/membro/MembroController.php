<?php

namespace App\Http\Controllers\membro;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;
use App\Http\Requests\membro\MembroRequest;
use App\Model\membro\Membro;

class MembroController extends Controller
{
    /**
     * Método construtor para submeter controlador a ambiente autenticado.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $membros = Membro::with('grupo')->orderBy('nome','asc')->get();
        return $membros;
    }

    public function lista(){

        //$membros = Membro::all();
        //return view('membro.index' , compact( 'membros'));
        return view('membro.index');
    }

    public function create(){
        return view('membro.create');
    }

    public function store( MembroRequest $request){
        dd($request['telefone']);
        $tels = json_decode($request['telefone'],true);
        dd($tels);
        $telFiltro = array_filter( $tels , function($value){
            print_r($value);
            $filtered_var = filter_var($value, FILTER_SANITIZE_NUMBER_INT);
            return strlen($filtered_var) > 0;
        });
        //dd(json_encode($tels));
        //User::create($request->all());
        //return redirect('usuarios')->with('message', 'Usuário adicionado!');
    }
}
