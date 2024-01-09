<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('/img/favicon.png') }}">
    <title>
        Produtos
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('/css/nucleo-icons.css" rel="stylesheet') }}" />
    <link href="{{ asset('/css/nucleo-svg.css" rel="stylesheet') }}" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{ asset('/css/nucleo-svg.css" rel="stylesheet') }}" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('/css/soft-ui-dashboard.css?v=1.0.7') }}" rel="stylesheet" />
    <!-- Nepcha Analytics (nepcha.com) -->
    <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
    <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body class="g-sidenav-show  bg-gray-100">
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 "
        id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href="{{ route('dashboard') }}">
                <i class="fa fa-dashboard"></i>
                <span class="ms-1 font-weight-bold">Dashboard</span>
            </a>
        </div>
        <hr class="horizontal dark mt-0">
        <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link  " href="{{ route('profile') }}">
                        <i class="fa fa-user"></i>
                        <span class="nav-link-text ms-1">Perfil</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
            navbar-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a>
                        </li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Produtos</li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0">Novo Produto</h6>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                        <div class="input-group" hidden="true">
                            <span class="input-group-text text-body"><i class="fas fa-search"
                                    aria-hidden="true"></i></span>
                            <input type="text" class="form-control" placeholder="Type here...">
                        </div>
                    </div>
                    <ul class="navbar-nav  justify-content-end">
                        <li class="nav-item d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body font-weight-bold px-0">
                                <i class="fa fa-user me-sm-1"></i>
                                <span class="d-sm-inline d-none">Entrar</span>
                            </a>
                        </li>
                        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item px-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0">
                                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <form class="col" method="POST" action="{{route('produtos.store')}}" enctype="multipart/form-data">
            @csrf
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="produto-geral" data-bs-toggle="tab"
                        data-bs-target="#produto-geral-pane" type="button" role="tab"
                        aria-controls="produto-geral-pane" aria-selected="true">Dados do produto</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="produto-detalhes" data-bs-toggle="tab"
                        data-bs-target="#produto-detalhes-pane" type="button" role="tab"
                        aria-controls="produto-detalhes-pane" aria-selected="false">Detalhes do produto</button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="produto-geral-pane" role="tabpanel"
                    aria-labelledby="produto-geral" tabindex="0">
                    <div class="row g-3">
                        <div class="col-4">
                            <label for="foto" class="form-label">Foto<span class="small text-danger"> * </span></label>
                            <input type="file" class="form-control" id="foto" name="foto">
                        </div>
                        <div class="col-4">
                            <label for="nome" class="form-label">Nome:<span class="small text-danger"> * </span></label>
                            <input type="text" class="form-control" id="nome" name="nome"
                                placeholder="Notebook">
                        </div>
                        <div class="col-4">
                            <label for="valor">Valor<span class="small text-danger"> * </span></label>
                            <input type="text" class="form-control" id="valor" name="valor"
                                placeholder="R$ 0.00">
                        </div>
                        <div class="col-12">
                            <label for="descricao">Descrição<span class="small text-danger"> * </span></label>
                            <textarea class="form-control" id="descricao" name="descricao" placeholder="Breve descrição do produto"
                                rows="6" cols="6"></textarea>
                        </div>
                        <div class="col-4">
                            <label for="categoria">Categoria<span class="small text-danger"> * </span></label>
                            <select class="form-control" id="categoria_id" name="categoria_id">
                                <option>Selecione</option>
                                @foreach ($categorias as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->categoria }}</option>
                                @endforeach
                            </select><br />
                            <button type="submit" class="btn btn-primary mb-3">Salvar</button>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="produto-detalhes-pane" role="tabpanel"
                    aria-labelledby="produto-detalhes" tabindex="0">
                    <div class="row g-3">

                        <div class="col-4">
                            <label for="marca">Marca<span class="small text-danger"> * </span></label>
                            <input type="text" class="form-control" id="marca" name="marca" placeholder="Nike..">
                        </div>
                        <div class="col-4">
                            <label for="marca">Modelo<span class="small text-danger"> * </span></label>
                            <input type="text" class="form-control" id="modelo" name="modelo" placeholder="Nike..">
                        </div>
                        <div class="col-4">
                            <label for="marca">Cor<span class="small text-danger"> * </span></label>
                            <input type="text" class="form-control" id="cor" name="cor" placeholder="Nike..">
                        </div>
                        <div class="col-4">
                            <label for="marca">Altura<span class="small text-danger"> * </span></label>
                            <input type="text" class="form-control" id="altura" name="altura" placeholder="Nike..">
                        </div>
                        <div class="col-4">
                            <label for="marca">Largura<span class="small text-danger"> * </span></label>
                            <input type="text" class="form-control" id="largura" name="largura" placeholder="Nike..">
                        </div>
                        <div class="col-4">
                            <label for="marca">Profundidade<span class="small text-danger"> * </span></label>
                            <input type="text" class="form-control" id="profundidade" name="profundidade" placeholder="Nike..">
                        </div>
                        <div class="col-4">
                            <label for="marca">Peso<span class="small text-danger"> * </span></label>
                            <input type="text" class="form-control" id="peso" name="peso" placeholder="Kg...">
                        </div>
                        <div class="col-4">
                            <label for="marca">Sistema<span class="small text-danger"> * </span></label>
                            <input type="text" class="form-control" id="sistema" name="sistema" placeholder="Windows...">
                        </div>
                        <div class="col-4">
                            <label for="marca">Linha<span class="small text-danger"> * </span></label>
                            <input type="text" class="form-control" id="linha" name="linha">
                        </div>
                        <div class="col-4">
                            <label for="marca">Tipo<span class="small text-danger"> * </span></label>
                            <input type="text" class="form-control" id="tipo" name="tipo">
                        </div>
                        <div class="col-4">
                            <label for="marca">Classificação<span class="small text-danger"> * </span></label>
                            <input type="text" class="form-control" id="classificacao" name="classificacao">
                        </div>
                        <div class="col-4">
                            <label for="marca">Áudio<span class="small text-danger"> * </span></label>
                            <input type="text" class="form-control" id="audio" name="audio">
                        </div>
                        <div class="col-4">
                            <label for="marca">Video<span class="small text-danger"> * </span></label>
                            <input type="text" class="form-control" id="video" name="video">
                        </div>
                        <div class="col-4">
                            <label for="marca">Velocidade<span class="small text-danger"> * </span></label>
                            <input type="text" class="form-control" id="velocidade" name="velocidade">
                        </div>
                        <div class="col-4">
                            <label for="marca">Processamento<span class="small text-danger"> * </span></label>
                            <input type="text" class="form-control" id="processamento" name="processamento">
                        </div>
                        <div class="col-4">
                            <label for="marca">Armazenamento<span class="small text-danger"> * </span></label>
                            <input type="text" class="form-control" id="armazenamento" name="armazenamento">
                        </div>
                        <div class="col-4">
                            <label for="marca">Conectividade<span class="small text-danger"> * </span></label>
                            <input type="text" class="form-control" id="conectividade" name="conectividade">
                        </div>
                        <div class="col-4">
                            <label for="marca">Energia<span class="small text-danger"> * </span></label>
                            <input type="text" class="form-control" id="energia" name="energia">
                        </div>
                        <div class="col-4">
                            <label for="marca">Itens inclusos<span class="small text-danger"> * </span></label>
                            <input type="text" class="form-control" id="itens_inclusos" name="itens_inclusos">
                        </div>
                        <div class="col-4">
                            <label for="marca">Garantia<span class="small text-danger"> * </span></label>
                            <input type="text" class="form-control" id="garantia" name="garantia">
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <footer class="footer pt-3  ">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-6 mb-lg-0 mb-4">
                        <div class="copyright text-center text-sm text-muted text-lg-start">
                            ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script>,
                            EA Shop <i class="fa fa-heart"></i> por
                            <a href="#" class="font-weight-bold" target="_blank">Elinaldo</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        </div>
    </main>
    <div class="fixed-plugin">
        <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
            <i class="fa fa-cog py-2"> </i>
        </a>
        <div class="card shadow-lg ">
            <div class="card-header pb-0 pt-3 ">
                <div class="float-start">
                    <h5 class="mt-3 mb-0">Configurações</h5>
                </div>
                <div class="float-end mt-4">
                    <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                        <i class="fa fa-close"></i>
                    </button>
                </div>
                <!-- End Toggle Button -->
            </div>
            <hr class="horizontal dark my-1">
            <div class="card-body pt-sm-3 pt-0">
                <!-- Sidebar Backgrounds -->
                <div>
                    <h6 class="mb-0">Sidebar Cores</h6>
                </div>
                <a href="javascript:void(0)" class="switch-trigger background-color">
                    <div class="badge-colors my-2 text-start">
                        <span class="badge filter bg-gradient-primary active" data-color="primary"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-dark" data-color="dark"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-info" data-color="info"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-success" data-color="success"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-warning" data-color="warning"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-danger" data-color="danger"
                            onclick="sidebarColor(this)"></span>
                    </div>
                </a>
                <!-- Sidenav Type -->
                <div class="mt-3">
                    <h6 class="mb-0">Sidenav Tipo</h6>
                    <p class="text-sm">Escolha entre 2 tipos diferentes de navegação lateral.</p>
                </div>
                <div class="d-flex">
                    <button class="btn bg-gradient-primary w-100 px-3 mb-2 active" data-class="bg-transparent"
                        onclick="sidebarType(this)">Transparente</button>
                    <button class="btn bg-gradient-primary w-100 px-3 mb-2 ms-2" data-class="bg-white"
                        onclick="sidebarType(this)">Branco</button>
                </div>
                <p class="text-sm d-xl-none d-block mt-2">Você pode alterar o tipo de navegação lateral apenas na
                    visualização da área de trabalho.</p>
                <!-- Navbar Fixed -->
                <div class="mt-3">
                    <h6 class="mb-0">Barra de navegação fixa</h6>
                </div>
                <div class="form-check form-switch ps-0">
                    <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed"
                        onclick="navbarFixed(this)">
                </div>
            </div>
        </div>
    </div>
    <!--   Core JS Files   -->
    <script src="{{ asset('/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('/js/plugins/chartjs.min.js') }}"></script>
    <script>
        var ctx = document.getElementById("chart-bars").getContext("2d");

        new Chart(ctx, {
            type: "bar",
            data: {
                labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Sales",
                    tension: 0.4,
                    borderWidth: 0,
                    borderRadius: 4,
                    borderSkipped: false,
                    backgroundColor: "#fff",
                    data: [450, 200, 100, 220, 500, 100, 400, 230, 500],
                    maxBarThickness: 6
                }, ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                        },
                        ticks: {
                            suggestedMin: 0,
                            suggestedMax: 500,
                            beginAtZero: true,
                            padding: 15,
                            font: {
                                size: 14,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                            color: "#fff"
                        },
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false
                        },
                        ticks: {
                            display: false
                        },
                    },
                },
            },
        });


        var ctx2 = document.getElementById("chart-line").getContext("2d");

        var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

        gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
        gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
        gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

        var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

        gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
        gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
        gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors

        new Chart(ctx2, {
            type: "line",
            data: {
                labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                        label: "Mobile apps",
                        tension: 0.4,
                        borderWidth: 0,
                        pointRadius: 0,
                        borderColor: "#cb0c9f",
                        borderWidth: 3,
                        backgroundColor: gradientStroke1,
                        fill: true,
                        data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                        maxBarThickness: 6

                    },
                    {
                        label: "Websites",
                        tension: 0.4,
                        borderWidth: 0,
                        pointRadius: 0,
                        borderColor: "#3A416F",
                        borderWidth: 3,
                        backgroundColor: gradientStroke2,
                        fill: true,
                        data: [30, 90, 40, 140, 290, 290, 340, 230, 400],
                        maxBarThickness: 6
                    },
                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#b2b9bf',
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#b2b9bf',
                            padding: 20,
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });
    </script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('/js/soft-ui-dashboard.min.js?v=1.0.7') }}"></script>
</body>

</html>
