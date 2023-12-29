<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias')->insert([
            'categoria' => 'Geral',
            'created_at' => now(),
        ]);
        DB::table('categorias')->insert([
            'categoria' => 'Tecnologia',
            'created_at' => now(),
        ]);
        DB::table('categorias')->insert([
            'categoria' => 'Esportes & Fitness',
            'created_at' => now(),
        ]);
        DB::table('categorias')->insert([
            'categoria' => 'Moda',
            'created_at' => now(),
        ]);
        DB::table('categorias')->insert([
            'categoria' => 'Casa',
            'created_at' => now(),
        ]);
        DB::table('categorias')->insert([
            'categoria' => 'Saúde',
            'created_at' => now(),
        ]);
        DB::table('categorias')->insert([
            'categoria' => 'Brinquedos & Hobbies',
            'created_at' => now(),
        ]);
        DB::table('categorias')->insert([
            'categoria' => 'Eletrônicos, Áudio & video',
            'created_at' => now(),
        ]);
        DB::table('categorias')->insert([
            'categoria' => 'Serviços',
            'created_at' => now(),
        ]);
    }
}
