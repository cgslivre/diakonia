<?php

namespace App\Http\Controllers\membro;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Regiao;
use Bouncer;
use DB;
use Validator;

use App\Model\membro\ConsultaMembro;
use App\Model\membro\Membro;
use App\Model\membro\Relacionamento;

class ConsultaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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
            ->with('grupo')
            ->orderBy('nome','ASC');

            return $query->get();
    }

}
