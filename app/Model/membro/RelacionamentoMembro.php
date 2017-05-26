<?php

namespace App\Model\membro;

use Illuminate\Database\Eloquent\Model;
use Log;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class RelacionamentoMembro extends Model  implements AuditableContract
{
    use Auditable;
    protected $table = 'relacionamento_membros';
    public $timestamps  = false;

    protected $with = ['membroDe','membroPara','relacionamento'];

    public function membroDe(){
        return $this->hasOne('App\Model\membro\Membro','id','membro_de_id');
    }

    public function membroPara(){
        return $this->hasOne('App\Model\membro\Membro','id','membro_para_id');
    }

    public function relacionamento(){
        return $this->hasOne('App\Model\membro\Relacionamento','id','relacionamento_id');
    }

    public function scopeRelacionamentoInverso($query){
        //Log::info($this->relacionamento->rel_inverso_id);
        return $query->where('membro_de_id','=',$this->membro_para_id)
                ->where('membro_para_id','=',$this->membro_de_id)
                ->where('relacionamento_id','=',$this->relacionamento->rel_inverso_id)
                ->first();
    }
}
