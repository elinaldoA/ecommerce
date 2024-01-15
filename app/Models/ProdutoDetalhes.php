<?php

namespace App\Models;

class ProdutoDetalhes extends RModel
{
    protected $table = "produto_detalhes";
    protected $fillable = ['marca','cor','altura','largura','profudidade','peso','produto_id'];
}
