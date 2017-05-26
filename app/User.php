<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Image;
use Hash;
use Silber\Bouncer\Database\HasRolesAndAbilities;
use Illuminate\Notifications\Notifiable;
use App\Notifications\ResetPasswordEmail;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class User extends Authenticatable implements AuditableContract
{
    use HasRolesAndAbilities, Notifiable, Auditable;
    const DEFAULT_AVATAR_PATH = 'users/avatar/000-default-';
    const IMG_SIZE_DEFAULT = '250px.jpg';
    const IMG_SIZE_MED = '150px.jpg';
    const IMG_SIZE_SMALL = '70px.jpg';
    const TEMP_FILE = 'avatar-temp-file.jpg';
    const AVATAR_PATH = 'users/avatar';

    use SoftDeletes;
    protected $softDelete = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','telefone'
    ];

    protected $auditExclude = [
        'remember_token', 'password', 'avatar_path'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $appends = [
        'usuario_roles'
    ];

    public function setTelefoneAttribute($value){
        $this->attributes['telefone'] = preg_replace("/[^0-9]/","",$value);
    }

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


    public function getUsuarioRolesAttribute(){
        $roles = $this->roles()->get();
        return $roles->pluck('name')->filter( function($role){
            if( 0 === strpos($role, 'role-user')){
                return true;
            }
        });
    }

    public function sendPasswordResetNotification($token)    {
        $this->notify(new ResetPasswordEmail($token));
    }



}
