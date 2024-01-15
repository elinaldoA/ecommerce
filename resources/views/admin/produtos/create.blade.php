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
        <a href="{{route('produto.create')}}"><h6 class="font-weight-bolder mb-0">Novo</h6></a>
    </nav>
</div>
</nav>

<form class="col" method="POST" action="{{route('produto.store')}}" enctype="multipart/form-data">
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
                    <label for="foto" class="form-label">Foto<span class="small text-danger"> * </span></label>
                    <input type="file" class="form-control" id="foto" name="foto">
                </div>
                <div class="col-4">
                    <label for="nome" class="form-label">Nome:<span class="small text-danger"> * </span></label>
                    <input type="text" class="form-control" id="nome" name="nome"
                        placeholder="Notebook">
                </div>
                <div class="col-4">
                    <label for="valor">Valor<span class="small text-danger"> * </span></label>
                    <input type="text" class="form-control" id="valor" name="valor"
                        placeholder="R$ 0.00">
                </div>
                <div class="col-12">
                    <label for="descricao">Descrição<span class="small text-danger"> * </span></label>
                    <textarea class="form-control" id="descricao" name="descricao" placeholder="Breve descrição do produto"
                        rows="6" cols="6"></textarea>
                </div>
                <div class="col-4">
                    <label for="categoria">Categoria<span class="small text-danger"> * </span></label>
                    <select class="form-control" id="categoria_id" name="categoria_id">
                        <option>Selecione</option>
                        @foreach ($categorias as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->categoria }}</option>
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
                    <label for="marca">Marca<span class="small text-danger"> * </span></label>
                    <input type="text" class="form-control" id="marca" name="marca" placeholder="Nike..">
                </div>
                <div class="col-4">
                    <label for="marca">Modelo<span class="small text-danger"> * </span></label>
                    <input type="text" class="form-control" id="modelo" name="modelo" placeholder="Nike..">
                </div>
                <div class="col-4">
                    <label for="marca">Cor<span class="small text-danger"> * </span></label>
                    <input type="text" class="form-control" id="cor" name="cor" placeholder="Nike..">
                </div>
                <div class="col-4">
                    <label for="marca">Altura<span class="small text-danger"> * </span></label>
                    <input type="text" class="form-control" id="altura" name="altura" placeholder="Nike..">
                </div>
                <div class="col-4">
                    <label for="marca">Largura<span class="small text-danger"> * </span></label>
                    <input type="text" class="form-control" id="largura" name="largura" placeholder="Nike..">
                </div>
                <div class="col-4">
                    <label for="marca">Profundidade<span class="small text-danger"> * </span></label>
                    <input type="text" class="form-control" id="profundidade" name="profundidade" placeholder="Nike..">
                </div>
                <div class="col-4">
                    <label for="marca">Peso<span class="small text-danger"> * </span></label>
                    <input type="text" class="form-control" id="peso" name="peso" placeholder="Kg...">
                </div>
                <div class="col-4">
                    <label for="marca">Sistema<span class="small text-danger"> * </span></label>
                    <input type="text" class="form-control" id="sistema" name="sistema" placeholder="Windows...">
                </div>
                <div class="col-4">
                    <label for="marca">Linha<span class="small text-danger"> * </span></label>
                    <input type="text" class="form-control" id="linha" name="linha">
                </div>
                <div class="col-4">
                    <label for="marca">Tipo<span class="small text-danger"> * </span></label>
                    <input type="text" class="form-control" id="tipo" name="tipo">
                </div>
                <div class="col-4">
                    <label for="marca">Classificação<span class="small text-danger"> * </span></label>
                    <input type="text" class="form-control" id="classificacao" name="classificacao">
                </div>
                <div class="col-4">
                    <label for="marca">Áudio<span class="small text-danger"> * </span></label>
                    <input type="text" class="form-control" id="audio" name="audio">
                </div>
                <div class="col-4">
                    <label for="marca">Video<span class="small text-danger"> * </span></label>
                    <input type="text" class="form-control" id="video" name="video">
                </div>
                <div class="col-4">
                    <label for="marca">Velocidade<span class="small text-danger"> * </span></label>
                    <input type="text" class="form-control" id="velocidade" name="velocidade">
                </div>
                <div class="col-4">
                    <label for="marca">Processamento<span class="small text-danger"> * </span></label>
                    <input type="text" class="form-control" id="processamento" name="processamento">
                </div>
                <div class="col-4">
                    <label for="marca">Armazenamento<span class="small text-danger"> * </span></label>
                    <input type="text" class="form-control" id="armazenamento" name="armazenamento">
                </div>
                <div class="col-4">
                    <label for="marca">Conectividade<span class="small text-danger"> * </span></label>
                    <input type="text" class="form-control" id="conectividade" name="conectividade">
                </div>
                <div class="col-4">
                    <label for="marca">Energia<span class="small text-danger"> * </span></label>
                    <input type="text" class="form-control" id="energia" name="energia">
                </div>
                <div class="col-4">
                    <label for="marca">Itens inclusos<span class="small text-danger"> * </span></label>
                    <input type="text" class="form-control" id="itens_inclusos" name="itens_inclusos">
                </div>
                <div class="col-4">
                    <label for="marca">Garantia<span class="small text-danger"> * </span></label>
                    <input type="text" class="form-control" id="garantia" name="garantia">
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
