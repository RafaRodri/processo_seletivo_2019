<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Desafio - 3</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        @yield('css-view')

        <link rel="shortcut icon" href="favicon.png">
    </head>

    <body>
    <!-- Menu -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
        <div class="container">
            <a class="navbar-brand" href="{{ route('usuario.criar') }}">CNM</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item {!! $page == 'criar' ? 'active' : '' !!}">
                        <a class="nav-link" href="{{ route('usuario.criar') }}">Criar</a>
                    </li>
                    <li class="nav-item {!! $page == 'listar' ? 'active' : '' !!}">
                        <a class="nav-link" href="{{ route('usuario.listar') }}">Listar</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Fim menu -->


    <div class="container">
        @yield('content-view')
    </div>

    @yield('js-view')
    </body>
</html>
