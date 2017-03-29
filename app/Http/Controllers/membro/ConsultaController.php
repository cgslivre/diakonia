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

        dd( $this->consultar($consulta));
        
        return view('membro.consulta.show');

    }

    private function consultar($consulta){
        return DB::table('membros')
            // Opção [tem discípulos]
            ->when($consulta->tem_discipulos, function( $query ) use ($consulta ){
                if( $consulta->tem_discipulos == 'S' ){
                    return $query->whereIn('id', function( $query){
                        $query->select('membro_de_id')
                            ->from('relacionamento_membros')
                            ->where('relacionamento_id','=',6);
                    });
                } else if( $consulta->tem_discipulos == 'N'){
                    return $query->whereNotIn('id', function( $query){
                        $query->select('membro_de_id')
                            ->from('relacionamento_membros')
                            ->where('relacionamento_id','=',6);
                    });
                }
            })
            ->orderBy('nome','ASC')
            ->get();
    }

}
