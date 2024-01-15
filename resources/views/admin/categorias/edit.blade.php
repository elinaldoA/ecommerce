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
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Categorias</li>
        </ol>
        <a href="{{route('categoria.edit', ['categoria' => $categoria->id])}}"><h6 class="font-weight-bolder mb-0">Editar</h6></a>
    </nav>
</div>
</nav>
    <form class="col" method="POST" action="{{ route('categoria.update', ['categoria' => $categoria->id]) }}" enctype="multipart/form-data">
        @csrf
        <div class="row g-3">
            <div class="col-4">
                <label for="nome" class="form-label">Nome:<span class="small text-danger"> * </span></label>
                <input type="text" class="form-control" id="categoria" name="categoria" placeholder="Notebook" value="{{$categoria->categoria}}">
            <br/>
                <button type="submit" class="btn btn-primary mb-3">Salvar</button>
            </div>
        </div>
    </form>
@endsection
