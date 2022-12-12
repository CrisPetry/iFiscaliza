<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TipoUsuarioSeeder::class);
        $this->call(EstadoSeeder::class);
        $this->call(CidadeSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(InfracoesSeeder::class);
        $this->call(StatusSeeder::class);
    }
}
