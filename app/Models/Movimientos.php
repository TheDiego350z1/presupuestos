<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movimientos extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'monto',
        'fecha',
        'imagen',
        'tipo',
        'saldo',
        'user_id',
        'etiqueta_id'
    ];

    public function usuario()
    {
        return $this->belonsTo(User::class, 'use_id');
    }

    public function etiqueta()
    {
        return $this->belonsTo(Etiquetas::class, 'etiqueta_id');
    }
}
