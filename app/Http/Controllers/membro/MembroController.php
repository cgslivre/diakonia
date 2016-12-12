<?php

namespace App\Http\Controllers\membro;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

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

        $tels = $request['telefone'];
        $arr = array();
        foreach ($tels as $tel) {
            $numero = preg_replace("/[^0-9]/","",$tel["numero"]);
            if( strlen($numero) > 0 ){
                array_push($arr, array("numero"=>$numero,"tipo"=>$tel["tipo"]));
            }
        }
        $request['telefones'] = json_encode($arr);
        Membro::create($request->all());

        return Redirect::route('membros.lista')->with('message', 'Membro adicionado!');

    }

    public function edit( $id ){
        $membro = Membro::findOrFail($id);
        return view('membro.edit', compact('membro'));
    }

    public function update($id, MembroRequest $request){
        $request['telefones'] = self::getTelefonesJson($request['telefone']);
        $membro = Membro::findOrFail($id);
        $membro->update( $request->all());
        return Redirect::back()->withInput()->with('message', 'Membro atualizado!');
    }

    function getTelefonesJson($telefones){
        $arr = array();
        foreach ($telefones as $tel) {
            $numero = preg_replace("/[^0-9]/","",$tel["numero"]);
            if( strlen($numero) > 0 ){
                array_push($arr, array("numero"=>$numero,"tipo"=>$tel["tipo"]));
            }
        }
        return json_encode($arr);
    }
}
