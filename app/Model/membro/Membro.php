<?php

namespace App\Model\membro;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;



class Membro extends Model implements AuditableContract
{
    use SoftDeletes;
    use Auditable;
    const AVATAR_PATH = 'img/membro';
    const TEMP_FILE = 'avatar-temp-file.jpg';
    protected $softDelete = true;

    protected $appends = [
        'telefones_json' , 'idade'
    ];

    protected $dates = ['created_at', 'updated_at','data_nascimento'];

    protected $auditExclude = [
        'avatar_path',
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

    public function relacionamentos(){
        return $this->hasMany('App\Model\membro\RelacionamentoMembro','membro_de_id','id');
    }

    public function discipulador(){
        $discipulador = $this->hasMany('App\Model\membro\RelacionamentoMembro','membro_de_id','id')
            ->where('relacionamento_id',Relacionamento::ID_RELACIONAMENTO_DISCIPULO);

        if( $discipulador->get()->isEmpty()){
            $discipulador = null;
        } else{
            $discipulador = $discipulador->first()->membroPara;
        }

        return $discipulador;
    }

    public function getIdadeAttribute(){
        $hoje = new Carbon();
        $nascimento = Carbon::createFromFormat('Y-m-d H:i:s', $this->data_nascimento);
        return $nascimento->diffInYears($hoje, false);
    }



}
