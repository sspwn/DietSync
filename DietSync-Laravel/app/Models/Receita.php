<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receita extends Model
{
    protected $table = 'receita';

    protected $primaryKey = 'id_receitas';

    protected $fillable = [
        'nome_receita',
        'ingredientes',
        'modo_preparo',
        'calorias',
        'proteinas',
        'carboidratos',
        'gordura',
    ];

    // Relacionamento com dietas
    public function dietas()
    {
        return $this->belongsToMany(Dieta::class, 'contem', 'FK_receita_id_receitas', 'FK_dieta_id_dieta');
    }
}
