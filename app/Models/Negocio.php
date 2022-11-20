<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Negocio extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['nombre','direccion','correo','telefono','calificacion','categorias_id'];



    public function horarios()
    {
        return $this->belongsTo(Horario::class,'horarios_id','id');
    }
    public function categoria()
    {
        return $this->belongsTo(Categoria::class,'categorias_id','id');
    }

    public function negocio_horario(){
        return $this->belongsToMany(Horario::class,'negocio_horario','negocios_id','horarios_id');
    }


    public function productos(){
        return $this->hasMany(Producto::class,'negocios_id','id');
    }
    public function pedidos(){
        return $this->hasMany(Pedido::class,'negocios_id','id');
    }

}
