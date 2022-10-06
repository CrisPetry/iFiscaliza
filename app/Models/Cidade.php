<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    use HasFactory;


    protected $fillable = ['descricao'];
    public $timestamps = false;


    public function denuncias()
    {
        return $this->belongsTo(Denuncia::class);
    }
}
