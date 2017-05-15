<?php

namespace App\Model\musica;

use Illuminate\Database\Eloquent\Model;

class EscalaMusica extends Model
{
    protected $table = 'escalas_musica';
    protected $softDelete = false;

    protected $fillable = [
        'created_at', 'updated_at', 'lider_id', 'evento_id',
    ];

    protected $appends = ['publicada'];

    protected $dates = ['created_at', 'updated_at','publicado_em'];

    public function lider(){
        return $this->hasOne('App\Model\musica\ColaboradorMusica','id','lider_id');
    }

    public function evento(){
        return $this->hasOne('App\Model\evento\Evento','id','evento_id');
    }

    public function tarefas(){
        return $this->hasMany('App\Model\musica\Tarefa','escala_id');
    }

    public function getPublicadaAttribute(){
        return $this->publicado_em == NULL ? false : true;
    }

}
