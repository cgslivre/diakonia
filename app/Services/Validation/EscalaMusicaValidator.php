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

    protected $errors;

    protected $warnings;


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

        dd($quantidade, $quantidade[ServicoMusica::VOCAL]);



        // $this->errors[] = ServicoMusica::VOCAL;

    }
}
