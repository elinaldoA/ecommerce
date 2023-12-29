<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProdutoDetalhesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produto_detalhes')->insert([
            'marca' => 'LG',
            'modelo' => '22V280',
            'cor' => 'Branco',
            'altura' => '132mm',
            'largura' => '509mm',
            'profundidade' => '189mm',
            'peso' => '4kg',
            'produto_id' => '1',
            'created_at' => now(),
        ]);
    }
}
