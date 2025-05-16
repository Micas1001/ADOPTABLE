@extends('layouts.app')

@section('title', 'Animais para Adoção')

@section('content')
<section class="py-5">
    <div class="container">
        <h1 class="text-center fw-bold display-5 mb-4">🐾 Animais Disponíveis para Adoção</h1>

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
                        <input type="text" class="form-control" name="localizacao" placeholder="Localização" value="{{ request('localizacao') }}">
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn button w-100"><i class="bi bi-search"></i> Procurar</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Lista de Animais -->
        <div class="row my-4 row-cols-1 row-cols-md-2 row-cols-lg-4 g-3 ">
            @forelse($animais as $animal)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="card shadow-sm rounded p-0 position-relative  d-flex flex-column" style="min-height: 400px;">
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


                        <div class="card-body  d-flex flex-column" style="flex-grow: 1;">
                            <h5 class="card-title">{{ $animal->nome }}</h5>
                            <p class="text-muted mb-1">{{ $animal->raca }} • {{ $animal->idade }} • {{ $animal->sexo }}</p>
                            <p class="text-muted mb-2"><strong>Localização:</strong> {{ $animal->localizacao }}</p>
                            @if ($animal->user)
                                <p class="text-muted"><strong>Anunciado por:</strong> {{ $animal->user->name }}</p>
                            @endif
                            <div class="mt-auto"> 
                                <a href="{{ route('animais.show', $animal->id) }}" class="btn btn-orange w-100">Adotar</a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center">Nenhum animal encontrado neste momento.</p>
            @endforelse
        </div>
        
        <!-- Links de Paginação -->
        <nav aria-label="Página de navegação">
            <ul class="pagination pagination-sm ">
                <!-- Botão para página anterior -->
                <li class="page-item {{ $animais->onFirstPage() ? 'disabled' : '' }}">
                <a class="page-link" href="{{ $animais->previousPageUrl() }}" tabindex="-1">‹</a>
                </li>

                <!-- Links para as páginas numeradas -->
                @foreach ($animais->getUrlRange(1, $animais->lastPage()) as $page => $url)
                <li class="page-item {{ $page == $animais->currentPage() ? 'active' : '' }}">
                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                </li>
                @endforeach

                <!-- Botão para página seguinte -->
                <li class="page-item {{ $animais->hasMorePages() ? '' : 'disabled' }}">
                <a class="page-link" href="{{ $animais->nextPageUrl() }}">›</a>
                </li>
            </ul>
    </nav>



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
