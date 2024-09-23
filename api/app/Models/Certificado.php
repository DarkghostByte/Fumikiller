<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificado extends Model
{
    use HasFactory;

    protected $table= "certificados";

    protected $fillable = [
        'productoCertificadoInt1',
        'productoCertificadoInt2',
        'productoCertificadoExt1',
        'productoCertificadoExt2',
    ];
}
