<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Minha Loja')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ route('vitrine.index') }}">Minha Loja</a>
            <div>
                @auth
                    <a class="btn btn-outline-light me-2" href="{{ route('carrinho.index') }}">Carrinho</a>
                    <span class="text-white me-2">{{ Auth::user()->name }}</span>
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-outline-light">Sair</button>
                    </form>
                @else
                    <a class="btn btn-outline-light me-2" href="{{ route('login') }}">Login</a>
                    <a class="btn btn-outline-light" href="{{ route('register') }}">Registrar</a>
                @endauth
            </div>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>
</body>

</html>