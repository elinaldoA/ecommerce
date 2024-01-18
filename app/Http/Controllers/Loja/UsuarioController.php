<?php

namespace App\Http\Controllers\Loja;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    public function logar(Request $request)
    {
        $data = [];

        if($request->isMethod("POST")){
            //Se entrar nesse if é porque o usuário clicou no botão logar
            $login = $request->input("login");
            $senha = $request->input("senha");

            $login = preg_replace("/[^0-9]/", "", $login);

            $credential = ['login' => $login, 'password' => $senha];
            //logar
            if(Auth::guard()->attempt($credential)){
                return redirect()->route("home");
            }else{
                $request->session()->flash("err","Usuário ou senha inválido");
                return redirect()->route("logar");
            }
        }

        return view("logar", $data);
    }

    public function sair(Request $request)
    {
        Auth::logout();
        return redirect()->route("home");
    }
}
