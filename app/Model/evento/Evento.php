<?php

namespace App\Model\evento;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Evento extends Model
{
    use SoftDeletes;
    protected $table = 'eventos';
    protected $dates = ['deleted_at','created_at','updated_at','data_hora_inicio','data_hora_fim'];
    protected $with = ['createdBy','updatedBy'];
    protected $fillable = [ 'titulo', 'data_hora_inicio', 'data_hora_fim',
        'local_id', 'publico_alvo_id', 'tipo_evento_id', 'descricao' , 'programacao',
        'created_by', 'updated_by'];

    public function createdBy(){
        return $this->hasOne('App\User', 'id', 'created_by');
    }

    public function updatedBy(){
        return $this->hasOne('App\User', 'id', 'updated_by');
    }

    public function local(){
        return $this->hasOne('App\Local', 'id', 'local_id');
    }

    public function publicoAlvo(){
        return $this->hasOne('App\Model\evento\PublicoAlvo', 'id', 'publico_alvo_id');
    }

    public function tipoEvento(){
        return $this->hasOne('App\Model\evento\TipoEvento', 'id', 'tipo_evento_id');
    }

}
