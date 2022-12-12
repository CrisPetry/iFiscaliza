<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Denuncia extends Model
{
    use HasFactory;
    protected $table = "denuncias";
    protected $fillable = [
        'data',
        'descricao',
        'pontoReferencia',
        'path',
        'users_id',
        'estado_id',
        'cidade_id',
        'infracao_id',
        'status_id',
        'bairro_id'
    ];

    public function user()
    {
        return $this->belongsTo("App\Models\User", "users_id");
    }

    public function estado()
    {
        return $this->belongsTo("App\Models\Estado");
    }

    public function cidade()
    {
        return $this->belongsTo("App\Models\Cidade");
    }

    public function bairro()
    {
        return $this->belongsTo("App\Models\Bairro");
    }

    public function infracao()
    {
        return $this->belongsTo("App\Models\Infracao");
    }

    public function status()
    {
        return $this->belongsTo("App\Models\Status");
    }
}
