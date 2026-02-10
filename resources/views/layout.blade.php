<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'ToDay!')</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    {{-- Seu CSS --}}
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <link rel="icon" href="{{ asset('images/roxo.png') }}" type="image/x-icon">
</head>

<body>

    {{-- NAVBAR --}}
    <nav class="app-navbar">
        <div class="app-navbar-container">
            
            {{-- Logo --}}
            <a href="{{ route('home') ?? '#' }}" class="app-logo">
                <img src="{{ asset('images/logoRoxa.png') }}" alt="ToDay!">
            </a>

            {{-- Menu --}}
            <ul class="app-nav-links">
                <li>
                    <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">
                        <i class="bi bi-check2-square"></i> Tasks
                    </a>

                </li>
                <li>
                    <a href="{{ route('graphics') }}" class="{{ request()->routeIs('graphics') ? 'active' : '' }}">
                        <i class="bi bi-bar-chart"></i> Gráficos
                    </a>

                </li>
                <li>
                    <a href="{{ route('profile') }}" class="{{ request()->routeIs('profile') ? 'active' : ''}}">
                        <i class="bi bi-person"></i> Perfil
                    </a>
                </li>
            </ul>

            {{-- Ações --}}
            <div class="app-nav-actions">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn-logout" title="Sair">
                        <i class="bi bi-box-arrow-right"></i>
                    </button>
                </form>
            </div>


        </div>
    </nav>

    {{-- CONTEÚDO --}}
    <main class="app-content">
        @yield('base')
    </main>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
