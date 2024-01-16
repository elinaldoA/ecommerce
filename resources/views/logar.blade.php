@extends('loja')
@section('scriptjs')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"
        integrity="sha512-0XDfGxFliYJPFrideYOoxdgNIvrwGTLnmK20xZbCAvPfLGQMzHUsaqZK8ZoH+luXGRxTrS46+Aq400nCnAT0/w=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(function() {
            //JQUERY -- ONLOAD -Ao carregar a página
            $("#login").mask("000.000.000-00")
        })
    </script>
@endsection
@section('conteudo')
    <div class="col-12">
        <h2 class="mb-3">Logar no sistema</h2>
        <form action="{{ route('logar') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                Login
                <input type="text" name="login" id="login" class="form-control col-4" />
            </div>
            <div class="form-group">
                Senha
                <input type="password" name="senha" id="senha" class="form-control col-4" />
            </div>
            <br />
            <input type="submit" value="Logar" class="btn btn-lg btn-primary" />
        </form>
    </div>
@endsection
