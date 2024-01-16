<?php

namespace App\Services;

use App\Models\Pedidos;
use App\Models\Itens_pedidos;
use App\Models\Usuario;
use Exception;
use Illuminate\Support\Facades\Log;

class VendaService
{

    public function finalizarVenda($prods = [], Usuario $usuario)
    {
        try {
            \DB::beginTransaction();
            $dtHoje = new \DateTime();

            $pedido = new Pedidos();

            $pedido->datapedido = $dtHoje->format("Y-m-d H:i:s");
            $pedido->status = "PEN";
            $pedido->usuario_id = $usuario->id;
            $pedido->save();

            foreach ($prods as $p) {
                $itens = new Itens_pedidos();

                $itens->quantidade = 1;
                $itens->valor = $p->valor;
                $itens->dt_item = $dtHoje->format("Y-m-d H:i:s");
                $itens->produto_id = $p->id;
                $itens->pedido_id = $pedido->id;
                $itens->save();
            }
            \DB::commit();
            return ['status' => 'ok', 'message' => 'Venda finalizada com sucesso!','idpedido' => $pedido->id];
        } catch (\Exception $e) {
            \DB::rollBack();
            Log::error("ERRO:VENDA SERVICE", ['message' => $e->getMessage()]);
            return ['status' => 'err', 'message' => 'Venda não pode ser finalizada!'];
        }
    }

}
