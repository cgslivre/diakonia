<?php

namespace App\Model\evento;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoEvento extends Model
{
    use SoftDeletes;
    protected $table = 'tipo_evento';

    protected $dates = ['deleted_at'];


    protected $fillable = [ 'nome'];

}
