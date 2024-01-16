<?php

namespace App\Http\Controllers\Administrativo;

use App\Http\Controllers\Controller;
use App\Models\Itens_pedidos;
use App\Models\Produtos;
use App\Models\User;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admins');
    }

    /**
     * Show the application home.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $usuarios = Usuario::count();
        $users = User::count();
        $produtos = Produtos::count();
        $itensPedidos = Itens_pedidos::count();
        $itens_pedidos = DB::table('itens_pedidos')->get();

        $widget = [
            'usuarios' => $usuarios,
            'users' => $users,
            'produtos' => $produtos,
            'itensPedidos' => $itensPedidos,
        ];
        return view('admin.dashboard', compact('widget','usuarios','users','produtos','itens_pedidos','itensPedidos'));
    }
}
