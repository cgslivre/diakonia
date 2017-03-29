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

        /*
        $year = 2012;
        $published = true;

        DB::table('node')
        ->where(function($query) use ($published, $year)
        {
            if ($published) {
                $query->where('published', 'true');
            }

            if (!empty($year) && is_numeric($year)) {
                $query->where('year', '>', $year);
            }
        })
        ->get( array('column1','column2') );
*/
        return view('membro.consulta.show');

    }

    private function consultar($consulta){
        return DB::table('membros')
            ->where( function( $query) use ($consulta){
                // Idade Minima
                if( $consulta->idade_minima ){

                }

                // Idade Maxima
                if( $consulta->idade_minima ){

                }

                // Se é discipulador
                if( $consulta->tem_discipulos ){

                }

                // Se tem discipulos
                if( $consulta->tem_discipulador){
                    
                }
            })->get();
    }

}
