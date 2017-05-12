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

        $count = [];

        foreach (ServicoMusica::all() as $servico) {
            $count[] = [$servico->id =>
                $escala->tarefas->where('servico_id', $servico->id)->count()];
        }

        dd($count);

        // $this->errors[] = ServicoMusica::VOCAL;

    }
}
