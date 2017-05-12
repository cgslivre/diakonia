<?php

namespace App\Model\musica;

use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    protected $table = 'tarefas_escala_musica';
    public $timestamps  = true;


    public function escala(){
        return $this->hasOne('App\Model\musica\EscalaMusica','id','escala_id');
    }

    public function servico(){
        return $this->hasOne('App\Model\musica\ServicoMusica','id','servico_id');
    }

    public function colaborador(){
        return $this->hasOne('App\Model\musica\ColaboradorMusica','id','colaborador_id');
    }

}
