@extends('layout')
@section('conteudo')
    @foreach ($produtos as $produto)
    @endforeach
    <form method="POST" action="{{ route('produto_detalhes', ['produto' => $produto->id]) }}">
        <div class="card mb-3" style="max-width: auto;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{ asset($produto->foto) }}" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col">
                    <div class="card-body">
                        <h5 class="card-title">{{ $produto->nome }}</h5><br />
                        <h6 class="card-subtitle">R$ {{ $produto->valor }}</h6>
                        <p class="card-text">{{ $produto->descricao }}</p>

                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            Integer ut libero id lorem congue tempus sit amet sed mauris.
                            Phasellus et vehicula erat. Nam elit mi, rutrum in purus vitae, feugiat feugiat enim.
                            Nunc neque purus, bibendum tempor enim eget, ultrices egestas nibh. Ut at lobortis tortor.
                            Mauris enim ex, pharetra lobortis felis ac, faucibus scelerisque lectus.
                            Morbi ut lectus mollis, fermentum diam nec, cursus odio.
                            Fusce lacinia purus eget nunc eleifend blandit. Quisque a interdum mi.
                            Aenean fringilla molestie erat, et tristique enim. Nulla sit amet ligula eget nisi condimentum
                            eleifend.
                            Phasellus at posuere augue, at rhoncus nisl. Praesent sit amet congue ipsum. Donec ultricies
                            eleifend odio consectetur iaculis.</p>
                    </div>
                </div>
            </div>
        </div>
        @foreach ($produto_detalhes as $pd)
        <table class="table table-striped">
            @if ($produto->id == $pd->produto_id)
            <thead>
                <tr>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Cor</th>
                    <th>Altura</th>
                    <th>Largura</th>
                    <th>Profundidade</th>
                    <th>Peso</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $pd->marca }}</td>
                    <td>{{ $pd->modelo }}</td>
                    <td>{{ $pd->cor }}</td>
                    <td>{{ $pd->altura }}</td>
                    <td>{{ $pd->largura }}</td>
                    <td>{{ $pd->profundidade }}</td>
                    <td>{{ $pd->peso }}</td>
                </tr>
            </tbody>
            @endif
        </table>
    @endforeach

    <a href="{{ route('adcionar_carrinho', ['idproduto' => $produto->id]) }}"
        class="btn btn-primary">Adcionar item</a>
    </form>

    <style>
        a{
            color: black;
        }
        img {
        -webkit-transition: all 1s ease; /* Safari and Chrome */
        -moz-transition: all 1s ease; /* Firefox */
        -ms-transition: all 1s ease; /* IE 9 */
        -o-transition: all 1s ease; /* Opera */
        transition: all 1s ease;
        }

        img:hover {
            -webkit-transform:scale(1.25); /* Safari and Chrome */
            -moz-transform:scale(1.25); /* Firefox */
            -ms-transform:scale(1.25); /* IE 9 */
            -o-transform:scale(1.25); /* Opera */
            transform:scale(1.25);
        }
    </style>
@endsection
