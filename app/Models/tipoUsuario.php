<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipoUsuario extends Model
{
    use HasFactory;
    protected $fillable = ['descricao'];
    public $timestamps = false;

    public function usuarios()
    {
        return $this->belongsTo(Usuario::class);
    }
}
