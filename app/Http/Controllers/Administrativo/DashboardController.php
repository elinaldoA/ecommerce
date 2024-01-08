<?php

namespace App\Http\Controllers\Administrativo;

use App\Http\Controllers\Controller;
use App\Models\Produtos;
use App\Models\Usuario;
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
        $produtos = Produtos::count();
        $widget = [
            'produtos' => $produtos,
            'usuarios' => $usuarios,
        ];
        return view('pages.dashboard', compact('widget'));
    }
}
