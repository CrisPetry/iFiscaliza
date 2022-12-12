<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bairro extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "bairros";
    protected $fillable = ['descricao', 'cidade_id'];


    public function denuncias()
    {
        return $this->hasMany("App\Models\Denuncia");
    }

    public function cidade()
    {
        return $this->belongsTo("App\Models\Cidade");
    }
}
