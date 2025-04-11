@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Vitrine de Produtos</h1>

        @auth
            @if(auth()->user()->is_admin)
                <div class="mb-3">
                    <a href="{{ route('produtos.create') }}" class="btn btn-success">Adicionar Novo Produto</a>
                </div>
            @endif
        @endauth

        <form method="GET" action="{{ route('vitrine.index') }}" class="mb-4">
            <div class="row">
                <div class="col-md-4">
                    <select name="categoria_id" class="form-select" onchange="this.form.submit()">
                        <option value="">Todas as categorias</option>
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}" {{ (isset($categoriaId) && $categoriaId == $categoria->id) ? 'selected' : '' }}>
                                {{ $categoria->nome }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </form>

        <div class="row">
            @foreach($produtos as $produto)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        @if($produto->imagem)
                            <img src="{{ asset('storage/' . $produto->imagem) }}" class="card-img-top" alt="{{ $produto->nome }}">
                        @endif
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div>
                                <h5 class="card-title">{{ $produto->nome }}</h5>
                                <p class="card-text">{{ $produto->descricao }}</p>
                                <p><strong>R$ {{ number_format($produto->preco, 2, ',', '.') }}</strong></p>
                                <p><strong>Categoria:</strong> {{ $produto->categoria->nome ?? 'Sem categoria' }}</p>
                            </div>

                           
                            @auth
                                @if(auth()->user()->is_admin)
                                    <div class="mt-2">
                                        <a href="{{ route('produtos.edit', $produto->id) }}" class="btn btn-sm btn-warning">Editar</a>
                                        <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST" class="d-inline"
                                            onsubmit="return confirm('Tem certeza que deseja excluir?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                                        </form>
                                    </div>
                                @endif
                            @endauth

                           
                            <form action="{{ route('carrinho.adicionar', $produto->id) }}" method="POST" class="mt-2">
                                @csrf
                                <button class="btn btn-primary w-100">Adicionar ao Carrinho</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-4">
            {{ $produtos->withQueryString()->links() }}
        </div>
    </div>
@endsection
