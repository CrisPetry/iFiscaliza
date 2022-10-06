<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Denuncia extends Model
{
    use HasFactory;


    public function infracoes()
    {
        return $this->hasMany(
            Infracao::class,
            'infracao_id'
        );
    }


    public function cidades()
    {
        return $this->hasMany(
            Cidade::class,
            'cidade_id'
        );
    }

    public function estados()
    {
        return $this->hasMany(
            Estado::class,
            'estado_id'
        );
    }
}
