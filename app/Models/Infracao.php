<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Infracao extends Model
{
    use HasFactory;
    protected $table = "infracoes";
    protected $fillable = ['descricao'];
    public $timestamps = false;


    public function denuncias()
    {
        return $this->hasMany("App\Models\Denuncia");
    }
}
