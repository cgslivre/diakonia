<?php

namespace App\Model\membro;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use Image;


class Membro extends Model
{
    use SoftDeletes;
    const AVATAR_PATH = 'img/membro';
    const TEMP_FILE = 'avatar-temp-file.jpg';
    protected $softDelete = true;

    protected $appends = [
        'telefones_json' , 'idade'
    ];

    protected $dates = ['created_at', 'updated_at','data_nascimento'];

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

    public function update(array $attributes = [], array $options = []){
        parent::update($attributes,$options);

        if( array_key_exists('avatar',$attributes ) ){
            self::saveAvatar($attributes['avatar'], $this);
        }

        return $this;
    }

    public static function create( array $attributes = [] ){

        $membro = parent::create($attributes);

        if( array_key_exists('avatar',$attributes ) ){
            self::saveAvatar($attributes['avatar'], $membro);
        }

        return $membro;
    }

    private static function saveAvatar($avatar, Membro $membro){
        if( isset($avatar) ){
            $file = $avatar;
            $tempFile = self::TEMP_FILE . $file->getExtension();

            $file->move(self::AVATAR_PATH, $tempFile );

            // membros/avatar/001-avatar.jpg
            $avatarPath = self::AVATAR_PATH . '/' . sprintf('%03d',$membro->id) . '-avatar.jpg';

            // Ajusta para 250px de largura
            $image = Image::make(self::AVATAR_PATH . '/' . $tempFile )
                ->widen(250)
                ->save($avatarPath);

            $membro->avatar_path = $avatarPath;
            $membro->save();
        }
    }

}
