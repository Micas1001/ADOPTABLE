@extends('layouts.app')

@section('title', 'Adoptable - Encontre o seu novo melhor amigo')

@section('content')
<!-- HERO SECTION -->
<section class="py-5 text-white" style="background-color: #FE5101;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 text-center text-lg-start">
                <h1 class="display-5 fw-bold">Encontre um amigo, mude uma história!</h1>
                <p class="lead">Adote agora e encontre um amigo para toda a vida. Juntos, criarão memórias inesquecíveis.</p>
            </div>
            <div class="col-lg-6 text-center">
                <img src="{{ asset('images/mulher.jpg') }}" alt="Mulher com cachorro" class="img-fluid rounded shadow">
            </div>
        </div>
    </div>
</section>

<!-- BARRA DE PESQUISA -->
<section class="container my-4">
    <div class="bg-white shadow rounded p-4">
        <form class="row g-2" method="GET" action="{{ route('animais.index') }}">
            <div class="col-md-2">
                <select class="form-select" name="tipo">
                    <option value="">Tipo</option>
                    <option value="cão" {{ request('tipo') == 'cão' ? 'selected' : '' }}>Cão</option>
                    <option value="gato" {{ request('tipo') == 'gato' ? 'selected' : '' }}>Gato</option>
                </select>
            </div>
            <div class="col-md-2">
                <input type="text" class="form-control" name="raca" placeholder="Raça" value="{{ request('raca') }}">
            </div>
            <div class="col-md-2">
                <select class="form-select" name="sexo">
                    <option value="">Sexo</option>
                    <option value="macho" {{ request('sexo') == 'macho' ? 'selected' : '' }}>Macho</option>
                    <option value="fêmea" {{ request('sexo') == 'fêmea' ? 'selected' : '' }}>Fêmea</option>
                </select>
            </div>
            <div class="col-md-2">
                <select class="form-select" name="idade">
                    <option value="">Idade</option>
                    <option value="jovem" {{ request('idade') == 'jovem' ? 'selected' : '' }}>Jovem</option>
                    <option value="adulto" {{ request('idade') == 'adulto' ? 'selected' : '' }}>Adulto</option>
                </select>
            </div>
            <div class="col-md-2">
                <input type="text" class="form-control" name="localizacao" placeholder="Localização" value="{{ request('localizacao') }}">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-danger w-100">Procurar</button>
            </div>
        </form>
    </div>
</section>

<!-- SECÇÃO DE DESTAQUE -->
<section class="py-5">
    <div class="container">
        <div class="row align-items-center">
            <!-- CARROSSEL -->
            <div class="col-lg-6">
                <div id="carouselDogs" class="carousel slide shadow rounded" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('images/cao.jpg') }}" class="d-block w-100 rounded" alt="Cachorro sendo acariciado">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('images/gato.jpg') }}" class="d-block w-100 rounded" alt="Gato fofo">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselDogs" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselDogs" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </button>
                </div>
            </div>

            <!-- TEXTO -->
            <div class="col-lg-6 mt-4 mt-lg-0 text-center text-lg-start">
                <h2 class="fw-bold">Descubra qual o <span class="text-warning">amigo peludo</span> que melhor combina consigo!</h2>
                <p class="lead">Os animais precisam de uma família cheia de carinho. Adote um amigo e transforme a sua vida com amor incondicional.</p>
            </div>
        </div>
    </div>
</section>

<!-- ÚLTIMOS ANIMAIS -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">🐾 Últimos Animais para Adoção</h2>
            <p class="text-muted">Estes amigos esperam ansiosamente por um lar cheio de amor.</p>
        </div>
        <div class="row">
            @foreach($animais->take(6) as $animal)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm border-0" style="transition: transform 0.2s;">
                        @if($animal->imagem)
                        <img src="{{ asset('storage/' . $animal->imagem) }}" class="card-img-top object-fit-cover" alt="{{ $animal->nome }}" style="height: 250px; object-fit: cover;">
                        @else
                            <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Sem imagem">
                        @endif
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $animal->nome }}</h5>
                            <p class="mb-1"><strong>Idade:</strong> {{ $animal->idade }}</p>
                            <p class="mb-1"><strong>Sexo:</strong> {{ $animal->sexo }}</p>
                            <p class="mb-1"><strong>Raça:</strong> {{ $animal->raca }}</p>
                            <p class="mb-1"><strong>Localização:</strong> {{ $animal->localizacao }}</p>
                            <p class="mb-2 text-muted">{{ Str::limit($animal->descricao, 80) }}</p>
                            <div class="mt-auto d-flex justify-content-between align-items-center">
                                <a href="{{ route('animais.show', $animal->id) }}" class="btn btn-sm btn-primary">ADOTAR</a>
                                @auth
                                <form action="{{ route('wishlist.toggle') }}" method="POST" class="d-inline">
                                    @csrf
                                    <input type="hidden" name="animal_id" value="{{ $animal->id }}">
                                    <button type="submit" class="wishlist-btn" title="Adicionar aos favoritos">💖</button>
                                </form>
                            @else
                            <button class="wishlist-btn border-0 bg-transparent" title="Adicionar aos favoritos">
                                💖
                            </button>

                            @endauth
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('animais.index') }}" class="btn btn-outline-primary">Ver todos os animais</a>
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
