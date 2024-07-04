<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    use HasFactory;
    protected $table= "orden";

    protected $fillable = [
        'id_cliente',
        'plague1',
        'plague2',
        'date1',
        'date2',
        'time1',
        'time2',
        'hiring',
        'requires',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }
}
