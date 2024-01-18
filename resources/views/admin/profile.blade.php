@extends('layouts.admin')
@section('main-content')

    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
            navbar-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a>
                        </li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Perfil</li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0">Editar</h6>
                </nav>
            </div>
        </nav>
        <br />
        <br />
        <br />
        <div class="container-fluid">
            <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
                <div class="row gx-4">
                    <div class="col-auto">
                        <div class="avatar avatar-xl position-relative">
                            <img src="{{ asset('/img/bruce-mars.jpg') }}" alt="profile_image"
                                class="w-100 border-radius-lg shadow-sm">
                        </div>
                    </div>
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h5 class="mb-1">
                                {{ \Auth::user()->name }}
                            </h5>
                            <p class="mb-0 font-weight-bold text-sm">
                                {{ \Auth::user()->email }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br />
        @if (session('success'))
            <div id="sucesso" class="alert alert-success border-left-success alert-dismissible fade show"
                role="alert">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger border-left-danger" role="alert">
                <ul class="pl-4 my-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="container-fluid py-4">
            <div class="col-12 col-xl-4">
                <form class="col" action="{{ route('profile.update') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3">
                        <label for="name" class="form-label">Nome</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="name" id="name"
                                value="{{ \Auth::user()->name }}" />
                        </div>
                        <label for="email" class="form-label">E-mail</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="email" id="email"
                                value="{{ \Auth::user()->email }}" />
                        </div>
                        <label for="password" class="form-label">Senha</label>
                        <div class="col-md-8">
                            <input type="password" class="form-control" name="password" id="password"
                                value="{{ \Auth::user()->password }}" />
                        </div>
                        @csrf
                        @method('PUT')
                        <div class="col">
                            <button type="submit" class="btn btn-success">Salvar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
    // Iniciará quando todo o corpo do documento HTML estiver pronto.
    $().ready(function() {
        setTimeout(function() {
            $('#sucesso').hide(); // "sucesso" é o id do elemento que seja manipular.
        }, 2500); // O valor é representado em milisegundos.
    });
</script>
