<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comercio extends Model
{
    use HasFactory;
    protected $table= "comercios";

    protected $fillable = [
        'comercio',
        'infodelete_departamento',
    ];}
