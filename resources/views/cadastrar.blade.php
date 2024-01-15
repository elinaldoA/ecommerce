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
            $("#cpf").mask("000.000.000-00")
            $("#cep").mask("00000-000")
            $("#telefone").mask("(00) 0000-0000")
            $("#nascimento").mask("00/00/0000")
        })
    </script>
@endsection
@section('conteudo')
    <h2 class="mb-3">Cadastrar cliente</h2>
    <form action="{{ route('cadastrar_cliente') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    Nome <input type="text" name="nome" id="nome" class="form-control" />
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    Email <input type="text" name="email" id="email" class="form-control" />
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    Cpf <input type="text" name="cpf" id="cpf" class="form-control" />
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    Telefone <input type="text" name="telefone" id="telefone" class="form-control" />
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    Nascimento <input type="text" name="nascimento" id="nascimento" class="form-control" />
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    Senha <input type="password" name="password" id="password" class="form-control" />
                </div>
            </div>
            <div class="col-8">
                <div class="form-group">
                    Endereço <input type="text" name="endereco" id="endereco" class="form-control" />
                </div>
            </div>
            <div class="col-1">
                <div class="form-group">
                    Número <input type="text" name="numero" id="numero" class="form-control" />
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    Complemento <input type="text" name="complemento" id="complemento" class="form-control" />
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    Cidade <input type="text" name="cidade" id="cidade" class="form-control" />
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    Cep <input type="text" name="cep" id="cep" class="form-control" />
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    Estado <input type="text" name="estado" id="estado" class="form-control" />
                </div>
            </div>
        </div>
        <br />
        <input type="submit" value="cadastrar" class="btn btn-success btn-sm" />
    </form>
@endsection
