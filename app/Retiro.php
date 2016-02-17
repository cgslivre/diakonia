<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Retiro extends Model
{
    protected $dates = ['data_inicio','data_fim']

    protected $casts = ['grupos_disponiveis' => 'array'];
}
