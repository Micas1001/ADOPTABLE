@extends('layouts.app')

@section('title', 'Área Pessoal')

@section('content')
<section class="py-5 text-center" style="background-color: #FE5101; color: white;">
    <div class="container">
        <h1 class="display-5 fw-bold">Área Pessoal</h1>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h3 class="mb-3">Partilhe um animal para adoção</h3>
            <p class="text-muted">Se encontrou ou está a cuidar de um animal, pode registá-lo para que alguém o adote.</p>
            <a href="{{ route('animais.user.create') }}" class="btn btn-warning btn-lg">
                ➕ Registar Novo Animal
            </a>
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('profile.edit') }}" class="btn btn-outline-primary">
                ✏️ Editar Dados Pessoais
            </a>
        </div>

        <h4 class="mb-4">Animais adicionados por si</h4>
        <div class="row">
            @forelse($animais as $animal)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        @if($animal->imagem)
                            <img src="{{ asset('storage/' . $animal->imagem) }}" class="card-img-top" alt="{{ $animal->nome }}">
                        @else
                            <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Sem imagem">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $animal->nome }}</h5>
                            <p><strong>Idade:</strong> {{ $animal->idade }}</p>
                <p><strong>Sexo:</strong> {{ $animal->sexo }}</p>
                <p><strong>Raça:</strong> {{ $animal->raca }}</p>
                <p><strong>Localização:</strong> {{ $animal->localizacao }}</p>
                @if($animal->user)
    <p class="text-muted small">Publicado por: {{ $animal->user->name }}</p>
@endif
                <p class="mt-3">{{ $animal->descricao }}</p>
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
