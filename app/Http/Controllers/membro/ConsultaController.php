<?php

namespace App\Http\Controllers\membro;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Regiao;
use Bouncer;
use DB;
use Auth;
use Validator;

use App\Model\membro\ConsultaMembro;
use App\Model\membro\Membro;
use App\Model\membro\Relacionamento;
use App\Http\Requests\membro\ConsultaMembroRequest;

class ConsultaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $consultasPublicas = ConsultaMembro::publica()->get();

        $consultasPrivadas = ConsultaMembro::where('created_by',Auth::user()->id)
            ->where('consulta_publica',false)->get();



        return view('membro.consulta.index')
            ->with('consultasPublicas',$consultasPublicas)
            ->with('consultasPrivadas',$consultasPrivadas);

    }

    public function show($slug){

        // Aborta se não encontrar consulta com o slug informado
        $consulta = ConsultaMembro::slug($slug)->first();
        if( !$consulta ){
            abort(404);
        }

        $membros = $this->consultar($consulta);

        return view('membro.consulta.show')
            ->with('membros',$membros)
            ->with('consulta',$consulta);

    }

    public function edit( $id ){
        $consulta = ConsultaMembro::findOrFail($id);
        $membros = $this->consultar($consulta);

        return view('membro.consulta.edit')
            ->with('membros',$membros)
            ->with('consulta',$consulta);

    }

    public function update($id, ConsultaMembroRequest $request){
        dd($request);

        return Redirect::route('consulta.edit')
            ->withInput()->with('message', 'Consulta atualizada!');
    }

    private function consultar($consulta){
        $query = Membro::query();
        $query
            // Opção [tem discípulos]
            ->when($consulta->tem_discipulos, function( $query ) use ($consulta ){
                if( $consulta->tem_discipulos == 'S' ){
                    return $query->whereIn('id', function( $query){
                        $query->select('membro_de_id')
                            ->from('relacionamento_membros')
                            ->where('relacionamento_id','=',Relacionamento::ID_RELACIONAMENTO_DISCIPULADOR);
                    });
                } else if( $consulta->tem_discipulos == 'N'){
                    return $query->whereNotIn('id', function( $query){
                        $query->select('membro_de_id')
                            ->from('relacionamento_membros')
                            ->where('relacionamento_id','=',Relacionamento::ID_RELACIONAMENTO_DISCIPULADOR);
                    });
                }
            })
            // Opção [é discipulador]
            ->when($consulta->tem_discipulador, function( $query ) use ($consulta ){
                if( $consulta->tem_discipulador == 'S' ){
                    return $query->whereIn('id', function( $query){
                        $query->select('membro_de_id')
                            ->from('relacionamento_membros')
                            ->where('relacionamento_id','=',Relacionamento::ID_RELACIONAMENTO_DISCIPULO);
                    });
                } else if( $consulta->tem_discipulador == 'N'){
                    return $query->whereNotIn('id', function( $query){
                        $query->select('membro_de_id')
                            ->from('relacionamento_membros')
                            ->where('relacionamento_id','=',Relacionamento::ID_RELACIONAMENTO_DISCIPULO);
                    });
                }
            })
            // Opção [Idade Mínima]
            ->when($consulta->idade_minima, function( $query ) use ($consulta ){
                $data = \Carbon\Carbon::now()->subYears($consulta->idade_minima)->toDateString();
                return $query->where('data_nascimento','<=',$data);
            })
            // Opção [Idade Máxima]
            ->when($consulta->idade_maxima, function( $query ) use ($consulta ){
                $data = \Carbon\Carbon::now()->subYears($consulta->idade_maxima)->toDateString();
                return $query->where('data_nascimento','>=',$data);
            })
            // Opção [Sexo]
            ->when($consulta->sexo, function( $query ) use ($consulta ){
                return $query->where('sexo','=',$consulta->sexo);
            })
            ->with('grupo')
            ->orderBy('nome','ASC');

            return $query->get();
    }

}
