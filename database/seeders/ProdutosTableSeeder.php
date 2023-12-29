<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProdutosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produtos')->insert([
            'nome' => 'Desktop All in One',
            'valor' => '5000',
            'foto' => 'images/produto1.jpg',
            'descricao' => '',
            'categoria_id' => '1',
            'created_at' => now(),
        ]);
        DB::table('produtos')->insert([
            'nome' => 'Tablet',
            'valor' => '2500',
            'foto' => 'images/produto2.jpg',
            'descricao' => '',
            'categoria_id' => '1',
            'created_at' => now(),
        ]);
        DB::table('produtos')->insert([
            'nome' => 'Fone JBL',
            'valor' => '250',
            'foto' => 'images/produto3.jpg',
            'descricao' => '',
            'categoria_id' => '1',
            'created_at' => now(),
        ]);
        DB::table('produtos')->insert([
            'nome' => 'Kit gamer',
            'valor' => '150',
            'foto' => 'images/produto4.jpg',
            'descricao' => '',
            'categoria_id' => '1',
            'created_at' => now(),
        ]);
        DB::table('produtos')->insert([
            'nome' => 'Roteador',
            'valor' => '200',
            'foto' => 'images/produto5.jpg',
            'descricao' => '',
            'categoria_id' => '1',
            'created_at' => now(),
        ]);
        DB::table('produtos')->insert([
            'nome' => 'Smartphone S23',
            'valor' => '3500',
            'foto' => 'images/produto6.jpg',
            'descricao' => 'Samsung Galaxy S23 128GB Preto 5G 8GB RAM 6,1” Câm Tripla + Selfie 12MP',
            'categoria_id' => '1',
            'created_at' => now(),
        ]);
        DB::table('produtos')->insert([
            'nome' => 'Ventilador',
            'valor' => '250',
            'foto' => 'images/produto7.jpg',
            'descricao' => '',
            'categoria_id' => '1',
            'created_at' => now(),
        ]);
        DB::table('produtos')->insert([
            'nome' => 'JBL GO 3',
            'valor' => '300',
            'foto' => 'images/produto8.jpg',
            'descricao' => '',
            'categoria_id' => '1',
            'created_at' => now(),
        ]);
    }
}
