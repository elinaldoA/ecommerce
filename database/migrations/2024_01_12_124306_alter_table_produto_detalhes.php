<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableProdutoDetalhes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('produto_detalhes', function (Blueprint $table) {
            $table->string('sistema')->nullable();
            $table->string('linha')->nullable();
            $table->string('tipo')->nullable();
            $table->string('classificacao')->nullable();
            $table->string('compatibilidade')->nullable();
            $table->string('audio')->nullable();
            $table->string('video')->nullable();
            $table->string('velocidade')->nullable();
            $table->string('processamento')->nullable();
            $table->string('armazenamento')->nullable();
            $table->string('conectividade')->nullable();
            $table->string('energia')->nullable();
            $table->string('itens_inclusos')->nullable();
            $table->string('garantia')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
