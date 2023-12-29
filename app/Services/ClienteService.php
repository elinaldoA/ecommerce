<?php

namespace App\Services;

use App\Models\Enderecos;
use App\Models\Usuario;
use Illuminate\Support\Facades\Log;

class ClienteService
{
    public function salvarUsuario(Usuario $usuario, Enderecos $endereco)
    {
        try{
            //Busca o usuário com o login que deve ser salvo no banco
            $dbUsuario = Usuario::where("login", $usuario->login)->first();
            if($dbUsuario){
                return ['status' => 'err', 'message' => 'Usuário já cadastrado no sistema!'];
            }

            \DB::beginTransaction(); // inicia a transação
            $usuario->save();// Salvar o usuário
            $endereco->usuario_id = $usuario->id; // seleciona o endereço do usuário
            $endereco->save(); // Salvar o endereço
            \DB::commit(); // Confirma a transação

            return['status' => 'ok', 'message' => 'Usuário cadastrado com sucesso!'];
        }catch(\Exception $e){
            //Tratar erros
            \Log::error("ERRO",['file' => 'ClienteService.salvarUsuario'
            ,'message' => $e->getMessage()]);
            \DB::rollBack(); // Cancela a transação
            return ['status' => 'err', 'message' => 'Não pode cadastrar o usuário!'];
        }
    }
}
