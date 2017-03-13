<?php

namespace App\Http\Controllers\membro;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Regiao;
use Validator;

class RegiaoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $regioes = Regiao::orderBy('nome','asc')->get();
        if(!$regioes->isEmpty()){
            $half = ceil($regioes->count()/3);
            $regioes = $regioes->chunk($half);
        }
        return view('membro.regiao')->with('regioes',$regioes);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
                'nome' => 'required|min:2|unique:regioes'
        ]);

        if( $validator->fails()){
          return redirect('membros/regiao')->withErrors($validator);
        }

        $input = $request->all();

        $regiao = new Regiao;
        $regiao->nome = $input['nome'];

        $regiao->save();

        return redirect('membros/regiao')->with('message', 'Região adicionada!');
    }

    public function destroy($id){
        $regiao = Regiao::findOrFail($id);
        $regiao->delete();
        return redirect('membros/regiao')->with('message', 'Região removida!');
    }

}
