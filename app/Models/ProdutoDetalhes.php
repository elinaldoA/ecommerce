<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdutoDetalhes extends RModel
{
    protected $table = "produto_detalhes";
    protected $fillable = ['marca','cor','altura','largura','profudidade','peso','produto_id'];
}
