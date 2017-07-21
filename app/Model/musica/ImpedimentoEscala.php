<?php

namespace App\Model\musica;

use Illuminate\Database\Eloquent\Model;

class ImpedimentoEscala extends Model
{
    protected $table = 'impedimento_escala_musica';
    protected $softDelete = false;
    protected $appends = ['resolvido'];

    public function escala(){
        return $this->hasOne('App\Model\musica\EscalaMusica','id','escala_id');
    }

    public function colaborador(){
        return $this->hasOne('App\Model\musica\ColaboradorMusica','id','colaborador_id');
    }

    public function getResolvidoAttribute(){
        return $this->resolvido_em == NULL ? false : true;
    }


}
