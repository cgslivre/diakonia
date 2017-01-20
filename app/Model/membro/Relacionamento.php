<?php

namespace App\Model\membro;

use Illuminate\Database\Eloquent\Model;

class Relacionamento extends Model
{
    const CATEGORIA_IGREJA = "igreja";
    const CATEGORIA_FAMILIA = "familia";

    protected $fillable = [
        'desc_geral', 'desc_masc', 'desc_fem','categoria'
    ];
}
