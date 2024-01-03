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
                        <br />
                        <p class="card-text">{{ $produto->descricao }}</p>
                    </div>
                </div>
            </div>
        </div>
        @foreach ($produto_detalhes as $pd)
            @if ($produto->id == $pd->produto_id)
                <nav class="nav justify-content-center">
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-especificacao-tab" data-toggle="tab"
                            href="#nav-especificacao" role="tab" aria-controls="nav-especificacao"
                            aria-selected="true">Especificações técnicas</a>
                        <a class="nav-item nav-link" id="nav-itens-tab" data-toggle="tab" href="#nav-itens" role="tab"
                            aria-controls="nav-itens" aria-selected="false">Itens incluso</a>
                        <a class="nav-item nav-link" id="nav-garantia-tab" data-toggle="tab" href="#nav-garantia"
                            role="tab" aria-controls="nav-garantia" aria-selected="false">Garantia</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-especificacao" role="tabpanel"
                        aria-labelledby="nav-especificacao-tab">
                        @if ($pd->marca == '')
                            <p class="card-text" hidden="true">Marca: {{ $pd->marca }}</p>
                        @else
                            <p class="card-text"><b>Marca :</b> {{ $pd->marca }}</p>
                        @endif
                        @if ($pd->modelo == '')
                            <p class="card-text" hidden="true">Modelo: {{ $pd->modelo }}</p>
                        @else
                            <p class="card-text"><b>Modelo :</b> {{ $pd->modelo }}</p>
                        @endif
                        @if ($pd->cor == '')
                            <p class="card-text" hidden="true">Cor: {{ $pd->cor }}</p>
                        @else
                            <p class="card-text" hidden="true"><b>Cor :</b> {{ $pd->cor }}</p>
                        @endif
                        @if ($pd->altura == '')
                            <p class="card-text" hidden="true">Altura: {{ $pd->altura }}</p>
                        @else
                            <p class="card-text"><b>Altura :</b> {{ $pd->altura }}</p>
                        @endif
                        @if ($pd->largura == '')
                            <p class="card-text" hidden="true">Largura: {{ $pd->largura }}</p>
                        @else
                            <p class="card-text"><b>Largura :</b> {{ $pd->largura }}</p>
                        @endif
                        @if ($pd->profundidade == '')
                            <p class="card-text" hidden="true">Profundidade: {{ $pd->profundidade }}</p>
                        @else
                            <p class="card-text"><b>Profundidade :</b> {{ $pd->profundidade }}</p>
                        @endif
                        @if ($pd->peso == '')
                            <p class="card-text" hidden="true">Peso: {{ $pd->peso }}</p>
                        @else
                            <p class="card-text"><b>Peso :</b> {{ $pd->peso }}</p>
                        @endif
                        @if ($pd->sistema == '')
                            <p class="card-text" hidden="true">Sistema Operacional: {{ $pd->sistema }}</p>
                        @else
                            <p class="card-text"><b>Sistema Operacional :</b> {{ $pd->sistema }}</p>
                        @endif
                        @if ($pd->linha == '')
                            <p class="card-text" hidden="true">Linha: {{ $pd->linha }}</p>
                        @else
                            <p class="card-text"><b>Linha :</b> {{ $pd->linha }}</p>
                        @endif
                        @if ($pd->tipo == '')
                            <p class="card-text" hidden="true">Tipo: {{ $pd->tipo }}</p>
                        @else
                            <p class="card-text"><b>Tipo :</b> {{ $pd->tipo }}</p>
                        @endif
                        @if ($pd->classificacao == '')
                            <p class="card-text" hidden="true">Classificação: {{ $pd->classificacao }}</p>
                        @else
                            <p class="card-text"><b>Classificação :</b> {{ $pd->classificacao }}</p>
                        @endif
                        @if ($pd->compatibilidade == '')
                            <p class="card-text" hidden="true">Compatibilidade: {{ $pd->compatibilidade }}</p>
                        @else
                            <p class="card-text"><b>Compatibilidade :</b> {{ $pd->compatibilidade }}</p>
                        @endif
                        @if ($pd->audio == '')
                            <p class="card-text" hidden="true">Áudio: {{ $pd->audio }}</p>
                        @else
                            <p class="card-text"><b>Áudio :</b> {{ $pd->audio }}</p>
                        @endif
                        @if ($pd->video == '')
                            <p class="card-text" hidden="true">Video: {{ $pd->video }}</p>
                        @else
                            <p class="card-text"><b>Video :</b> {{ $pd->video }}</p>
                        @endif
                        @if ($pd->velocidade == '')
                            <p class="card-text" hidden="true">RAM: {{ $pd->velocidade }}</p>
                        @else
                            <p class="card-text"><b>RAM :</b> {{ $pd->velocidade }}</p>
                        @endif
                        @if ($pd->processamento == '')
                            <p class="card-text" hidden="true">Processador: {{ $pd->processamento }}</p>
                        @else
                            <p class="card-text"><b>Processador :</b> {{ $pd->processamento }}</p>
                        @endif
                        @if ($pd->armazenamento == '')
                            <p class="card-text" hidden="true">Armazenamento: {{ $pd->armazenamento }}</p>
                        @else
                            <p class="card-text"><b>Armazenamento :</b> {{ $pd->armazenamento }}</p>
                        @endif
                        @if ($pd->conectividade == '')
                            <p class="card-text" hidden="true">Conectividade: {{ $pd->conectividade }}</p>
                        @else
                            <p class="card-text"><b>Conectividade :</b> {{ $pd->conectividade }}</p>
                        @endif
                        @if ($pd->energia == '')
                            <p class="card-text" hidden="true">Energia: {{ $pd->enegia }}</p>
                        @else
                            <p class="card-text"><b>Energia :</b> {{ $pd->energia }}</p>
                        @endif
                    </div>
                    <div class="tab-pane fade" id="nav-itens" role="tabpanel" aria-labelledby="nav-itens-tab">
                        <p class="card-text">- {{ $pd->itens_inclusos }}</p>
                    </div>
                    <div class="tab-pane fade" id="nav-garantia" role="tabpanel" aria-labelledby="nav-garantia-tab">
                        <p class="card-text">{{ $pd->garantia }}</p>
                    </div>
                </div>
            @endif
        @endforeach
        <br />
        <a href="{{ route('adcionar_carrinho', ['idproduto' => $produto->id]) }}" class="btn btn-primary">Adcionar
            item</a>
    </form>

    <style>
        a {
            color: black;
        }

        img {
            -webkit-transition: all 1s ease;
            /* Safari and Chrome */
            -moz-transition: all 1s ease;
            /* Firefox */
            -ms-transition: all 1s ease;
            /* IE 9 */
            -o-transition: all 1s ease;
            /* Opera */
            transition: all 1s ease;
        }

        img:hover {
            -webkit-transform: scale(1.25);
            /* Safari and Chrome */
            -moz-transform: scale(1.25);
            /* Firefox */
            -ms-transform: scale(1.25);
            /* IE 9 */
            -o-transform: scale(1.25);
            /* Opera */
            transform: scale(1.25);
        }
    </style>
@endsection
