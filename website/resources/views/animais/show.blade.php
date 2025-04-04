@extends('layouts.app')

@section('title', $animal->nome . ' - Detalhes do Animal')

@section('content')

@if(session('success'))
    <div class="alert alert-success text-center">
        {{ session('success') }}
    </div>
@endif

<section class="py-5">
    <div class="container">
        <div class="row">
            <!-- Imagem -->
            <div class="col-md-6 text-center">
                @if($animal->imagem)
                    <img src="{{ asset('storage/' . $animal->imagem) }}" class="img-fluid rounded shadow" alt="{{ $animal->nome }}">
                @else
                    <img src="https://via.placeholder.com/500x350" class="img-fluid rounded shadow" alt="Sem imagem">
                @endif
            </div>

            <!-- Informações -->
            <div class="col-md-6 mt-4 mt-md-0">
                <h2 class="fw-bold">{{ $animal->nome }}</h2>
                <p><strong>Idade:</strong> {{ $animal->idade }}</p>
                <p><strong>Sexo:</strong> {{ $animal->sexo }}</p>
                <p><strong>Raça:</strong> {{ $animal->raca }}</p>
                <p><strong>Localização:</strong> {{ $animal->localizacao }}</p>
                <p class="mt-3">{{ $animal->descricao }}</p>

                <div class="mt-4 d-flex gap-2">
                    <form action="{{ route('wishlist.toggle') }}" method="POST">
                        @csrf
                        <input type="hidden" name="animal_id" value="{{ $animal->id }}">
                        <button class="btn btn-outline-danger">❤️ Adicionar à Wishlist</button>
                    </form>
                    <a href="{{ route('animais.index') }}" class="btn btn-secondary">⬅ Voltar</a>
                </div>
            </div>
        </div>

        <!-- Formulário de Adoção -->
        <div class="row mt-5">
            <div class="col-md-8 offset-md-2">
                <h3 class="mb-4 text-center">📄 Candidatura para Adotar o {{ $animal->nome }}</h3>

                <form action="{{ route('adocao.enviar') }}" method="POST">
                    @csrf
                    <input type="hidden" name="animal_id" value="{{ $animal->id }}">

                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome Animal</label>
                        <input type="text" class="form-control" value="{{ $animal->nome }}" disabled>
                    </div>

                    <div class="mb-3">
                        <label for="nome">O seu nome</label>
                        <input type="text" class="form-control" name="nome" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="telefone" class="form-label">Telefone</label>
                        <input type="text" name="telefone" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="mensagem" class="form-label">Porque quer adotar este animal?</label>
                        <textarea name="mensagem" class="form-control" rows="4" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-success w-100" style="background-color: #FE5101; border: none;">📬 Enviar Candidatura</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
