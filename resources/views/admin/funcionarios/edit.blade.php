@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Funcionário</h1>

    <form action="{{ route('funcionarios.update', $funcionario) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Nome</label>
            <input type="text" name="name" class="form-control" value="{{ $funcionario->name }}" required>
        </div>

        <div class="mb-3">
            <label>E-mail</label>
            <input type="email" name="email" class="form-control" value="{{ $funcionario->email }}" required>
        </div>

        <button class="btn btn-primary">Atualizar</button>
    </form>
</div>
@endsection
