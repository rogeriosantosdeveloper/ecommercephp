@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Editar Produto</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ isset($produto) ? route('produtos.update', $produto->id) : route('produtos.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if(isset($produto))
        @method('PUT')
    @endif

    <div class="mb-3">
        <label for="nome" class="form-label">Nome do Produto</label>
        <input type="text" name="nome" class="form-control" value="{{ old('nome', $produto->nome ?? '') }}" required>
    </div>

    <div class="mb-3">
        <label for="descricao" class="form-label">Descrição</label>
        <textarea name="descricao" class="form-control">{{ old('descricao', $produto->descricao ?? '') }}</textarea>
    </div>

    <div class="mb-3">
        <label for="preco" class="form-label">Preço</label>
        <input type="number" step="0.01" name="preco" class="form-control" value="{{ old('preco', $produto->preco ?? '') }}" required>
    </div>

    <div class="mb-3">
        <label for="categoria_id" class="form-label">Categoria</label>
        <select name="categoria_id" class="form-select" required>
            <option value="">Selecione uma categoria</option>
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}" {{ old('categoria_id', $produto->categoria_id ?? '') == $categoria->id ? 'selected' : '' }}>
                    {{ $categoria->nome }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="imagem" class="form-label">Imagem (opcional)</label>
        <input type="file" name="imagem" class="form-control">
        @if(isset($produto) && $produto->imagem)
            <div class="mt-2">
                <img src="{{ asset('storage/' . $produto->imagem) }}" width="100">
            </div>
        @endif
    </div>

    <button type="submit" class="btn btn-primary">
        {{ isset($produto) ? 'Atualizar' : 'Cadastrar' }}
    </button>
</form>

</div>
@endsection
