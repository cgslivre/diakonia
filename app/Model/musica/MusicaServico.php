<?php

namespace App\Model\musica;

use Illuminate\Database\Eloquent\Model;

class MusicaServico extends Model
{
    protected $table = 'musica_servicos';
    public $timestamps  = false;

    protected $appends = [
        'icone', 'icone_small','icone_big'
    ];

    public function staff(){
        return $this->belongsToMany('App\Model\musica\MusicaStaff',
            'musica_staff_servico','musica_servico_id','musica_staff_id');
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
