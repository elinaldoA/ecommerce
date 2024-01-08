<?php

namespace App\Http\Controllers\Administrativo;

use App\Http\Controllers\Controller;
use App\Models\Produtos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = DB::table('categorias')->get();
        $produtos = Produtos::latest()->paginate(15);

        return view('pages.produtos.index',compact('produtos','categorias'))
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
        return view("pages.produtos.create", compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'nome' => 'required',
            'valor' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'descricao' => 'string',
            'categoria_id' => 'required',
        ]);

        $input = $request->all();

        if ($image = $request->file('foto')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['foto'] = "$profileImage";
        }

        Produtos::create($input);
        return redirect()->route('pages.produtos.index')
                        ->with('success','Produto criado com sucesso.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Produtos $produto)
    {
       $produtos = Produtos::find($produto->id);
       $categorias = DB::table('categorias')->get();
       return view('pages.produtos.edit', compact('produtos','categorias'));
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
        $produtos = Produtos::find($id);

        $request->validate([
            'nome' => 'required',
            'valor' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'descricao' => 'string',
            'categoria_id' => 'required',
        ]);

        $input = $request->all();

        if ($image = $request->file('foto')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['foto'] = "$profileImage";
        }

        $produtos->update($input);
        return redirect()->route('pages.produtos.index')
                        ->with('success','Produto criado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Produtos $produto)
    {
        $produto->delete();

        return redirect()->route('produtos')
                        ->with('success','Produto excluído com sucesso');
    }
}
