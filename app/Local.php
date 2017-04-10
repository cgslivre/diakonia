<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Eloquent\Dialect\Json;

class Local extends Model
{
    use SoftDeletes;
    protected $table = 'local';

    protected $dates = ['deleted_at'];


    protected $fillable = [
        'slug', 'nome', 'cidade','endereco','uf', 'localizacao'
        ,'imagem_path'
     ];

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
