@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Relatório de Vendas</h1>

    <form method="GET" action="{{ route('relatorios.vendas') }}" class="row g-3 mb-4">
        <div class="col-md-4">
            <label for="data_inicio" class="form-label">Data Início</label>
            <input type="date" name="data_inicio" id="data_inicio" class="form-control" value="{{ request('data_inicio') }}">
        </div>
        <div class="col-md-4">
            <label for="data_fim" class="form-label">Data Fim</label>
            <input type="date" name="data_fim" id="data_fim" class="form-control" value="{{ request('data_fim') }}">
        </div>
        <div class="col-md-4 d-flex align-items-end">
            <button type="submit" class="btn btn-primary w-100">Filtrar</button>
        </div>
    </form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Cliente</th>
                <th>Data</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($vendas as $venda)
                <tr>
                    <td>{{ $venda->user->name ?? 'N/A' }}</td>
                    <td>{{ $venda->created_at->format('d/m/Y H:i') }}</td>
                    <td>R$ {{ number_format($venda->total, 2, ',', '.') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">Nenhuma venda encontrada.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
