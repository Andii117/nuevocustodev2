<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Seccion extends Model implements AuditableContract
{
    use Auditable;

    protected $fillable = [
        'nombre','estatus',
    ];

    public function cargos()
    {
        return $this->hasMany('App\Cargo', 'secciones_id');
    }
}
