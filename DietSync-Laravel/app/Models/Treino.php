<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treino extends Model
{
    protected $table = 'treino';

    protected $primaryKey = 'id_treino';

    protected $fillable = [
        'objetivo',
        'duracao',
        'frequencia',
        'exercicios',
        'serie',
        'repeticao',
        'nome_treino',
        'FK_usuario_id_usuario',
    ];

    // Relacionamento com usuário
    public function usuario()
    {
        return $this->belongsTo(User::class, 'FK_usuario_id_usuario');
    }
}
