<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Negocio_Horario extends Model
{
    use HasFactory,SoftDeletes;

    public function negocios()
    {
        return $this->hasOne(Negocio::class,'negocios_id','id');
    }

    public function horarios()
    {
        return $this->hasOne(Horario::class,'horarios_id','id');
    }
}
