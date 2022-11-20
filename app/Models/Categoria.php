<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categoria extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['nombre','cantidad','tipo_cat'];
    public function negocios()
    {
        return $this->hasMany(Negocio::class,'categorias_id','id');
    }

    public function productos()
    {
        return $this->hasMany(Producto::class,'categorias_id','id');
    }
}
