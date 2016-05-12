<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MusicaServico extends Model
{
    protected $table = 'musica_servicos';

    protected $appends = [
        'icone', 'icone_small','icone_big'
    ];

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
