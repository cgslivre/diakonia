<?php

namespace App\Model\evento;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PublicoAlvo extends Model
{
    use SoftDeletes;
    protected $table = 'publico_alvo';

    protected $dates = ['deleted_at'];


    protected $fillable = [ 'nome'];

}
