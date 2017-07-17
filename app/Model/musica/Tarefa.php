<?php

namespace App\Model\musica;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Tarefa extends Model implements AuditableContract
{
    use Auditable;
    protected $table = 'tarefas_escala_musica';
    protected $with = ['servico','colaborador'];
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
