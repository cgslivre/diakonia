<?php

namespace App\Model\membro;

use Illuminate\Database\Eloquent\Model;
use Log;

class ConsultaMembro extends Model
{
    protected $table = 'consulta_membros';

    protected $with = ['createBy','modifiedBy'];

    public function createBy(){
        return $this->hasOne('App\User', 'id', 'created_by');
    }

    public function modifiedBy(){
        return $this->hasOne('App\User', 'id', 'modified_by');
    }

    public function scopeSlug($query,$slug){
        $query->where('slug','=', $slug);
    }

    public function scopePublica( $query ){
        $query->where('consulta_publica',true);
    }

}
