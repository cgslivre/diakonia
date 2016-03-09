<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    const DEFAULT_AVATAR_PATH = 'users/avatar/000-default-';
    const IMG_SIZE_DEFAULT = '250px.jpg';
    const IMG_SIZE_MED = '150px.jpg';
    const IMG_SIZE_SMALL = '70px.jpg';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Retorna o avatar do usuário, caso ele não tenha, retorna um default.
     */
    public function avatarPath(){
        if( is_null($this->avatar_path)){
          return self::DEFAULT_AVATAR_PATH . self::IMG_SIZE_DEFAULT;
        } else{
          return $this->avatar_path . self::IMG_SIZE_DEFAULT;
        }
    }

    /**
     * Retorna o avatar médio do usuário, caso ele não tenha, retorna um default.
     */
    public function avatarPathMedium(){
        if( is_null($this->avatar_path)){
          return self::DEFAULT_AVATAR_PATH . self::IMG_SIZE_MED;
        } else{
          return $this->avatar_path . self::IMG_SIZE_MED;
        }
    }

    /**
     * Retorna o avatar pequeno do usuário, caso ele não tenha, retorna um default.
     */
    public function avatarPathSmall(){
        if( is_null($this->avatar_path)){
          return self::DEFAULT_AVATAR_PATH . self::IMG_SIZE_SMALL;
        } else{
          return $this->avatar_path . self::IMG_SIZE_SMALL;
        }
    }


}
