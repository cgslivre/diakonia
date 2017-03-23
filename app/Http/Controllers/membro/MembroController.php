<?php

namespace App\Http\Controllers\membro;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

use App\Http\Requests;
use App\Http\Requests\membro\MembroRequest;
use App\Model\membro\Membro;
use App\Model\membro\RelacionamentoIgreja;
use App\Model\membro\RelacionamentoMembro;

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
        if(Bouncer::denies('membro-list')){
            abort(403);
        }
        $membros = Membro::with('grupo')->orderBy('nome','asc')->get();
        return $membros;
    }

    public function lista(){
        $tiposRelIgreja = RelacionamentoIgreja::$tipos;

        //return view('membro.index')->with('tiposRelIgreja',$tiposRelIgreja));
        return view('membro.index')->with('tiposRelIgreja',$tiposRelIgreja);
    }

    public function create(){
        $tiposRelIgreja = RelacionamentoIgreja::$tipos;
        return view('membro.create')->with('tiposRelIgreja',$tiposRelIgreja);
    }

    public function store( MembroRequest $request){
        if(Bouncer::denies('membro-create')){
            abort(403);
        }
        $request['grupo_caseiro_id'] =
            $request['grupo_caseiro_id'] ? $request['grupo_caseiro_id'] : null;
        $request['telefones'] = self::getTelefonesJson($request['telefone']);
        $membro = Membro::create($request->all());

        return redirect()->route('membro.edit', ['id' => $membro->id])
            ->with('message', 'Membro adicionado!');;
    }

    public function edit( $id ){
        $tiposRelIgreja = RelacionamentoIgreja::$tipos;
        $membro = Membro::with('grupo')->findOrFail($id);
        return view('membro.edit', compact('membro'))->with('tiposRelIgreja',$tiposRelIgreja);
    }

    public function update($id, MembroRequest $request){
        if(Bouncer::denies('membro-edit')){
            abort(403);
        }
        $request['grupo_caseiro_id'] =
            $request['grupo_caseiro_id'] ? $request['grupo_caseiro_id'] : null;
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

    public function destroy( $id ){
        if(Bouncer::denies('membro-remove')){
            abort(403);
        }
        $membro = Membro::with('grupo')->findOrFail($id);

        RelacionamentoMembro::where(
            function ($query) use ($id) {
                $query->where( 'membro_de_id', '=', $id )
                    ->orWhere('membro_para_id','=', $id);
            })->delete();

        $membro->delete();

        return Redirect::route('membros.lista')->with('message',
            'Membro: ' . $membro->nome . ' removido(a)!');
    }
}
