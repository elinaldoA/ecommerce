@extends('layout')
@section('conteudo')
    <h3><i class="fa fa-shopping-cart"></i> Carrinho</h3>
    @if (isset($cart) && count($cart) > 0)
        <br /><br />
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th></th>
                    <th>Nome</th>
                    <th>Foto</th>
                    <th>Valor</th>
                    <th>Descrição</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $total = 0;
                @endphp
                @foreach ($cart as $indice => $p)
                    <tr>
                        <td>
                            <a href="{{ route('carrinho_excluir', ['indice' => $indice]) }}" class="btn btn-danger btn-sm">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                        <td>{{ $p->nome }}</td>
                        <td><img src="{{ $p->foto }}" height="50px"></td>
                        <td>{{ $p->valor }}</td>
                        <td>{{ $p->descricao }}</td>
                    </tr>
                    @php $total += $p->valor; @endphp
                @endforeach
            </tbody>
            <tfooter>
                <tr>
                    <td colspan="5">
                        Total do carrinho: R$ {{ $total }}
                    </td>
                </tr>
            </tfooter>
        </table>
        <form action="{{ route('pagar') }}" method="post">
            @csrf
            <input type="submit" value="Finalizar Compra" class="btn btn-sm btn-success" />
        </form>
    @else
        <p>Nenhum item no carrinho</p>
    @endif
@endsection
