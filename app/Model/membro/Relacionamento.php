<?php

namespace App\Model\membro;

use Illuminate\Database\Eloquent\Model;

class Relacionamento extends Model
{
    const CATEGORIA_IGREJA = "igreja";
    const CATEGORIA_FAMILIA = "familia";

    const ID_RELACIONAMENTO_DISCIPULADOR = 6;
    const ID_RELACIONAMENTO_DISCIPULO = 5;

    protected $fillable = [
        'desc_geral', 'desc_masc', 'desc_fem','categoria'
    ];
}
