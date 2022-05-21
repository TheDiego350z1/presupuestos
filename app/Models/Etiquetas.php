<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etiquetas extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'tipo',
        'user_id'
    ];

    //todo relación con modelo Usuario y modelo movimieto

    public function movimientos()
    {
        return $this->hasMany(Movimientos::class, 'etiqueta_id');
    }
}
