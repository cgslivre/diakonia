<?php

namespace App\Model\membro;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GrupoCaseiro extends Model
{
    use SoftDeletes;
    protected $softDelete = true;

    protected $table = 'grupo_caseiro';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome'
    ];


}
