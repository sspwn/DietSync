<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <title>@yield('title')</title>
</head>

<body id="body-pd">
    <header class="header" id="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-10">
                    <i class="btn btn-lg text-white bi bi-list" id="header-toggle"></i>
                </div>
                <div class="col-2 text-white my-2 py-1">
                    <span>Usuário</span>
                </div>
            </div>
        </div>
    </header>

    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div>
                <a href="{{ url('index') }}" class="nav_logo">
                    <span class="nav_logo-name">Diet Sync</span>
                </a>

                <div class="nav_list">
                    <a href="{{ url('index') }}" class="nav_link @if(Request::is('index')) active @endif">
                        <i class="bi bi-house"></i>
                        <span class="nav_name">Home</span>
                    </a>

                    <a href="{{ url('registrar-dieta') }}" class="nav_link @if(Request::is('registrar-dieta')) active @endif">
                        <i class="bi bi-egg-fried"></i>
                        <span class="nav_name">Registrar Dieta</span>
                    </a>

                    <a href="{{ url('registrar-treino') }}" class="nav_link @if(Request::is('registrar-treino')) active @endif">
                        <i class="bi bi-clipboard-heart"></i>
                        <span class="nav_name">Registrar Treino</span>
                    </a>

                    <a href="{{ url('registrar-receita') }}" class="nav_link @if(Request::is('registrar-receita')) active @endif">
                        <i class="bi bi-clipboard-plus"></i>
                        <span class="nav_name">Registrar Receitas</span>
                    </a>

                    <a href="{{ url('exibir-dieta') }}" class="nav_link @if(Request::is('exibir-dieta')) active @endif">
                        <i class="bi bi-ui-checks-grid"></i>
                        <span class="nav_name">Dieta</span>
                    </a>

                    <a href="{{ url('treinos') }}" class="nav_link @if(Request::is('treinos')) active @endif">
                        <i class="bi bi-heart-pulse-fill"></i>
                        <span class="nav_name">Treinos</span>
                    </a>

                    <a href="{{ url('evolucao') }}" class="nav_link @if(Request::is('evolucao')) active @endif">
                        <i class="bi bi-graph-up-arrow"></i>
                        <span class="nav_name">Evolução</span>
                    </a>

                    <a href="{{ url('receitas') }}" class="nav_link @if(Request::is('receitas')) active @endif">
                        <i class="bi bi-journal-check"></i>
                        <span class="nav_name">Receitas</span>
                    </a>

                </div>
            </div>

            <a href="#" class="nav_link">
                <i class="bi bi-gear"></i>
                <span class="nav_name">Configuração</span>
            </a>
        </nav>
    </div>

    @yield('conteudo')

    <!-- Add these lines to the head of your HTML -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('js/javascript.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
