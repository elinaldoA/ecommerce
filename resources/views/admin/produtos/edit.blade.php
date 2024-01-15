@extends('layouts.admin')
@section('main-content')

<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
navbar-scroll="true">
<div class="container-fluid py-1 px-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a>
            </li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Produtos</li>
        </ol>
        <a href="{{route('produto.edit',['produto' => $produto->id])}}"><h6 class="font-weight-bolder mb-0">Editar</h6></a>
    </nav>
</div>
</nav>
<form class="col" method="POST" action="{{ route('produto.update',['produto' => $produto->id]) }}" enctype="multipart/form-data">
    @csrf
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="produto-geral" data-bs-toggle="tab"
                data-bs-target="#produto-geral-pane" type="button" role="tab"
                aria-controls="produto-geral-pane" aria-selected="true">Dados do produto</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="produto-detalhes" data-bs-toggle="tab"
                data-bs-target="#produto-detalhes-pane" type="button" role="tab"
                aria-controls="produto-detalhes-pane" aria-selected="false">Detalhes do produto</button>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="produto-geral-pane" role="tabpanel"
            aria-labelledby="produto-geral" tabindex="0">
            <div class="row g-3">
                <div class="col-4">
                    <label for="foto" class="form-label">Foto:</label>
                    <input type="file" class="form-control" id="foto" name="foto">
                    <img src="/images/{{ $produto->foto }}" width="100px" class="rounded mx-auto d-block">
                </div>
                <div class="col-4">
                    <label for="nome" class="form-label">Nome:</label>
                    <input type="text" class="form-control" id="nome" name="nome"
                        value="{{$produto->nome}}">
                </div>
                <div class="col-4">
                    <label for="valor">Valor</label>
                    <input type="text" class="form-control" id="valor" name="valor"
                        value="{{$produto->valor}}">
                </div>
                <div class="col-12">
                    <label for="descricao">Descrição</label>
                    <textarea class="form-control" id="descricao" name="descricao" placeholder="Breve descrição do produto"
                        rows="6" cols="6">{{$produto->descricao}}</textarea>
                </div>
                <div class="col-4">
                    <label for="categoria">Categoria</label>
                    <select class="form-control" id="categoria_id" name="categoria_id">
                        @foreach ($categorias as $cat)
                            @if ($produto->categoria_id == $cat->id)
                            <option value="{{ $cat->id }}" selected>{{ $cat->categoria }}</option>
                            @else
                            <option value="{{ $cat->id }}">{{ $cat->categoria }}</option>
                            @endif
                        @endforeach
                    </select><br />
                    <button type="submit" class="btn btn-primary mb-3">Salvar</button>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="produto-detalhes-pane" role="tabpanel"
            aria-labelledby="produto-detalhes" tabindex="0">
            <div class="row g-3">
                <div class="col-4">
                    <label for="marca">Marca</label>
                    <input type="text" class="form-control" id="marca" name="marca" placeholder="Nike.." value="{{$detalhe->marca}}">
                </div>
                <div class="col-4">
                    <label for="marca">Modelo</label>
                    <input type="text" class="form-control" id="modelo" name="modelo" placeholder="22v480.." value="{{$detalhe->modelo}}">
                </div>
                <div class="col-4">
                    <label for="marca">Cor</label>
                    <input type="text" class="form-control" id="cor" name="cor" placeholder="Amarelo.." value="{{$detalhe->cor}}">
                </div>
                <div class="col-4">
                    <label for="marca">Altura</label>
                    <input type="text" class="form-control" id="altura" name="altura" value="{{$detalhe->altura}}">
                </div>
                <div class="col-4">
                    <label for="marca">Largura</label>
                    <input type="text" class="form-control" id="largura" name="largura" value="{{$detalhe->largura}}">
                </div>
                <div class="col-4">
                    <label for="marca">Profundidade</label>
                    <input type="text" class="form-control" id="profundidade" name="profundidade" value="{{$detalhe->profundidade}}">
                </div>
                <div class="col-4">
                    <label for="marca">Peso</label>
                    <input type="text" class="form-control" id="peso" name="peso" value="{{$detalhe->peso}}">
                </div>
                <div class="col-4">
                    <label for="marca">Sistema</label>
                    <input type="text" class="form-control" id="sistema" name="sistema" value="{{$detalhe->sistema}}">
                </div>
                <div class="col-4">
                    <label for="marca">Linha</label>
                    <input type="text" class="form-control" id="linha" name="linha" value="{{$detalhe->linha}}">
                </div>
                <div class="col-4">
                    <label for="marca">Tipo</label>
                    <input type="text" class="form-control" id="tipo" name="tipo" value="{{$detalhe->tipo}}">
                </div>
                <div class="col-4">
                    <label for="marca">Classificação</label>
                    <input type="text" class="form-control" id="classificacao" name="classificacao" value="{{$detalhe->classificacao}}">
                </div>
                <div class="col-4">
                    <label for="marca">Áudio</label>
                    <input type="text" class="form-control" id="audio" name="audio" value="{{$detalhe->audio}}">
                </div>
                <div class="col-4">
                    <label for="marca">Video</label>
                    <input type="text" class="form-control" id="video" name="video" value="{{$detalhe->video}}">
                </div>
                <div class="col-4">
                    <label for="marca">Velocidade</label>
                    <input type="text" class="form-control" id="velocidade" name="velocidade" value="{{$detalhe->velocidade}}">
                </div>
                <div class="col-4">
                    <label for="marca">Processamento</label>
                    <input type="text" class="form-control" id="processamento" name="processamento" value="{{$detalhe->processamento}}">
                </div>
                <div class="col-4">
                    <label for="marca">Armazenamento</label>
                    <input type="text" class="form-control" id="armazenamento" name="armazenamento" value="{{$detalhe->armazenamento}}">
                </div>
                <div class="col-4">
                    <label for="marca">Conectividade</label>
                    <input type="text" class="form-control" id="conectividade" name="conectividade" value="{{$detalhe->conectividade}}">
                </div>
                <div class="col-4">
                    <label for="marca">Energia</label>
                    <input type="text" class="form-control" id="energia" name="energia" value="{{$detalhe->energia}}">
                </div>
                <div class="col-4">
                    <label for="marca">Itens inclusos</label>
                    <input type="text" class="form-control" id="itens_inclusos" name="itens_inclusos" value="{{$detalhe->itens_inclusos}}">
                </div>
                <div class="col-4">
                    <label for="marca">Garantia</label>
                    <input type="text" class="form-control" id="garantia" name="garantia" value="{{$detalhe->garantia}}">
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
