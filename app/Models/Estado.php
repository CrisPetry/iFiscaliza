<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "estados";
    protected $fillable = ['descricao', 'sigla'];


    public function denuncias()
    {
        return $this->hasMany("App\Models\Denuncia");
    }

    public function cidades()
    {
        return $this->hasMany("App\Models\Cidade");
    }
}
