<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colonia extends Model
{
    use HasFactory;
    protected $table= "colonias";

    protected $fillable = [
        'colonia',
        'codigoPostal',
        'id_ciudad',
    ];}
