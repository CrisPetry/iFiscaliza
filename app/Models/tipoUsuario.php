<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoUsuario extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "tipo_usuarios";
    protected $fillable = ['descricao'];

    public function usuarios(){
        return $this->hasMany("App\Models\User");
    }
}
