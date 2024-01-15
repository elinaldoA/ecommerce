<?php

namespace App\Http\Controllers\Loja;

use App\Http\Controllers\Controller;
use App\Models\Categorias;
use App\Models\Itens_pedidos;
use App\Models\Pedidos;
use App\Models\ProdutoDetalhes;
use App\Models\Produtos;
use Illuminate\Http\Request;
use App\Services\VendaService;
use Illuminate\Support\Facades\Auth;
use PagSeguro\Configuration\Configure;

class ProdutoController extends Controller
{
    private $_configs;

    public function __construct()
    {
        $this->_configs = new Configure();
        $this->_configs->setCharset("UTF-8");
        $this->_configs->setAccountCredentials(env('PAGSEGURO_EMAIL'), env('PAGSEGURO_TOKEN'));
        $this->_configs->setEnvironment(env('PAGSEGURO_AMBIENTE'));
        $this->_configs->setLog(true, storage_path('logs/pagseguro_' .date('Ymd') . '.log'));
    }
    public function getCredentials()
    {
        return $this->_configs->getAccountCredentials();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = [];

        $produtos = Produtos::all();
        $data["lista"] = $produtos;
        return view('home', $data);
    }

    public function produtosDetalhes(Request $request, Produtos $produto)
    {
        $produto = Produtos::find($produto);
        $produto_detalhes = ProdutoDetalhes::all();
        return view("produtos/detalhes", ['produtos' => $produto, 'produto_detalhes' => $produto_detalhes]);
    }

    public function categoria($idcategoria = 0, Request $request)
    {
        $data = [];

        $categorias = Categorias::all();
        $queryprodutos = Produtos::limit(12);
        if ($idcategoria != 0) {
            //Where catagoria_id = $idcategoria
            $queryprodutos->where("categoria_id", $idcategoria);
        }
        $produtos = $queryprodutos->get();
        $data["lista"] = $produtos;
        $data["listaCategoria"] = $categorias;
        $data["idcategoria"] = $idcategoria;
        return view('categoria', $data);
    }
    public function adcionarCarrinho($idProduto = 0, Request $request)
    {
        //Buscr o produto pelo id
        $prod = Produtos::find($idProduto);

        if ($prod) {
            //Produto encontrado

            //Buscar da sessão o carrinho atual
            $carrinho = session('cart', []);
            //adciona um produto novo
            array_push($carrinho, $prod);
            //atualiza o carrinho
            session(['cart' => $carrinho]);
        }

        return redirect()->route('home');
    }
    public function verCarrinho(Request $request)
    {
        //Buscar o carrinho da sessão
        $carrinho = session('cart', []);
        $data = ['cart'=> $carrinho];
        return view('carrinho', $data);
    }
    public function excluirCarrinho($indice, Request $request)
    {
      //buscando item
      $carrinho = session('cart', []);
      if(isset($carrinho[$indice])){
        //exclui o item
        unset($carrinho[$indice]);
      }
      session(["cart" => $carrinho]);
      return redirect()->route("ver_carrinho");
    }
    public function finalizar(Request $request)
    {
        //Buscando os produtos do carrinho
        $prods = session('cart', []);
        $vendaService = new vendaService();
        //Passando o usuário logao e os produtos do usuário
        $result = $vendaService->finalizarVenda($prods, Auth::user());
        if($result["status"] == "ok"){

            $credCard = new \PagSeguro\Domains\Requests\DirectPayment\CreditCard();
            $credCard->setReference("PED_". $result["idpedido"]);
            $credCard->setCurrency("BRL");

            foreach($prods as $p){
                $credCard->addItems()->withParameters(
                    $p->id,
                    $p->nome,
                    1,
                    number_format($p->valor, 2, ".","")
                );
            }

            $usuario = Auth::user(); //Busca o usuário logado

            $credCard->setSender()->setName($usuario->nome . " " . $usuario->nome); //Sempre colocar o nome composto
            //$credCard->setSender()->setEmail($usuario->email); // Em produção e-mail original do cliente
            $credCard->setSender()->setEmail($usuario->email, "@sandbox.pagseguro.com.br"); // Email do pagseguro por default sandbox
            $credCard->setSender()->setHash($request->input("hashseller"));// hash do cartão
            $credCard->setSender()->setPhone()->withParameters(27, 999999999);// Numero do telefone do cliente
            $credCard->setSender()->setDocument()->withParameters("CPF", $usuario->login);//Documento do cliente

            $credCard->setShipping()->setAddress()->withParameters( //Endereço de compra
                'Rua Projetada, 02',
                '201',
                'Porto canoa',
                '29168602',
                'Serra',
                'ES',
                'BRA',
                'Apt. 100',
            );

            $credCard->setBilling()->setAddress()->withParameters( // Endereço de pagamento
                'Rua Projetada, 02',
                '201',
                'Porto canoa',
                '29168602',
                'Serra',
                'ES',
                'BRA',
                'Apt. 100',
            );

            $credCard->setToken($request->input("cardtoken"));// Token do cartão pagseguro

            $nparcela = $request->input("nparcela");
            $totalapagar = $request->input("totalapagar");
            $totalparcela = $request->input("totalparcela");

            $credCard->setInstallment()->withParameters($nparcela, number_format($totalparcela, 2, ".", ""));

            //Dados do titular do cartão
            $credCard->setHolder()->setName($usuario->nome. " " . $usuario->nome);// Nome do titular do cartão
            $credCard->setHolder()->setDocument()->withParameters("CPF", $usuario->login); // Documento
            $credCard->setHolder()->setBirthDate("01/01/1980"); // Data de nascimento
            $credCard->setHolder()->setPhone()->withParameters(27, 999999999); // Telefone

            $credCard->setMode("DEFAULT"); //Padrão da integração sandbox
            $result = $credCard->register($this->getCredentials()); // Executa e passa as credenciais do cartão

            echo "Compra realizada com sucesso!";
            //Limpa o carrinho
            $request->session()->forget("cart");

        }else{
            echo "Compra não realizada";
        }
        /*$request->session()->flash($result["status"], $result["message"]);
        return redirect()->route("ver_carrinho");*/
    }
    public function historico(Request $request)
    {
        $data = [];

        $idUsuario = Auth::user()->id;
        $listaPedido = Pedidos::where("usuario_id", $idUsuario)
                                ->orderBy("datapedido","desc")
                                ->get();
        $data["lista"] = $listaPedido;
        return view("compra/historico", $data);
    }
    public function detalhes(Request $request)
    {


        $idpedido = $request->input("idpedido");

        $listaItens = Itens_pedidos::join("produtos","produtos.id","=", "itens_pedidos.produto_id")
        ->where("pedido_id", $idpedido)
        ->get(['itens_pedidos.*','itens_pedidos.valor as valoritem','produtos.*']);

        $data = [];
        $data["listaItens"] = $listaItens ;
        return view("compra/detalhes", $data);
    }
    public function pagar(Request $request)
    {
        $data = [];
        //Manipulando o carrinho
        $carrinho = session('cart', []);
        $data['cart'] = $carrinho;
        //iniciando a sessão no pagseguro
        $sessionCode = \PagSeguro\Services\Session::create(
            $this->getCredentials()
        );
        $IDSession = $sessionCode->getResult();
        $data["sessionID"] = $IDSession;

        return view("compra/pagar", $data);
    }
}
