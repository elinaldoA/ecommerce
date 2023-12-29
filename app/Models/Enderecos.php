<?php

namespace App\Models;

class Enderecos extends RModel
{
    protected $table = "enderecos";

    protected $fillable = ['logradouro','numero','cidade','estado','cep','complemento'];

    public function setCepAttribute($cep)
    {
        $value = preg_replace("/[^0-9]/", "", $cep);
        $this->attributes["cep"] = $value;
    }
}
