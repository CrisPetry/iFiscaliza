<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    protected $fillable = [
        'email',
        'nome',
        'senha',
        'cpf',
        'telefone'
    ];

    public function tipo_usuarios()
    {
        return $this->hasMany(
            TipoUsuario::class,
            'tipo_usuario_id'
        );
    }
}
