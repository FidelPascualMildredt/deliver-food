<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Detalle_Pedido extends Model
{
    use HasFactory,SoftDeletes;

    public function productos()
    {
        return $this->belongsTo(Producto::class,'productos_id','id');
    }

    public function pedido()
    {
        return $this->belongsTo(Pedido::class,'pedidos_id','id');
    }
}
