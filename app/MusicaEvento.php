<?php

namespace App;

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

    public function createBy(){
        return $this->hasOne('App\User', 'id', 'created_by');
    }

    public function modifiedBy(){
        return $this->hasOne('App\User', 'id', 'modified_by');
    }

    public function setHoraAttribute($date){
        $this->attributes['hora'] = Carbon::createFromFormat('j/n/Y G:i', $date)->format('Y-m-d H:i:s');
    }

}
