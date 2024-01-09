<?php

namespace App\Http\Controllers\Administrativo;

use App\Http\Controllers\Controller;
use App\Models\Produtos;
use App\Models\Usuario;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Usuario::count();
        $itens_pedidos = DB::table('itens_pedidos')->get();
        $produtos = DB::table('produtos')->get();
        $widget = [
            'usuarios' => $usuarios,
        ];
        return view('pages.dashboard', compact('widget','itens_pedidos','produtos'));
    }
}
