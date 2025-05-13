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
                    <img src="{{ asset('storage/' . $animal->imagem) }}" class="img-fluid rounded shadow w-100" style="max-height: 500px; object-fit: cover; alt="{{ $animal->nome }}>
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
                @if ($animal->user)
                <p><strong>Anunciado por:</strong> {{ $animal->user->name }}</p>
                @endif
                <p class="mt-3">{{ $animal->descricao }}</p>

                <div class="mt-4 d-flex gap-2">
                    @auth
                    <form action="{{ route('wishlist.toggle') }}" method="POST" class="d-inline">
                    @csrf
                    <input type="hidden" name="animal_id" value="{{ $animal->id }}">
                    <button type="submit" class="wishlist-btn" title="Adicionar aos favoritos"> 💖 </button>
                     </form>
                       @else
                       <button class="wishlist-btn border-0 bg-transparent" title="Adicionar aos favoritos">
                        💖
                    </button>

                        @endauth
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

        <!-- Formulário de Avaliação -->
        <div class="row mt-5">
            <div class="col-md-8 offset-md-2">
                <h3 class="mb-4 text-center">💬 Avaliações e Comentários</h3>

                {{-- Formulário de Comentário --}}
                @auth
                    <div class="card mb-4 shadow-sm">
                        <div class="card-body">
                            <form action="{{ route('comentarios.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="animal_id" value="{{ $animal->id }}">

                                <div class="mb-3">
                                    <label for="comentario" class="form-label">Comentário</label>
                                    <textarea id="comentario" name="comentario" rows="3" class="form-control @error('comentario') is-invalid @enderror" required>{{ old('comentario') }}</textarea>
                                    @error('comentario')<div class="invalid-feedback">{{ $comment }}</div>@enderror
                                </div>

                                <div class="mb-3">
                                    <label for="avaliacao" class="form-label">Avaliação</label>
                                    <select id="avaliacao" name="avaliacao" class="form-select @error('avaliacao') is-invalid @enderror">
                                        <option value="">Selecionar...</option>
                                        @for ($i = 1; $i <= 5; $i++)
                                            <option value="{{ $i }}" {{ old('avaliacao') == $i ? 'selected' : '' }}>{{ $i }} ⭐</option>
                                        @endfor
                                    </select>
                                    @error('avaliacao')<div class="invalid-feedback">{{ $comment }}</div>@enderror
                                </div>

                                <button type="submit" class="btn btn-primary">Enviar Comentário</button>
                            </form>
                        </div>
                    </div>
                @else
                    <p class="text-center mb-4">Precisa estar <a href="{{ route('login') }}">logado</a> para comentar.</p>
                @endauth

                {{-- Listagem de Comentários --}}
                @if($animal->comments->isEmpty())
                    <p class="text-muted text-center">Seja o primeiro a comentar!</p>
                @else
                    @foreach($animal->comments as $comment)
                        <div class="card mb-3 shadow-sm">
                            <div class="card-body">
                                <h6 class="card-subtitle mb-1">
                                    {{ $comment->user->name }} <small class="text-muted">— {{ $comment->created_at->format('d/m/Y') }}</small>
                                </h6>
                                @if($comment->avaliacao)
                                    <p class="text-warning mb-1">{{ str_repeat('⭐', $comment->avaliacao) }}</p>
                                @endif
                                <p class="card-text">{{ $comment->comentario }}</p>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>


    </div>
</section>

<!-- Modal de aviso -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-danger" id="loginModalLabel">Login necessário</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
        </div>
        <div class="modal-body">
          É necessário iniciar sessão para adicionar um animal à sua wishlist.
        </div>
        <div class="modal-footer">
          <a href="{{ route('login') }}" class="btn btn-primary">Iniciar Sessão</a>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div>

@endsection
