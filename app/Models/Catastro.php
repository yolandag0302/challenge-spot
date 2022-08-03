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

    public function getUsoConstruccion(int $constructionType): string
    {
        return match (true) {
            1 === $constructionType => 'Areas verdes',
            2 === $constructionType => 'Centro de barrio',
            3 === $constructionType => 'Equipamiento',
            4 === $constructionType => 'Habitacional',
            5 === $constructionType => 'Habitacional y comercial',
            6 === $constructionType => 'Industrial',
            default => 'Sin Zonificación'
        };
    }
}
