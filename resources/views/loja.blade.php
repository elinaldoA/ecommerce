<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>ecommerce</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scriptjs')
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-md bg-light pl-5 pr-5 mb-5">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="" class="navbar-brand"> EA Shop</a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <a class="nav-link" href="{{route('home')}}">Home</a>
                    <a class="nav-link" href="{{route('categoria')}}">Categorias</a>
                </ul>
            </div>
            @if (!Auth::user())
                <div class="dropdown">
                    <button class="btn btn-sm btn-outline-info dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user-circle"></i> Olá faça seu login <br />ou cadastre-se
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="nav-link" href="{{route('logar')}}">Logar</a>
                        <a class="nav-link" href="{{route('cadastrar')}}">Criar conta</a>
                    </div>
                </div>
            @else
                <a class="nav-link" href="{{route('compra_historico')}}">Minhas compras</a>
                <a class="nav-link" href="{{route('sair')}}">Logout</a>
            @endif
            <a href="{{route('ver_carrinho')}}" class="btn btn-sm"><i class="fa fa-2x fa-shopping-cart"></i></a>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            @if (Auth::user())
                <div class="col-12">
                    <p class="pull-right">Seja bem vindo, {{ Auth::user()->nome }} <a href="">Sair</a></p>
                </div>
            @endif
            @if ($message = Session::get('err'))
                <div class="col-12">
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                </div>
            @endif
            @if ($message = Session::get('ok'))
                <div class="col-12">
                    <div class="alert alert-success">
                        {{ $message }}
                    </div>
                </div>
            @endif
            <!--Nesta div teremos uma área que os arquivos irão adcionar conteúdo-->
            @yield('conteudo')
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <!-- FOOTER -->
    <br />
    <footer class="container">
        <p class="float-right"><a href="#">Voltar ao topo</a></p>
        <p>&copy; 2023-2023 EA Shop, Inc. &middot; <a href="#">Privacidade</a> &middot; <a
                href="#">Termos</a></p>
    </footer>
</body>
<style>
    a{
        color: black;
    }
</style>
</html>
