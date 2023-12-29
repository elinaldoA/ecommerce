<?php

namespace App\Models;

class Produtos extends RModel
{
    protected $table = "produtos";

    protected $fillable = ['nome','valor','foto','descricao','categoria_id'];
}
