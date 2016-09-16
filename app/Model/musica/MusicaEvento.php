<?php

namespace App\Model\musica;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class MusicaEvento extends Model
{
    protected $table = 'musica_evento';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'titulo', 'hora','created_by','modified_by'
    ];

    protected $dates = ['hora'];

    protected $appends = [
        'escala_status'
    ];

    public function createBy(){
        return $this->hasOne('App\User', 'id', 'created_by');
    }

    public function modifiedBy(){
        return $this->hasOne('App\User', 'id', 'modified_by');
    }

    public function escala(){
        return $this->hasOne('App\Model\musica\MusicaEscala','id','musica_escala_id');
    }

    public function getEscalaStatusAttribute(){
        $arr = [];
        $escala = $this->escala;
        if( !isset($escala)){
            $arr = ['status'=>'sem-escala','descricao'=>'Sem escala cadastrada!'];
        }

        return $arr;
    }

    /**
     * Escopo para limitar pesquisa apenas aos eventos dos próximos 30 dias
     * @param  Consulta
     * @return Eventos dos próximos 30 dias.
     */
    public function scopeProximos30Dias($query){
        return $query->where('hora', '>=', Carbon::now())
            ->where('hora', '<=', Carbon::now()->addMonth());
    }

    /**
     * Escopo para limitar pesquisa aos eventos posteriores a 30 dias, contados
     * a partir de hoje
     * @param  Consulta
     * @return Eventos futuros.
     */
    public function scopeApos30Dias($query){
        return $query->where('hora', '>', Carbon::now()->addMonth());
    }
}
