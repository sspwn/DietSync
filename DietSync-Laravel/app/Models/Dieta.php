<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dieta extends Model
{
    protected $fillable = [
        'nome_dieta',
        'tipo_dieta',
        'calorias',
        'proteinas',
        'carboidratos',
        'gorduras',
        'data_dieta',
        'refeicao',
        'alimentos',
        'quantidade',
        'observacoes'
    ];
}
