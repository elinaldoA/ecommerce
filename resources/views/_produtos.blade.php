@if (isset($lista))
<div class="row">
    @foreach ($lista as $prod)
    <a href="{{route('produto_detalhes', ['produto' => $prod->id])}}">
    <div class="col-3 mb-3">
        <div class="card">
            <img src="{{ asset($prod->foto) }}" class="card-img-top" alt="">
            <div class="card-body">
              <h5 class="card-title">{{ $prod->nome }}</h5>
              <h6 class="card-subtitle">R$ {{ $prod->valor }}</h6>
              <hr/>
              <p class="card-text">{{ $prod->descricao }}</p>
              <a href="{{route('adcionar_carrinho', ['idproduto' => $prod->id])}}" class="btn btn-primary">Adcionar item</a>
            </div>
        </div>
    </div>
    </a>
    @endforeach
</div>
@endif



