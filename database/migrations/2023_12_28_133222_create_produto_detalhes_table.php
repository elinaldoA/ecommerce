<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutoDetalhesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produto_detalhes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('marca')->nullable();
            $table->string('modelo')->nullable();
            $table->string('cor')->nullable();
            $table->string('altura')->nullable();
            $table->string('largura')->nullable();
            $table->string('profundidade')->nullable();
            $table->string('peso')->nullable();
            $table->integer('produto_id')->unsigned();
            $table->timestamps();

            $table->foreign('produto_id')
            ->references('id')->on('produtos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produto_detalhes');
    }
}
