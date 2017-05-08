<?php

namespace App\Model\musica;

use Illuminate\Database\Eloquent\Model;

class ColaboradorMusica extends Model
{
    protected $table = 'colaboradores_musica';
    protected $softDelete = true;

    public function user(){
        return $this->hasOne('App\User','id','user_id');
    }

    /**
     * Escopo consultar apenas os líderes da equipe de música
     * @param  Consulta
     * @return Líderes
     */
    public function scopeLideres($query, $order = 'asc'){
        return $query->where('lider', '=', true );
    }
}
