@extends("loja")
@section("scriptjs")
<script>
    $(function(){
        $(".infocompra").on('click',function(){
            // Ao clicar no link com class. infocompra esta função é executada
            let id = $(this).attr("data-value")
            $.post('{{route("compra_detalhes")}}',{idpedido: id}, (result) => {
                //funcao de callback -- retorno do ajax
                $("#conteudopedido").html(result)
            })
        })
    })
</script>
@endsection
@section("conteudo")
<div class="col-12">
    <h2>Minhas Compras</h2>
</div>
<div class="col-12">
    <table class="table table-striped tabçe-responsive">
        <tr>
            <th>Data da compra</th>
            <th>Situação</th>
            <th></th>
        </tr>
        @foreach ($lista as $ped)
            <tr>
                <td>{{$ped->dataPedido->format("d/m/Y H:i")}}</td>
                <td>{{$ped->statusDesc()}}</td>
                <td>
                    <!-- Button to Open the Modal -->
                    <a href="#" class="btn btn-primary infocompra" data-value="{{$ped->id}}" data-toggle="modal" data-target="#modalcompra">
                        <i class="fa fa-shopping-basket"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </table>
</div>
    <!-- The Modal -->
    <div class="modal" id="modalcompra">
      <div class="modal-dialog">
        <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Detalhes da compra</h4>
          </div>
          <!-- Modal body -->
          <div class="modal-body">
            <div id="conteudopedido">

            </div>
          </div>
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
          </div>
        </div>
      </div>
    </div>
@endsection
