<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Image;
use Hash;
use Silber\Bouncer\Database\HasRolesAndAbilities;

class User extends Authenticatable
{
    use HasRolesAndAbilities;
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

    public function setPasswordAttribute($value) {
        $this->attributes['password'] = Hash::make($value);
    }

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

    public function update(array $attributes = [], array $options = []){
        parent::update($attributes,$options);

        if( array_key_exists('avatar',$attributes ) ){
            self::saveAvatar($attributes['avatar'], $this);
        }

        return $this;
    }

    public static function create( array $attributes = [] ){

        $user = parent::create($attributes);

        if( array_key_exists('avatar',$attributes ) ){
            self::saveAvatar($attributes['avatar'], $user);
        }

        return $user;
    }

    private static function saveAvatar($avatar, User $user){
        if( isset($avatar) ){
            $file = $avatar;
            $tempFile = self::TEMP_FILE . $file->getExtension();

            $file->move(self::AVATAR_PATH, $tempFile );

            $avatarPath = self::AVATAR_PATH . '/' . sprintf('%03d',$user->id) . '-avatar-';

            $image = Image::make(self::AVATAR_PATH . '/' . $tempFile )
                ->widen(250)
                ->save($avatarPath . User::IMG_SIZE_DEFAULT);

            $image2 = Image::make(self::AVATAR_PATH . '/' . $tempFile )
                ->widen(150)
                ->save($avatarPath . User::IMG_SIZE_MED);

            $image3 = Image::make(self::AVATAR_PATH . '/' . $tempFile )
                ->widen(70)
                ->save($avatarPath . User::IMG_SIZE_SMALL);

            $user->avatar_path = $avatarPath;
            $user->save();
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



}
