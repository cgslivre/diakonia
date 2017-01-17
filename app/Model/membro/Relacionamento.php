<?php

namespace App\Model\membro;

use Illuminate\Database\Eloquent\Model;

class Relacionamento extends Model
{
    protected $fillable = [
        'desc_geral', 'desc_masc', 'desc_fem','categoria'
    ];
}
