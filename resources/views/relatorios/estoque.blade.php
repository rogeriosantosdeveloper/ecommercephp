@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Relatório de Estoque</h1>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Produto</th>
                    <th>Categoria</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                </tr>
            </thead>
            <tbody>
                @foreach($produtos as $produto)
                    <tr>
                        <td>{{ $produto->nome }}</td>
                        <td>{{ $produto->categoria->nome ?? 'Sem categoria' }}</td>
                        <td>R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                        <td>{{ $produto->quantidade }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
