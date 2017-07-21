<?php

namespace App\Http\Controllers\musica;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use App\Model\musica\ColaboradorMusica;
use App\Model\musica\EscalaMusica;
use App\Model\musica\ImpedimentoEscala;
use App\Events\musica\ImpedimentoEscalaEvent;
use Bouncer;
use Auth;

class ImpedimentoEscalaController extends Controller{

    public function create(Request $request, $escala_id){

        $colaborador = ColaboradorMusica::findOrFail($request["imp_colaborador_id"]);

        self::saveImpedimento($escala_id,$colaborador->id );

        // Salvar e redirecionar para edição
        return Redirect::route('musica.eventos', $colaborador->id)
            ->with('message', 'Impedimento registrado!');
    }

    public function destroy(Request $request, $escala_id){

        $colaborador = ColaboradorMusica::findOrFail($request["imp_colaborador_id_rem"]);

        $impedimentos = ImpedimentoEscala::where('escala_id',$escala_id)
            ->where('colaborador_id', $colaborador->id)->delete();

        // Salvar e redirecionar para edição
        return Redirect::route('musica.eventos', $colaborador->id)
            ->with('message', 'Impedimento removido!');
    }


    private function saveImpedimento( $escala_id , $colaborador_id ){
        $impedimento = new ImpedimentoEscala;
        $impedimento->escala_id = $escala_id;
        $impedimento->colaborador_id = $colaborador_id;
        $impedimento->save();

        if( $impedimento->escala->publicada){
            event( new ImpedimentoEscalaEvent($impedimento));            
        }
    }

    public function token( $token ){
      // 5 Caracters = EscalaMusica
      // 4 Caracters = ColaboradorMusica
      if( strlen($token) != 9 ){
        abort(404);
      }

      $token_escala = substr($token, 0 , 5);
      $token_colaborador = substr($token, 5);

      $escala = EscalaMusica::token($token_escala)->first();
      $colaborador = ColaboradorMusica::token($token_colaborador)->first();

      $titulo = "";
      $mensagem = "";

      if( $escala->tarefas->contains('colaborador_id',$colaborador->id) ||
          $evento->escalaMusica->lider_id == $user->id){
            if( $escala->impedimentos->contains('colaborador_id',$colaborador->id)){
                $titulo = "Impedimento informado";
                $mensagem = "Impedimento já registrado.";
            } else{
                self::saveImpedimento($escala->id,$colaborador->id );
                $titulo = "Impedimento informado";
                $mensagem = "Impedimento registrado. O líder da escala irá receber uma notificação.";
            }
      } else{
          $titulo = "Oooops";
          $mensagem = "Você não está nesta escala";
      }

      if( $escala->lider_id == $colaborador->id){
        // Líder tem impedimento
      } else{

      }

      return view('musica.escala.guest-impedimento-registrado')
                ->with('titulo',$titulo)
                ->with('mensagem', $mensagem);


    }



}
