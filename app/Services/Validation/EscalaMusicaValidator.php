<?php

namespace App\Services\Validation;

use App\Model\musica\EscalaMusica;
use App\Model\musica\ServicoMusica;
/**
 *
 */
class EscalaMusicaValidator
{

    protected $escala;

    public $errors;

    public $warnings;


    function __construct(EscalaMusica $escala)
    {
        $this->escala = $escala;
        self::validate($this->escala);
    }

    protected function validate(EscalaMusica $escala){
        $this->errors = [];
        $this->warnings = [];

        $quantidade = [];

        foreach (ServicoMusica::all() as $servico) {
            $quantidade[$servico->id] =
                $escala->tarefas->where('servico_id', $servico->id)->count();
        }

        if( $quantidade[ServicoMusica::VOCAL] == 0 ){
            $this->errors[] = "Ninguém escalado para o vocal.";
        } elseif( $quantidade[ServicoMusica::VOCAL] == 1){
            $this->warnings[] = "Apenas uma pessoa escalada para o vocal";
        }

        if( $quantidade[ServicoMusica::VIOLAO] == 0 ){
            $this->warnings[] = "Ninguém escalado para tocar violão";
        }

        if( $quantidade[ServicoMusica::BAIXO] == 0 ){
            $this->warnings[] = "Ninguém escalado para tocar baixo";
        } elseif($quantidade[ServicoMusica::BAIXO] > 1 ){
            $this->warnings[] = "Mais de uma pessoa escalada para tocar baixo";
        }

        if( $quantidade[ServicoMusica::TECLADO] == 0 ){
            $this->warnings[] = "Ninguém escalado para tocar teclado";
        } elseif($quantidade[ServicoMusica::TECLADO] > 1 ){
            $this->warnings[] = "Mais de uma pessoa escalada para tocar teclado";
        }

        if( $quantidade[ServicoMusica::BATERIA] == 0 ){
            $this->warnings[] = "Ninguém escalado para tocar bateria";
        } elseif($quantidade[ServicoMusica::BATERIA] > 1 ){
            $this->warnings[] = "Mais de uma pessoa escalada para tocar bateria";
        }

        if( $quantidade[ServicoMusica::MESA] == 0 ){
            $this->warnings[] = "Ninguém escalado para operar a mesa de som";
        } elseif($quantidade[ServicoMusica::MESA] > 1 ){
            $this->warnings[] = "Mais de uma pessoa escalada para na mesa de som";
        }

        if( $quantidade[ServicoMusica::PROJECAO] == 0 ){
            $this->warnings[] = "Ninguém escalado para projetar as letras das músicas";
        } elseif($quantidade[ServicoMusica::PROJECAO] > 1 ){
            $this->warnings[] = "Mais de uma pessoa escalada para projetar as letras das músicas";
        }





        // $this->errors[] = ServicoMusica::VOCAL;

    }
}
