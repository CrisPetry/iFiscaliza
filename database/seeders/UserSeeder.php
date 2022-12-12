<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(['name' => 'Cristian Guilherme Petry',
                     'email' => 'cristianpetry11@hotmail.com',
                     'password' => '$2y$10$mWXCXX.8EM815CHMywWs5uSNqgMphXOmWXMDIJt.O.uVdzWdO6oRe',
                     'cpf' => '010.027.700-80',
                     'telefone' => '(54) 99919-2931',
                     'tipo_usuario_id' => 1]);
    }
}
