<?php

namespace Database\Seeders;

use App\Models\Estado;
use Illuminate\Database\Seeder;

class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Estado::create(['sigla' => 'AC', 'descricao' => 'Acre']);
        Estado::create(['sigla' => 'AL', 'descricao' => 'Alagoas']);
        Estado::create(['sigla' => 'AP', 'descricao' => 'Amapá']);
        Estado::create(['sigla' => 'AM', 'descricao' => 'Amazonas']);
        Estado::create(['sigla' => 'BA', 'descricao' => 'Bahia']);
        Estado::create(['sigla' => 'CE', 'descricao' => 'Ceará']);
        Estado::create(['sigla' => 'DF', 'descricao' => 'Distrito Federal']);
        Estado::create(['sigla' => 'ES', 'descricao' => 'Espírito Santo']);
        Estado::create(['sigla' => 'GO', 'descricao' => 'Goiás']);
        Estado::create(['sigla' => 'MA', 'descricao' => 'Maranhão']);
        Estado::create(['sigla' => 'MT', 'descricao' => 'Mato Grosso']);
        Estado::create(['sigla' => 'MS', 'descricao' => 'Mato Grosso do Sul']);
        Estado::create(['sigla' => 'MG', 'descricao' => 'Minas Gerais']);
        Estado::create(['sigla' => 'PA', 'descricao' => 'Pará']);
        Estado::create(['sigla' => 'PB', 'descricao' => 'Paraíba']);
        Estado::create(['sigla' => 'PR', 'descricao' => 'Paraná']);
        Estado::create(['sigla' => 'PE', 'descricao' => 'Pernambuco']);
        Estado::create(['sigla' => 'PI', 'descricao' => 'Piauí']);
        Estado::create(['sigla' => 'RJ', 'descricao' => 'Rio de Janeiro']);
        Estado::create(['sigla' => 'RN', 'descricao' => 'Rio Grande do Norte']);
        Estado::create(['sigla' => 'RS', 'descricao' => 'Rio Grande do Sul']);
        Estado::create(['sigla' => 'RO', 'descricao' => 'Rondônia']);
        Estado::create(['sigla' => 'RR', 'descricao' => 'Roraima']);
        Estado::create(['sigla' => 'SC', 'descricao' => 'Santa Catarina']);
        Estado::create(['sigla' => 'SP', 'descricao' => 'São Paulo']);
        Estado::create(['sigla' => 'SE', 'descricao' => 'Sergipe']);
        Estado::create(['sigla' => 'TO', 'descricao' => 'Tocantins']);

    }
}
