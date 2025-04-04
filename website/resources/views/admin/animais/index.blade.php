@extends('layouts.app')

@section('title', 'Gestão de Animais')

@section('content')
<section class="py-5 text-center" style="background-color: #FE5101; color: white;">
    <div class="container">
        <h1 class="display-5 fw-bold">Gestão de Animais</h1>
        <a href="{{ route('admin.animais.create') }}" class="btn btn-light mt-3">➕ Adicionar Novo Animal</a>
    </div>
</section>

<section class="py-5">
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Imagem</th>
                        <th>Nome</th>
                        <th>Tipo</th>
                        <th>Raça</th>
                        <th>Sexo</th>
                        <th>Idade</th>
                        <th>Localização</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($animais as $animal)
                        <tr>
                            <td>
                                @if($animal->imagem)
                                    <img src="{{ asset('storage/' . $animal->imagem) }}" alt="{{ $animal->nome }}" width="80" class="img-thumbnail">
                                @else
                                    <img src="https://via.placeholder.com/80x60" alt="Sem imagem" class="img-thumbnail">
                                @endif
                            </td>
                            <td>{{ $animal->nome }}</td>
                            <td>{{ ucfirst($animal->tipo) }}</td>
                            <td>{{ $animal->raca }}</td>
                            <td>{{ ucfirst($animal->sexo) }}</td>
                            <td>{{ ucfirst($animal->idade) }}</td>
                            <td>{{ $animal->localizacao }}</td>
                            <td>
                                <a href="{{ route('admin.animais.edit', $animal->id) }}" class="btn btn-sm btn-primary mb-1">✏️ Editar</a>
                                <form action="{{ route('admin.animais.destroy', $animal->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem a certeza que deseja eliminar este animal?')">🗑️ Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">Nenhum animal registado.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection
