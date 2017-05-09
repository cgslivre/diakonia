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

    public function servicos(){
        return $this->belongsToMany('App\Model\musica\ServicoMusica'
            ,'colaborador_servicos_musica','colaborador_musica_id','servico_musica_id');
    }

    /**
     * Escopo consultar apenas os líderes da equipe de música
     * @param  Consulta
     * @return Líderes
     */
    public function scopeLideres($query, $order = 'asc'){
        return $query->where('lider', '=', true );
    }

    // public function getServicosArrayAttribute(){
    //     $arr = [];
    //     $servicos = $this->servicos;
    //     foreach ($servicos as $servico) {
    //         $arr[] = $servico->id;
    //     }
    //     return $arr;
    // }
}
