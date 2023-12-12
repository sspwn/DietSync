<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dieta extends Model
{
    protected $table = 'dieta';

    protected $primaryKey = 'id_dieta';

    protected $fillable = [
        'nome_dieta',
        'tipo_dieta',
        'calorias',
        'proteinas',
        'carboidratos',
        'gorduras',
        'FK_usuario_id_usuario',
    ];

    // Relacionamento com usuário
    public function usuario()
    {
        return $this->belongsTo(User::class, 'FK_usuario_id_usuario');
    }
}
