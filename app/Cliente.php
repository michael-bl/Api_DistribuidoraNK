<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'id', 'fk_localidad', 'nombre', 'telefono', 'email', 'direccion',
    ];
}
