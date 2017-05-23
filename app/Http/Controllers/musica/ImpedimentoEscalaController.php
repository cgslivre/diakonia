<?php

namespace App\Http\Controllers\musica;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use App\Model\musica\ColaboradorMusica;
use App\Model\musica\EscalaMusica;
use App\Model\musica\ImpedimentoEscala;
use Bouncer;
use Auth;

class ImpedimentoEscalaController extends Controller{

    public function create(Request $request, $escala_id){

        $colaborador = ColaboradorMusica::findOrFail($request["colaborador_id"]);

        // $impedimento = new ImpedimentoEscala;
        // $impedimento->escala_id = $escala_id;
        // $impedimento->colaborador_id = $colaborador->id;
        // $impedimento->save();
        self::saveImpedimento($escala_id,$colaborador->id );

        // Salvar e redirecionar para edição
        return Redirect::route('musica.eventos', $colaborador->id)
            ->with('message', 'Impedimento registrado!');
    }

    public function destroy(Request $request, $escala_id){

        $colaborador = ColaboradorMusica::findOrFail($request["colaborador_id"]);

        $impedimentos = ImpedimentoEscala::where('escala_id',$escala_id)
            ->where('colaborador_id', $colaborador->id)->delete();

        // Salvar e redirecionar para edição
        return Redirect::route('musica.eventos', $colaborador->id)
            ->with('message', 'Impedimento removido!');
    }

    public function tokenCreate( $escala_token, $colaborador_token ){
        $escala = EscalaMusica::token($escala_token)->first();
        $colaborador = ColaboradorMusica::token($colaborador_token)->first();

        if( $escala == NULL || $colaborador == NULL){
            abort(404);
        }

        self::saveImpedimento($escala->id,$colaborador->id );

    }

    private function saveImpedimento( $escala_id , $colaborador_id ){
        $impedimento = new ImpedimentoEscala;
        $impedimento->escala_id = $escala_id;
        $impedimento->colaborador_id = $colaborador->id;
        $impedimento->save();
    }



}
