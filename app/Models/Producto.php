<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Producto extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'nombre',
        'precio',
        'descripcion',
        'calificacion',
        'stock',
        'imagen',
        'negocios_id',
        'categorias_id'
    ];

    public function pedidos(){
        return $this->belongsToMany(Pedido::class,'detalle_pedidos','productos_id','pedidos_id')->withPivot('cantidad','precio','total','comentario');
    }


    public function negocios()
    {
        return $this->belongsTo(Negocio::class,'negocios_id','id');
    }

    public function categorias()
    {
        return $this->belongsTo(Categoria::class,'categorias_id','id');
    }
}
