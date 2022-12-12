<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Cidade extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "cidades";
    protected $fillable = ['descricao', 'estado_id'];


    public function denuncias()
    {
        return $this->hasMany("App\Models\Denuncia");
    }

    public function estado()
    {
        return $this->belongsTo("App\Models\Estado");
    }

    public function bairros()
    {
        return $this->hasMany("App\Models\Bairro");
    }

}
