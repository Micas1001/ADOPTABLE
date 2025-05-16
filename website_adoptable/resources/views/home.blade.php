@extends('layouts.app')

@section('title', 'Adoptable - Encontre o seu novo melhor amigo')

@section('content')
<!-- HERO SECTION -->
<div class="container-fluid hero">
    <div class="row h-100">
        <div class="col-md-6 orange-section full-height">
            <div>
                <h1 class="display-5 fw-bold">Descubra o Amor Sem Fim com o Seu Novo Companheiro Peludo!</h1>
                <p>Adote agora e encontre um amigo para toda a vida. Juntos, criarão memórias inesquecíveis.</p>
            </div>
        </div>
        <div class="col-md-6 p-0 full-height">
                <img src="{{ asset('images/mulher.avif') }}" alt="Mulher com cachorro" class="img-fluid w-100 h-100 object-fit-cover">
        </div>
    </div>

    <!-- BARRA DE PESQUISA -->
    <div class="row">
        <div class="col-md-10 search-box bg-white p-3 rounded shadow-sm mb-4">
            <form class="row g-3" method="GET" action="{{ route('animais.index') }}">
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
                <div class="col-md-2 d-flex align-items-end">
                    <button type="submit" class="btn button w-100"><i class="bi bi-search"></i> Procurar</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- SECÇÃO DE DESTAQUE -->
<section class="py-5">
    <div class="container">
        <div class="row align-items-center">
            <!-- CARROSSEL -->
            <div class="col-lg-6">
                <div id="carouselDogs" class="carousel slide shadow rounded" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('images/cao.webp') }}" class="d-block w-100 rounded" alt="Cachorro sendo acariciado">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('images/gato.webp') }}" class="d-block w-100 rounded" alt="Gato fofo">
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
                <p>Os animais precisam de uma família cheia de carinho. Adote um amigo e transforme a sua vida com amor incondicional.</p>
            </div>
        </div>
    </div>

       <div class="container my-5">
        <div class="row align-items-center text-center text-md-start">
            <div class="col-md-6">
                <h2>Na Adoptable, damos uma nova chance aos animais!</h2>
                <p>
                    Somos apaixonados por resgatar e encontrar lares amorosos para cães e gatos que precisam. 
                    Com o apoio da nossa comunidade, já ajudamos milhares de animais a encontrar um lar seguro e cheio de carinho.
                </p>
                <a href="{{ route('login') }}" class="btn button mt-2">Junte-se a nós</a>
            </div>
            <div class="col-md-6">
                <div class="row text-center gy-3">
                    <div class="col-6 col-sm-3">
                        <h3>50+</h3>
                        <p class="mb-0">Animais disponíveis</p>
                    </div>
                    <div class="col-6 col-sm-3">
                        <h3>20+</h3>
                        <p class="mb-0">Adoções realizadas</p>
                    </div>
                    <div class="col-6 col-sm-3">
                        <h3>3+</h3>
                        <p class="mb-0">ONGs parceiras</p>
                    </div>
                    <div class="col-6 col-sm-3">
                        <h3>50+</h3>
                        <p class="mb-0">Utilizadores registados</p>
                    </div>
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
        <div class="row my-4 row-cols-1 row-cols-md-2 row-cols-lg-4 g-3">
            @foreach($animais->take(4) as $animal)
                <div class="col">
                    <div class="card shadow-sm rounded p-0 position-relative">
                        @if($animal->imagem)
                            <img src="{{ asset('storage/' . $animal->imagem) }}" class="card-img-top" alt="{{ $animal->nome }}" style="height: 180px; object-fit: cover; margin: 0;">
                        @else
                            <img src="https://via.placeholder.com/200x150" class="card-img-top" alt="Sem imagem" style="height: 180px; object-fit: cover; margin: 0;">
                        @endif

                        <!-- Ícone de Favorito -->
                        <form action="{{ route('wishlist.toggle') }}" method="POST" class="position-absolute top-0 end-0 p-2">
                            @csrf
                            <input type="hidden" name="animal_id" value="{{ $animal->id }}">

                            @auth
                                @if(auth()->user()->wishlist->contains($animal->id)) <!-- Verifica se o animal está na wishlist -->
                                    <button type="submit" class="btn btn-link text-danger" title="Remover dos favoritos">
                                        <i class="bi bi-heart-fill" style="font-size: 1.25rem;"></i> <!-- Coração preenchido -->
                                    </button>
                                @else
                                    <button type="submit" class="btn btn-link text-danger" title="Adicionar aos favoritos">
                                        <i class="bi bi-heart" style="font-size: 1.25rem;"></i> <!-- Coração vazio -->
                                    </button>
                                @endif
                            @else
                                <button type="button" class="btn btn-link text-danger" data-bs-toggle="modal" data-bs-target="#loginModal" title="Favoritos">
                                    <i class="bi bi-heart" style="font-size: 1.25rem;"></i> <!-- Coração vazio -->
                                </button>
                            @endauth
                        </form>

                        <!-- Corpo do Card -->
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $animal->nome }}</h5>
                            <p class="mb-1"><strong>Idade:</strong> {{ $animal->idade }}</p>
                            <p class="mb-1"><strong>Sexo:</strong> {{ $animal->sexo }}</p>
                            <p class="mb-1"><strong>Raça:</strong> {{ $animal->raca }}</p>
                            <p class="mb-1"><strong>Localização:</strong> {{ $animal->localizacao }}</p>
                            <div class="mt-auto">
                                <a href="{{ route('animais.show', $animal->id) }}" class="btn btn-orange w-100">ADOTAR</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('animais.index') }}" class="btn btn-orange">Ver todos os animais</a>
        </div>
    </div>
</section>

<!-- Modal de Aviso -->
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

