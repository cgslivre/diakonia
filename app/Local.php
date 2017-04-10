<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Eloquent\Dialect\Json;

class Local extends Model
{
    protected $table = 'local';

    protected $appends = [
        'localizacao_json'
    ];

    public function getLocalizacaoJsonAttribute(){
        return json_decode($this->localizacao);
    }

    public function scopeSlug($query,$slug){
        $query->where('slug','=', $slug);
    }
}
