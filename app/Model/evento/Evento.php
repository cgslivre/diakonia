<?php

namespace App\Model\evento;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Evento extends Model
{
    use SoftDeletes;
    protected $table = 'eventos';
    protected $dates = ['deleted_at','created_at','updated_at','data_hora_inicio','data_hora_fim'];
    protected $with = ['createBy','modifiedBy'];
    protected $fillable = [ 'titulo', 'data_hora_inicio', 'data_hora_fim',
        'local_id', 'publico_alvo_id', 'tipo_evento_id', 'descricao' , 'programacao',
        'created_by', 'updated_by'];

    public function createBy(){
        return $this->hasOne('App\User', 'id', 'created_by');
    }

    public function modifiedBy(){
        return $this->hasOne('App\User', 'id', 'updated_by');
    }

}
