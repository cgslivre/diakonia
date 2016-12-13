<?php

namespace App\Model\membro;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;


class Membro extends Model
{
    use SoftDeletes;
    protected $softDelete = true;

    protected $appends = [
        'telefones_json' , 'idade'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'data_nascimento', 'sexo','regiao','endereco', 'email','telefones', 'grupo_caseiro_id'
    ];

    public function getTelefonesJsonAttribute(){
        return json_decode($this->telefones,TRUE);
    }

    public function grupo(){
        return $this->hasOne('App\Model\membro\GrupoCaseiro','id','grupo_caseiro_id');
    }

    public function getIdadeAttribute(){
        $hoje = new Carbon();
        $nascimento = Carbon::createFromFormat('Y-m-d', $this->data_nascimento);
        return $nascimento->diffInYears($hoje, false);
    }

}
