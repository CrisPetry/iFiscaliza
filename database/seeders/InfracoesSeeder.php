<?php

namespace Database\Seeders;

use App\Models\Infracao;
use Illuminate\Database\Seeder;

class InfracoesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Infracao::create(['descricao' => 'Estacionar sobre a faixa de pedestre']);
        Infracao::create(['descricao' => 'Veículo parado com pisca alerta em local proibido']);
        Infracao::create(['descricao' => 'Estacionar em acostamento']);
    }
}
