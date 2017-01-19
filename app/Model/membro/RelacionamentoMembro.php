<?php

namespace App\Model\membro;

use Illuminate\Database\Eloquent\Model;

class RelacionamentoMembro extends Model
{
    protected $table = 'relacionamento_membros';
    public $timestamps  = false;

    protected $with = ['membroDe','membroPara','relacionamento'];

    public function membroDe(){
        return $this->hasOne('App\Model\membro\Membro','id','membro_de_id');
    }

    public function membroPara(){
        return $this->hasOne('App\Model\membro\Membro','id','membro_para_id');
    }

    public function relacionamento(){
        return $this->hasOne('App\Model\membro\Relacionamento','id','relacionamento_id');
    }
}
