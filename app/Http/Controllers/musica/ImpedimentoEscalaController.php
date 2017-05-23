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

        $impedimento = new ImpedimentoEscala;
        $impedimento->escala_id = $escala_id;
        $impedimento->colaborador_id = $colaborador->id;
        $impedimento->save();

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
        dd( $escala_token, $colaborador_token);
    }

    public function token( $token ){
      // 5 Caracters = EscalaMusica
      // 4 Caracters = ColaboradorMusica
      if( strlen($token) != 9 ){
        abort(404);
      }

      $token_escala = substr($token, 0 , 5);
      $token_colaborador = substr($token, 5);

      $escala = EscalaMusica::find(1);
      $colaborador = ColaboradorMusica::find(2);

      if( $escala->lider_id == $colaborador->id){
        // Líder tem impedimento
      } else{
        
      }


    }



}
