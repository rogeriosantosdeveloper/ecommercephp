@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Painel Administrativo</h1>

    <div class="row mt-4">
        <div class="col-md-3">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Produtos</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $totalProdutos }}</h5>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Clientes</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $totalClientes }}</h5>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-white bg-warning mb-3">
                <div class="card-header">Vendas</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $totalVendas }}</h5>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-white bg-danger mb-3">
                <div class="card-header">Faturamento</div>
                <div class="card-body">
                    <h5 class="card-title">R$ {{ number_format($faturamento, 2, ',', '.') }}</h5>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
