<?php

namespace App\Model\evento;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Evento extends Model implements AuditableContract
{
    use SoftDeletes, Auditable;
    protected $table = 'eventos';
    protected $dates = ['deleted_at','created_at','updated_at','data_hora_inicio','data_hora_fim'];
    protected $with = ['createdBy','updatedBy'];
    protected $fillable = [ 'titulo', 'data_hora_inicio', 'data_hora_fim',
        'local_id', 'publico_alvo_id', 'tipo_evento_id', 'descricao' , 'programacao',
        'created_by', 'updated_by'];
    protected $appends = ['status_escala_musica'];

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

    public function escalaMusica(){
        return $this->hasOne('App\Model\musica\EscalaMusica', 'id', 'escala_musica_id');
    }



    /**
     * Escopo para limitar pesquisa apenas aos eventos dos próximos 30 dias
     * @param  Consulta
     * @return Eventos dos próximos 30 dias.
     */
    public function scopeProximos30Dias($query){
        return $query->where('data_hora_inicio', '>=', Carbon::now())
            ->where('data_hora_inicio', '<=', Carbon::now()->addMonth());
    }

    /**
     * Escopo para limitar pesquisa aos eventos posteriores a 30 dias, contados
     * a partir de hoje
     * @param  Consulta
     * @return Eventos futuros.
     */
    public function scopeApos30Dias($query){
        return $query->where('data_hora_inicio', '>=', Carbon::now()->addMonth());
    }

    public function getStatusEscalaMusicaAttribute(){
        if( $this->escalaMusica == NULL ){
            return "sem-escala";
        } else{
            return "escala-ok";
        }
    }

}
