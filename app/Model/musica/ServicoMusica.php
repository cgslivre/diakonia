<?php

namespace App\Model\musica;

use Illuminate\Database\Eloquent\Model;

class ServicoMusica extends Model
{
    protected $table = 'servicos_musica';
    public $timestamps  = false;

    protected $appends = [
        'icone', 'icone_small','icone_big'
    ];

    public function colaboradores(){
        return $this->belongsToMany('App\Model\musica\ColaboradorMusica',
            'colaborador_servicos_musica','servico_musica_id','colaborador_musica_id');
    }

    public function getIconeAttribute(){
        return $this->img . '.png';
    }

    public function getIconeSmallAttribute(){
        return $this->img . '-small.png';
    }

    public function getIconeBigAttribute(){
        return $this->img . '-big.png';
    }
}
