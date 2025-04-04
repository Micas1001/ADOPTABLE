@extends('layouts.app')

@section('title', 'Minha Wishlist')

@section('content')
    <section class="py-5 text-center" style="background-color: #FE5101; color: white;">
        <div class="container">
            <h1 class="display-4 fw-bold">Minha Wishlist</h1>
            <p class="lead">Veja os animais que marcou como favoritos 💖</p>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            @if($animais->isEmpty())
                <div class="alert alert-warning text-center">
                    Ainda não adicionou nenhum animal à sua wishlist.
                </div>
            @else
                <div class="row">
                    @foreach($animais as $animal)
                        <div class="col-md-4 mb-4">
                            <div class="card h-100 shadow-sm">
                                @if($animal->imagem)
                                    <img src="{{ asset('storage/' . $animal->imagem) }}" class="card-img-top" alt="{{ $animal->nome }}">
                                @else
                                    <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Sem imagem">
                                @endif
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title">{{ $animal->nome }}</h5>
                                    <p class="mb-1"><strong>Tipo:</strong> {{($animal->tipo) }}</p>
                                    <p class="mb-1"><strong>Idade:</strong> {{ $animal->idade }}</p>
                                    <p class="mb-1"><strong>Sexo:</strong> {{ $animal->sexo }}</p>
                                    <p class="mb-1"><strong>Raça:</strong> {{ $animal->raca }}</p>
                                    <p class="mb-1"><strong>Localização:</strong> {{ $animal->localizacao }}</p>
                                    <p class="mb-2 text-muted">{{ Str::limit($animal->descricao, 80) }}</p>
                                    <div class="mt-auto d-flex justify-content-between">
                                        <a href="{{ route('animais.show', $animal->id) }}" class="btn btn-primary btn-sm">Ver mais</a>
                                        <form action="{{ route('wishlist.toggle') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="animal_id" value="{{ $animal->id }}">
                                            <button class="btn btn-outline-danger btn-sm" title="Remover da wishlist">🗑️</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
@endsection

