<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Enderecos;
use Illuminate\Http\Request;
use App\Services\ClienteService;
use Hash;

class ClienteController extends Controller
{
    public function cadastrar(Request $request)
    {
        $data = [];
        return view('cadastrar', $data);
    }
    public function cadastrarCliente(Request $request)
    {
        //Pegar todos os valores do formulário
        $values = $request->all();
        $usuario = new Usuario();
        $usuario->fill($values);
        $usuario->login = $request->input("cpf",'');
        $senha = $request->input("password",'');
        $usuario->password = \Hash::make($senha); //criptografa a senha do cliente
        $endereco = new Enderecos($values);
        $endereco->logradouro = $request->input('endereco','');

        $clienteService = new ClienteService();
        $result = $clienteService->salvarUsuario($usuario, $endereco);

        $message = $result["message"];
        $status = $result["status"];

        $request->session()->flash($status, $message);
        return redirect()->route('cadastrar');
    }
}
