<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MusicaEscalaServico extends Model
{
    protected $table = 'musica_escala_servico';
    public $timestamps  = false;

    public function escala(){
        return $this->hasOne('App\Model\musica\MusicaEscala','id','escala_id');
    }

    public function servico(){
        return $this->hasOne('App\Model\musica\MusicaServico','id','musica_servico_id');
    }

    public function staff(){
        return $this->hasOne('App\Model\musica\MusicaStaff','id','musica_staff_id');
    }
}
