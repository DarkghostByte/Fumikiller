<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompletarOrden extends Model
{
    use HasFactory;
    protected $table= "completarOrdenes";

    protected $fillable = [
        'id_orden',
        'responsable',
        'ayudante',
        'productoInt1',
        'productoInt2',
        'productoExt1',
        'productoExt2',
        'noTrapear',
        'noIngresar',
        'otraDosis',
        'hora',
        'pago',
        'requiere1',
        'requiere2',
        'requiere3',
    ];
}

