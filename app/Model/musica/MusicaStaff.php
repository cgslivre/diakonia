<?php

namespace App\Model\musica;

use Illuminate\Database\Eloquent\Model;

class MusicaStaff extends Model
{
    protected $table = 'musica_staff';
    public $timestamps  = false;

    protected $fillable = [
        'user_id', 'lideranca'
    ];

    protected $appends = [
        'servicos_array'
    ];

    public function user(){
        return $this->hasOne('App\User','id','user_id');
    }


    public function servicos(){
        return $this->belongsToMany('App\Model\musica\MusicaServico'
            ,'musica_staff_servico','musica_staff_id','musica_servico_id');
    }

    public function getServicosArrayAttribute(){
        $arr = [];
        $servicos = $this->servicos;
        foreach ($servicos as $servico) {
            $arr[] = $servico->id;
        }
        return $arr;
    }
}
