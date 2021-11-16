<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'id', 'fk_unidad', 'descripcion', 'utilidad', 'precio_compra', 'precio_venta',
    ];
}
