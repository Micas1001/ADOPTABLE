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
                    <img src="{{ asset('storage/' . $animal->imagem) }}" class="img-fluid rounded shadow-lg mb-4" alt="{{ $animal->nome }}" style="max-height: 400px; object-fit: cover;">
                @else
                    <img src="https://via.placeholder.com/500x350" class="img-fluid rounded shadow-lg mb-4" alt="Sem imagem" style="max-height: 400px; object-fit: cover;">
                @endif
            </div>

            <!-- Informações -->
            <div class="col-md-6 mt-4 mt-md-0">
                <h2 class="fw-bold mb-4">{{ $animal->nome }}</h2>
                <div class="mb-3">
                    <p><strong>Idade:</strong> {{ $animal->idade }}</p>
                    <p><strong>Sexo:</strong> {{ $animal->sexo }}</p>
                    <p><strong>Raça:</strong> {{ $animal->raca }}</p>
                    <p><strong>Localização:</strong> {{ $animal->localizacao }}</p>
                    @if ($animal->user)
                        <p><strong>Anunciado por:</strong> {{ $animal->user->name }}</p>
                    @endif
                </div>

                <p class="mt-3 mb-4">{{ $animal->descricao }}</p>

                <div class="mt-4 d-flex gap-3">
                    <form action="{{ route('wishlist.toggle') }}" method="POST" class="d-inline">
                        @csrf
                        <input type="hidden" name="animal_id" value="{{ $animal->id }}">
                        @auth
                            @if(auth()->user()->wishlist->contains($animal->id)) <!-- Verifica se o animal está na wishlist -->
                                <button type="submit" class="btn btn-orange rounded-pill px-4" title="Remover dos favoritos">
                                    <i class="bi bi-heart-fill" style="font-size: 1.25rem;"></i> Remover da Wishlist
                                </button>
                            @else
                                <button type="submit" class="btn btn-orange rounded-pill px-4" title="Adicionar aos favoritos">
                                    <i class="bi bi-heart" style="font-size: 1.25rem;"></i> Adicionar à Wishlist
                                </button>
                            @endif
                        @else
                            <button type="button" class="btn btn-orange rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#loginModal" title="Favoritos">
                                <i class="bi bi-heart" style="font-size: 1.25rem;"></i> Adicionar à Wishlist
                            </button>
                        @endauth
                    </form>
                    <a href="{{ route('animais.index') }}" class="btn btn-outline-secondary rounded-pill px-4"><i class="bi bi-arrow-left"></i> Voltar</a>
                </div>
            </div>
        </div>

        <!-- Formulário de Adoção -->
        <div class="row mt-5">
            <div class="col-md-8 offset-md-2">
                <div class="text-center mb-4">

                    <h3 class="mb-4 text-center"><i class="bi bi-pencil-square fs-4 me-2"></i> Candidatura para Adotar o {{ $animal->nome }}</h3>
                    <p class="text-muted">Preencha o formulário abaixo para manifestar seu interesse na adoção e contar-nos mais sobre sua disponibilidade e plano para o animal.</p>
                </div>
                <form action="{{ route('adocao.enviar') }}" method="POST"  class="shadow-sm p-4 rounded" style="background-color: #fff8f1;">
                    @csrf
                    <input type="hidden" name="animal_id" value="{{ $animal->id }}">

                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome Animal</label>
                        <input type="text" class="form-control" value="{{ $animal->nome }}" disabled>
                    </div>

                    <div class="mb-3">
                        <label for="nome">O seu nome</label>
                        <input type="text" class="form-control" name="nome" placeholder="O seu nome completo" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" name="email" placeholder="O seu nome email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="telefone" class="form-label">Telefone</label>
                        <input type="text" name="telefone" placeholder="O seu nome telefone" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="mensagem" class="form-label">Porque quer adotar este animal?</label>
                        <textarea name="mensagem" placeholder="Informe o porque deseja adotar esse bichinho, algumas informações sobre onde vai abrigá-lo e sua disponibilidade de espaço e tempo para dar a atenção e a qualidade de vida que ele precisa. Informe também um telefone para entrarmos em contato."
                         class="form-control" rows="4" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-success w-100 rounded-pill" style="background-color: #FE5101; border: none;"> Enviar Candidatura</button>
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

                                <button type="submit" class="btn btn-orange">Enviar Comentário</button>
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
                <!-- Ícone de Alerta e Título -->
                <i class="bi bi-exclamation-triangle-fill text-warning fs-2 me-3"></i>
                <h5 class="modal-title " id="loginModalLabel">Login necessário</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body">
                <p>É necessário iniciar sessão para adicionar um animal à sua wishlist. Por favor, faça login para continuar.</p>
            </div>
            <div class="modal-footer">
                <!-- Botões de Ação -->
                <a href="{{ route('login') }}" class="btn btn-orange rounded-pill px-4">Iniciar Sessão</a>
                <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>


@endsection
