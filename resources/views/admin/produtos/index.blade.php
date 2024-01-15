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
<table class="table">
        <thead>
            <th>Foto</th>
            <th>Nome</th>
            <th>Valor</th>
            <th>Categoria</th>
            <th>Ações</th>
        </thead>
        <tbody class="table table-striped table-resposive">
            @foreach ($produtos as $produto)
                <tr>
                    <td><img src="/images/{{ $produto->foto }}" height="50" width="50" class="roudend"></td>
                    <td>{{ $produto->nome }}</td>
                        <td>{{ $produto->valor }}</td>
                        @foreach ($categorias as $cat)
                            @if ($cat->id == $produto->categoria_id)
                                <td>{{ $cat->categoria }}</td>
                            @endif
                        @endforeach
                    <td>
                        <a href="{{ route('produto.edit', ['produto' => $produto->id]) }}"
                            class="btn btn-outline-success"><i class="fa fa-edit"></i></a>
                        <a class="btn btn-outline-danger" data-toggle="modal" data-target="#confirm-delete"><i
                                class="fa fa-trash"></i></a>
                        <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog"
                            aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">{{ __('Confirmar exclusão') }}</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Deseja realmente excluir esse registro ?
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{ route('produto.excluir', ['produto' => $produto->id]) }}"
                                            method="POST">
                                            <button class="btn btn-link" type="button"
                                                data-dismiss="modal">{{ __('Cancelar') }}</button>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
