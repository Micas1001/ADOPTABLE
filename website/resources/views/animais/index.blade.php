@extends('layouts.app')

@section('title', 'Animais para Adoção')

@section('content')
<section class="py-5">
    <div class="container">
        <h1 class="text-center mb-4">🐾 Animais Disponíveis para Adoção</h1>

        <!-- BARRA DE PESQUISA -->
<div class="container my-4">
    <div class="bg-white shadow rounded p-4">
        <form class="row g-2" method="GET" action="{{ route('animais.index') }}">
            <div class="col-md-2">
                <select class="form-select" name="tipo">
                    <option value="">Tipo</option>
                    <option value="cão">Cão</option>
                    <option value="gato">Gato</option>
                </select>
            </div>
            <div class="col-md-2">
                <input type="text" class="form-control" name="raca" placeholder="Raça">
            </div>
            <div class="col-md-2">
                <select class="form-select" name="sexo">
                    <option value="">Sexo</option>
                    <option value="macho">Macho</option>
                    <option value="fêmea">Fêmea</option>
                </select>
            </div>
            <div class="col-md-2">
                <select class="form-select" name="idade">
                    <option value="">Idade</option>
                    <option value="jovem">Jovem</option>
                    <option value="adulto">Adulto</option>
                </select>
            </div>
            <div class="col-md-2">
                <select class="form-select" name="localizacao">
                    <option value="">Localização</option>
                    <option value="Coimbra">Coimbra</option>
                    <option value="Lisboa">Lisboa</option>
                    <option value="Porto">Porto</option>
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-danger w-100">Procurar</button>
            </div>
        </form>
    </div>
</div>

        <!-- Lista de Animais -->
        <div class="row">
            @forelse($animais as $animal)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm h-100">
                        @if($animal->imagem)
                            <img src="{{ asset('storage/' . $animal->imagem) }}" class="card-img-top" alt="{{ $animal->nome }}">
                        @else
                            <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Sem imagem">
                        @endif
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $animal->nome }}</h5>
                            <p class="mb-1"><strong>Idade:</strong> {{ $animal->idade }}</p>
                            <p class="mb-1"><strong>Sexo:</strong> {{ $animal->sexo }}</p>
                            <p class="mb-1"><strong>Raça:</strong> {{ $animal->raca }}</p>
                            <p class="mb-1"><strong>Localização:</strong> {{ $animal->localizacao }}</p>
                            <p class="text-muted">{{ Str::limit($animal->descricao, 100) }}</p>
                            <div class="mt-auto d-flex justify-content-between align-items-center">
                                <a href="{{ route('animais.show', $animal->id) }}" class="btn btn-primary btn-sm">ADOTAR</a>
                                <form action="{{ route('wishlist.toggle') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="animal_id" value="{{ $animal->id }}">
                                    <button class="btn btn-outline-danger btn-sm" title="Adicionar à wishlist">❤️</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center">Nenhum animal encontrado neste momento.</p>
            @endforelse
        </div>
    </div>
</section>
@endsection

