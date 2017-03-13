<?php

namespace App\Model\membro;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GrupoCaseiro extends Model{
    
    protected $table = 'grupo_caseiro';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome'
    ];

    public function membros(){
        return $this->hasMany('App\Model\membro\Membro');
    }


}
