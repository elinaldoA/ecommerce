@extends('layout')
@section('scriptjs')
<script type="text/javascript" src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    function carregar(){
        PagSeguroDirectPayment.setSessionId('{{ $sessionID }}')
    }
    $(function(){
        //ONLOAD AO CARREGAR A PÁGINA
        carregar();
        $(".ncredito").on('blur', function(){
            PagSeguroDirectPayment.onSenderHashReady(function(response){
                if(response.status == 'error'){
                    console.log(response.message)
                    return false
                }
                var hash = response.senderHash
                $(".hashseller").val(hash)
            })

            let ncartao = $(this).val()
            $(".bandeira").val("")
            if(ncartao.length > 6){
                let prefixCartao = ncartao.substr(0,6) // pegar o 6 primeiro digitos do cartão para descobrir a bandeira
                PagSeguroDirectPayment.getBrand({
                    cardBin :prefixCartao,
                    success : function(response){
                        $(".bandeira").val(response.brand.name)
                    },
                    error : function(response){
                        alert("Numero do cartão inválido")
                    }
                })
            }
        })

        $(".nparcela").on('blur', function(){
            var bandeira = $(".bandeira").val();
            var totalParcelas = $(this).val();
            if(bandeira == ""){
                alert("Preencha o numero do cartão válido")
                return;
            }
            PagSeguroDirectPayment.getInstallments({
                amount : $(".totalfinal").val(),
                maxIntallmentNoInterest : 2, // a partir da segunda parcela já tem juros
                brand : bandeira, // bandeira do cartão
                success : function(response){
                    console.log(response);
                    let status = response.error
                    if(status){
                        alert("Não foi encontrado opção de parcelamento")
                        return;
                    }
                    let indice = totalParcelas - 1;
                    let totalapagar = response.installments[bandeira][indice].totalAmount
                    let valorTotalparcela = response.installments[bandeira][indice].installmentAmount

                    $(".totalparcela").val(valorTotalparcela)
                    $(".totalapagar").val(totalapagar)
                }
            })
        })
        $(".pagar").on("click", function(){
            var numerocartao = $(".ncredito").val()
            var iniciocartao = numerocartao.substr(0,6)
            var ncvv = $(".ncvv").val()
            var mesexp = $(".mesexp").val()
            var anoexp = $(".anoexp").val()
            var hashseller = $(".hashseller").val()
            var bandeira = $(".bandeira").val()
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            PagSeguroDirectPayment.createCardToken({
                cardNumber : numerocartao,
                brand : bandeira,
                cvv : ncvv,
                expirationMonth : mesexp,
                expirationYear : anoexp,
                success : function(response){
                    $.post('{{ route("carrinho_finalizar") }}', {
                        hashseller : hashseller,
                        cardtoken : response.card.token,
                        nparcela : $(".nparcela").val(),
                        totalapagar : $(".totalapagar").val(),
                        totalparcela : $(".totalparcela").val()
                    },function(result){
                        alert(result)
                    });
                },
                error : function(err){
                    alert("Não pode buscar o token do cartão, verifique todos os campos e tente novamente")
                    console.log(err)
                }
            })
        })
    })
</script>
@endsection
@section('conteudo')
    <form>
        @php $total = 0; @endphp
        @if (isset($cart) && count($cart) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Valor</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cart as $indice => $p)
                    <tr>
                        <td>{{ $p->nome }}</td>
                        <td>{{ $p->valor }}</td>
                    </tr>
                    @php $total += $p->valor; @endphp
                @endforeach
            </tbody>
        </table>
        @endif
        <input type="text" name="hashseller" class="hashseller" hidden="true">
        <input type="text" name="bandeira" class="bandeira" hidden="true">
        <div class="row">
            <div class="col-4">
                Numero do Cartão:
                <input type="text" name="ncredito" class="ncredito form-control" />
            </div>
            <div class="col-4">
                Cvv:
                <input type="text" name="ncvv" class="ncvv form-control" />
            </div>
            <div class="col-4">
                Mês de Expiração:
                <input type="text" name="mesexp" class="mesexp form-control" />
            </div>
            <div class="col-4">
                Ano de Expiração:
                <input type="text" name="anoexp" class="anoexp form-control">
            </div>
            <div class="col-4">
                Titular:
                <input type="text" name="nomecartao" class="nomecartao form-control">
            </div>
            <div class="col-4">
                Parcelas:
                <input type="text" name="nparcela" class="nparcela form-control">
            </div>
            <div class="col-4">
                Valor total:
                <input type="text" name="totalfinal" value="{{ $total }}" class="totalfinal form-control" readonly />
            </div>
            <div class="col-4">
                Valor da Parcela
                <input type="text" name="totalparcela" class="totalparcela form-control">
            </div>
            <div class="col-4">
                Total à pagar:
                <input type="text" name="totalapagar" class="totalapagar form-control">
            </div>
            @csrf
        </div><br/>
        <input type="button" value="pagar" class="btn btn-success pagar"/>
    </form>
@endsection
