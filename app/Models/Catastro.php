<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catastro extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo_postal',
        'uso_construccion',
        'superficie_terreno',
        'superficie_construccion',
        'valor_suelo',
        'subsidio',
        'price_unit',
        'price_unit_construction',
    ];
}
