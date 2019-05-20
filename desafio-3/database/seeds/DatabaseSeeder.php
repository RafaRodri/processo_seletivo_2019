<?php

use App\Usuario;
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
        Usuario::create([
            'nome'          => 'Rafael',
            'email'         => 'teste@teste.com',
            'senha'         => '123',
            'dataNascimento'=> '1990-01-01',
        ]);

        Usuario::create([
            'nome'          => 'Rodrigues',
            'email'         => 'teste2@teste.com',
            'senha'         => '123',
            'dataNascimento'=> '1990-01-01',
        ]);
    }
}
