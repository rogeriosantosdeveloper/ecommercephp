@extends('layouts.app')

@section('title', 'Carrinho de Compras')

@section('content')
    <h1 class="mb-4">Carrinho de Compras</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(count($carrinho) > 0)
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Produto</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                    <th>Total</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($carrinho as $id => $item)
                    <div>
                        <img src="{{ asset('storage/' . $item['imagem']) }}" width="100">
                        <p><strong>{{ $item['nome'] }}</strong></p>
                        <p>Preço: R$ {{ number_format($item['preco'], 2, ',', '.') }}</p>
                        <p>Quantidade: {{ $item['quantidade'] }}</p>
                        <form action="{{ route('carrinho.remover', $id) }}" method="POST">
                            @csrf
                            <button type="submit">Remover</button>
                        </form>
                    </div>
                @endforeach
            </tbody>
        </table>

        <form action="{{ route('carrinho.finalizar') }}" method="POST">
            @csrf
            <button class="btn btn-success">Finalizar Compra</button>
        </form>
    @else
        <p>Seu carrinho está vazio.</p>
    @endif
@endsection