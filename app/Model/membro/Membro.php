<?php

namespace App\Model\membro;

use Illuminate\Database\Eloquent\Model;

class Membro extends Model
{
    use SoftDeletes;
    protected $softDelete = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'data_nascimento', 'sexo','regiao','endereco',
    ];
}
