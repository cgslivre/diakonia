<?php

namespace App\Model\musica;

use Illuminate\Database\Eloquent\Model;

class MusicaEscala extends Model
{
    protected $table = 'musica_escala';

    protected $fillable = [
        'created_at', 'updated_at', 'confirmacao', 'lider_id', 'evento_id','modified_by'
    ];

    public function lider(){
        return $this->hasOne('App\Model\musica\MusicaStaff','id','lider_id');
    }

    public function evento(){
        return $this->hasOne('App\Model\musica\MusicaEvento','id','evento_id');
    }

    public function equipe(){
        return $this->belongsToMany('App\Model\musica\MusicaStaff'
            ,'musica_escala_staff','musica_escala_id','musica_staff_id');
    }

}
