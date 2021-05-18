<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Solicitudes extends Model
{
    use SoftDeletes;
    use HasFactory;

    static function scopeFirmar($model){
        return $model->where('estatus','APROBADO')->where('firma','');
    }
}
