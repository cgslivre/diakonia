<?php

namespace App\Model\material;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Ensino extends Model implements AuditableContract
{
    use Auditable;
    const STORAGE_PATH = 'curriculo-ensino';

    protected $fillable = ['titulo', 'slug', 'categoria_ensino_id'];
    public $timestamps = false;

    protected $appends = [
        'file_path'
    ];

    public function getFilePathAttribute()
    {
        return self::STORAGE_PATH . '/' . $this->slug . '.' . $this->extension;
    }

    public function categoria()
    {
        return $this->hasOne('App\Model\material\CategoriaEnsino', 'id', 'categoria_ensino_id');
    }

    public function scopeSlug($query, $slug)
    {
        $query->where('slug', '=', $slug);
    }
}
