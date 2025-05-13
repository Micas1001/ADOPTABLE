@extends('layouts.app')

@section('title', 'Área Pessoal')

@section('content')
<section class="py-5 text-white" style="background-color: #FE5101;">
    <div class="container text-center">
        <h1 class="display-4 fw-bold">Bem-vindo à Sua Área Pessoal</h1>
        <p class="lead">Aqui pode gerir os seus dados e os animais que partilhou para adoção.</p>
        <a href="{{ route('animais.user.create') }}" class="btn btn-light btn-lg mt-3">
            ➕ Registar Novo Animal
        </a>
        <a href="{{ route('profile.edit') }}" class="btn btn-outline-light btn-lg mt-3 ms-2">
            ✏️ Editar Dados Pessoais
        </a>
    </div>
</section>

<section class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-4">Animais Publicados por Si</h2>

        @if(session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        <div class="row">
            @forelse($animais as $animal)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100 shadow-sm border-0">
                        @if($animal->imagem)
                            <img src="{{ asset('storage/' . $animal->imagem) }}" class="card-img-top" alt="{{ $animal->nome }}" style="object-fit: cover; height: 220px;">
                        @else
                            <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Sem imagem">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title text-primary fw-bold">{{ $animal->nome }}</h5>
                            <ul class="list-unstyled small mb-3">
                                <li><strong>Idade:</strong> {{ $animal->idade }}</li>
                                <li><strong>Sexo:</strong> {{ $animal->sexo }}</li>
                                <li><strong>Raça:</strong> {{ $animal->raca }}</li>
                                <li><strong>Localização:</strong> {{ $animal->localizacao }}</li>
                            </ul>
                            <p class="text-muted small mb-2">{{ $animal->descricao }}</p>
                            <form action="{{ route('animais.destroy', $animal->id) }}" method="POST" onsubmit="return confirm('Tem a certeza que deseja eliminar este animal?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm w-100">🗑️ Eliminar Animal</button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p class="text-muted">Ainda não adicionou nenhum animal.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>
@endsection
