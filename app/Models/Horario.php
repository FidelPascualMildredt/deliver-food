<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Horario extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['dia','hora_inicio','hora_final'];

    public function negocios()
    {
        return $this->belongsTo(Negocio::class,'negocios_id','id');
    }
    public function nego_horario(){
        return $this->belongsToMany(Negocio::class,'negocio_horario','horarios_id','negocios_id');
    }
}
