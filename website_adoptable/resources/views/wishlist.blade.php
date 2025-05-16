@extends('layouts.app')

@section('title', 'Minha Wishlist')

@section('content')
    <!-- Header Section -->
    <section class="py-5 text-center" style="background-color: #FE5101; color: white;">
        <div class="container">
            <h1 class="display-5 fw-bold">Minha Wishlist</h1>
            <p class="lead">Veja os animais que marcou como favoritos 💖</p>
        </div>
    </section>

    <!-- Wishlist Section -->
    <section class="py-5">
        <div class="container">
            @if($animais->isEmpty())
                <div class="alert alert-warning text-center">
                    Ainda não adicionou nenhum animal à sua wishlist.
                </div>
            @else
                <div class="row my-4 row-cols-1 row-cols-md-2 row-cols-lg-4 g-3">
                    @foreach($animais as $animal)
                        <div class="col">
                            <div class="card shadow-sm rounded p-0 position-relative">
                                <!-- Animal Image -->
                                @if($animal->imagem)
                                    <img src="{{ asset('storage/' . $animal->imagem) }}" class="card-img-top rounded-top" alt="{{ $animal->nome }}" style="height: 180px; object-fit: cover;">
                                @else
                                    <img src="https://via.placeholder.com/200x150" class="card-img-top rounded-top" alt="Sem imagem" style="height: 180px; object-fit: cover;">
                                @endif

                                <!-- Card Body -->
                                    <div class="card-body p-2">
                                    <h5 class="card-title">{{ $animal->nome }}</h5>
                                    <p class="text-muted mb-1">{{ $animal->raca }} • {{ $animal->idade }} • {{ $animal->sexo }}</p>
                                    <p class="text-muted mb-2"><strong>Localização:</strong> {{ $animal->localizacao }}</p>
                                    @if ($animal->user)
                                        <p class="text-muted"><strong>Anunciado por:</strong> {{ $animal->user->name }}</p>
                                    @endif
                                    <p class="text-muted">{{ Str::limit($animal->descricao, 100) }}</p>

                                    <!-- Buttons -->
                                    <div class="mt-auto d-flex justify-content-between">
                                        <a href="{{ route('animais.show', $animal->id) }}" class="btn btn-orange btn-sm rounded-3">
                                            <i class="bi bi-eye me-1"></i> Ver mais
                                        </a>

                                        <!-- Wishlist Toggle -->
                                        <form action="{{ route('wishlist.toggle') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="animal_id" value="{{ $animal->id }}">
                                            <button class="btn btn-outline-danger btn-sm rounded-3" title="Remover da wishlist">
                                                <i class="bi bi-trash"></i>
                                            </button>
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
