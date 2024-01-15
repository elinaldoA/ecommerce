<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;

class Cliente extends RModel implements Authenticatable
{
    protected $table = "clientes";

    protected $fillable = ['email','login','password','nome','telefone','nascimento'];

    public function getAuthIdentifierName()
    {
       return 'login';
    }
    public function getAuthIdentifier()
    {
        return $this->login;
    }
    public function getAuthPassword()
    {
        return $this->password;
    }
    public function getRememberToken()
    {
        # code...
    }
    public function setRememberToken($value)
    {
        # code...
    }
    public function getRememberTokenName()
    {
        # code...
    }
    public function setLoginAttribute($login)
    {
        $value = preg_replace("/[^0-9]/", "", $login);
        $this->attributes["login"] = $value;
    }
    public function setTelefoneAttribute($telefone)
    {
        $value = preg_replace("/[^0-9]/", "", $telefone);
        $this->attributes["telefone"] = $value;
    }
}
