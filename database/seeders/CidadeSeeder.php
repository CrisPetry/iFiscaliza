<?php

namespace Database\Seeders;

use App\Models\Cidade;
use Illuminate\Database\Seeder;

class CidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cidade::create(['descricao' => 'Sarandi', 'estado_id' => 21]);
        Cidade::create(['descricao' => 'Passo Fundo', 'estado_id' => 21]);
        Cidade::create(['descricao' => 'Carazinho', 'estado_id' => 21]);
        Cidade::create(['descricao' => 'Porto Alegre', 'estado_id' => 21]);
    }
}
