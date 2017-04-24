<?php

namespace App\Model\material;

use Illuminate\Database\Eloquent\Model;


class Ensino extends Model{


    protected $fillable = [ 'titulo','slug','categoria_ensino_id'];

    public function categoria(){
        return $this->hasOne('App\Model\material\CategoriaEnsino', 'id', 'categoria_ensino_id');
    }

}
