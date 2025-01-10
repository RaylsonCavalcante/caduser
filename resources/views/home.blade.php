@extends('layout.main')

@section('title', 'Home')

@section('content')

<br>
<center>
<h1>Cad User</h1>
</center>
<br>
<div class="d-grid gap-2" style="width:100w; align-items: center;">
  <a href="{{ route('users.create') }}"  class="btn btn-primary" style="width:20%; margin: 10px;" type="button" data-mdb-ripple-init><i class="far fa-square-plus"></i> Adicionar Novo Usuário</a>
</div>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<table class="table align-middle mb-0 bg-white">
  <thead class="bg-light">
    <tr>
      <th>Nome</th>
      <th>Email</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>

    @if ($users->isEmpty())
        <tr>
            <td colspan="4" class="text-center">Nenhum usuário encontrado.</td>
        </tr>
    @else

        @foreach ($users as $user)

        <tr>
          <td>
            <div class="d-flex align-items-center">
              <div class="ms-3">
                <p class="fw-normal mb-1">{{ $user->name }}</p>
              </div>
            </div>
          </td>
          <td>
            <p class="fw-normal mb-1">{{ $user->email }}</p>
          </td>
          <td>
            <a href="{{ route('users.edit', $user->id) }}" type="button" class="btn btn-primary btn-sm btn-rounded">
              Editar
            </a>
            <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm btn-rounded" onclick="return confirm('Deseja realmente excluir este usuário?')">
                    Excluir
                </button>
            </form>
          </td>
        </tr>

        @endforeach
    @endif
    
  </tbody>
</table>

@endsection