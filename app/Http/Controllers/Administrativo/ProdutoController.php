<?php

namespace App\Http\Controllers\Administrativo;

use App\Http\Controllers\Controller;
use App\Models\ProdutoDetalhes;
use App\Models\Produtos;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ProdutoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = DB::table('categorias')->get();
        $produtos = Produtos::latest()->paginate(15);

        return view('admin.produtos.index',compact('produtos','categorias'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = DB::table('categorias')->get();
        return view("admin.produtos.create", compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $produto = new Produtos;
        $produto->nome = $request->input('nome');
        $produto->valor = $request->input('valor');
        $produto->descricao = $request->input('descricao');
        $produto->categoria_id = $request->input('categoria_id');

        if($request->hasfile('foto'))
        {
            $file = $request->file('foto');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('images/', $filename);
            $produto->foto = $filename;
        }
        $produto->save();

        /*Detalhes produto*/
        $detalhe = new ProdutoDetalhes;
        $detalhe->produto_id = $produto->id;
        $detalhe->marca = $request->input('marca');
        $detalhe->modelo = $request->input('modelo');
        $detalhe->cor = $request->input('cor');
        $detalhe->altura = $request->input('altura');
        $detalhe->largura = $request->input('largura');
        $detalhe->profundidade = $request->input('profundidade');
        $detalhe->peso = $request->input('peso');
        $detalhe->sistema = $request->input('sistema');
        $detalhe->linha = $request->input('linha');
        $detalhe->tipo = $request->input('tipo');
        $detalhe->classificacao = $request->input('classificacao');
        $detalhe->compatibilidade = $request->input('compatibilidade');
        $detalhe->audio = $request->input('audio');
        $detalhe->video = $request->input('video');
        $detalhe->velocidade = $request->input('velocidade');
        $detalhe->processamento = $request->input('processamento');
        $detalhe->armazenamento = $request->input('armazenamento');
        $detalhe->conectividade = $request->input('conectividade');
        $detalhe->energia = $request->input('energia');
        $detalhe->itens_inclusos = $request->input('itens_inclusos');
        $detalhe->garantia = $request->input('garantia');
        $detalhe->save();

        return redirect()->back()->with('status','Produto criado com sucesso!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Produtos $produto)
    {
       $produto = Produtos::find($produto->id);
       $detalhe = ProdutoDetalhes::find($produto->id);
       $categorias = DB::table('categorias')->get();
       return view('admin.produtos.edit', compact('produto','detalhe','categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $produto = Produtos::find($id);
        $produto->nome = $request->input('nome');
        $produto->valor = $request->input('valor');
        $produto->descricao = $request->input('descricao');
        $produto->categoria_id = $request->input('categoria_id');

        if($request->hasfile('foto'))
        {
            $destination = 'images/'.$produto->foto;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('foto');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('images/', $filename);
            $produto->foto = $filename;
        }
        $produto->update();

        $detalhe = ProdutoDetalhes::find($id);
        $detalhe->produto_id = $produto->id;
        $detalhe->marca = $request->input('marca');
        $detalhe->modelo = $request->input('modelo');
        $detalhe->cor = $request->input('cor');
        $detalhe->altura = $request->input('altura');
        $detalhe->largura = $request->input('largura');
        $detalhe->profundidade = $request->input('profundidade');
        $detalhe->peso = $request->input('peso');
        $detalhe->sistema = $request->input('sistema');
        $detalhe->linha = $request->input('linha');
        $detalhe->tipo = $request->input('tipo');
        $detalhe->classificacao = $request->input('classificacao');
        $detalhe->compatibilidade = $request->input('compatibilidade');
        $detalhe->audio = $request->input('audio');
        $detalhe->video = $request->input('video');
        $detalhe->velocidade = $request->input('velocidade');
        $detalhe->processamento = $request->input('processamento');
        $detalhe->armazenamento = $request->input('armazenamento');
        $detalhe->conectividade = $request->input('conectividade');
        $detalhe->energia = $request->input('energia');
        $detalhe->itens_inclusos = $request->input('itens_inclusos');
        $detalhe->garantia = $request->input('garantia');
        $detalhe->update();

        return redirect()->back()->with('status','Produto atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produtos $produto)
    {
        $produto = Produtos::find($produto->id);
        $detalhe = ProdutoDetalhes::find($produto->id);
        $destination = 'images/'.$produto->foto;
        if(File::exists($destination))
        {
            File::delete($destination);
        }
        $produto->delete();
        $detalhe->delete();
        return redirect()->back()->with('status','Produto excluído com sucesso!');
    }
}
