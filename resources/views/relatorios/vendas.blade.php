@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Relatório de Vendas</h1>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Cliente</th>
                    <th>Data</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($vendas as $venda)
                    <tr>
                        <td>{{ $venda->id }}</td>
                        <td>{{ $venda->usuario->name ?? 'Desconhecido' }}</td>
                        <td>{{ $venda->created_at->format('d/m/Y H:i') }}</td>
                        <td>R$ {{ number_format($venda->total, 2, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
