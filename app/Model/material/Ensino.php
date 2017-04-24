<?php

namespace App\Model\material;

use Illuminate\Database\Eloquent\Model;


class Ensino extends Model{

    const STORAGE_PATH = 'curriculo-ensino';

    protected $fillable = [ 'titulo','slug','categoria_ensino_id'];
    public $timestamps  = false;

    public function categoria(){
        return $this->hasOne('App\Model\material\CategoriaEnsino', 'id', 'categoria_ensino_id');
    }

}
