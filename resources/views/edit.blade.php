@extends('layout.main')

@section('title', 'Editar Usuário')

@section('content')


<br>
<div class="container">
    <h3>Editar Usuário</h3>
    <form action="{{ route('users.update',$user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control" id="name" name="name" required value="{{ old('name', $user->name) }}">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" required value="{{ old('email', $user->email) }}">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Senha</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Deixe em branco se não quiser alterar">
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="{{ route('home') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<!-- Exibindo erros de validação -->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@endsection
