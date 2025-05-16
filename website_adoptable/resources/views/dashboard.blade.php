@extends('layouts.app')

@section('title', 'Área Pessoal')

@section('content')
<section class="py-5 text-white">
  <div class="container">
    <h2 class=" display-5 fw-bold section-title text-center text-dark mb-3">
      <i class="bi bi-house-door" style="color: #FE5101;"></i>
      Área Pessoal
    </h2>
    <p class="text-center text-muted mb-5">
      Bem-vindo à sua área pessoal. Aqui você pode gerir o seu perfil, histórico de adoções e muito mais.
    </p>

    <div class="row g-4 justify-content-center">
      {{-- Card Perfil --}}
      <div class="col-md-4">
        <div class="card h-100 d-flex flex-column shadow-sm border-0 rounded-lg" style="min-height: 300px;">
          <div class="card-header" style="background-color: #FE5101; color: white;">
            <i class="bi bi-person-circle me-2"></i> Perfil
          </div>
          <div class="card-body text-center" style="background-color: #fff;">
            <h5 class="fw-bold text-dark">{{ Auth::user()->name }}</h5>
            <p class="text-muted mb-1">Email: {{ Auth::user()->email }}</p>
            <a href="{{ route('profile.edit') }}"
               class="btn btn-orange btn-lg mt-auto align-self-center w-75 mb-3">
              <i class="bi bi-pencil me-1"></i> Editar Perfil
            </a>
          </div>
        </div>
      </div>

      {{-- Card Partilhar Animal --}}
      <div class="col-md-4">
        <div class="card h-100 d-flex flex-column shadow-sm border-0 rounded-lg" style="min-height: 300px;">
          <div class="card-header" style="background-color: #FE5101; color: white;">
            <i class="bi bi-heart me-2"></i> Partilhar Animal
          </div>
          <div class="card-body text-center" style="background-color: #fff;">
            <p class="flex-grow-1 text-muted">
              Se encontrou ou está a cuidar de um animal, pode registá-lo para que alguém o adote.
            </p>
            <a href="{{ route('animais.user.create') }}"
               class="btn btn-orange btn-lg w-75 mb-3 align-self-center">
              <i class="bi bi-plus-circle me-1"></i> Registar Novo Animal
            </a>
          </div>
        </div>
      </div>

</section>

<section class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-4">Animais Publicados por Si</h2>

        @if(session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        <div class="row">
            @forelse($animais as $animal)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100 shadow-sm border-0">
                        @if($animal->imagem)
                            <img src="{{ asset('storage/' . $animal->imagem) }}" class="card-img-top" alt="{{ $animal->nome }}" style="object-fit: cover; height: 220px;">
                        @else
                            <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Sem imagem">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title text-primary fw-bold">{{ $animal->nome }}</h5>
                            <ul class="list-unstyled small mb-3">
                                <li><strong>Idade:</strong> {{ $animal->idade }}</li>
                                <li><strong>Sexo:</strong> {{ $animal->sexo }}</li>
                                <li><strong>Raça:</strong> {{ $animal->raca }}</li>
                                <li><strong>Localização:</strong> {{ $animal->localizacao }}</li>
                            </ul>
                            <p class="text-muted small mb-2">{{ $animal->descricao }}</p>
                            <form action="{{ route('animais.destroy', $animal->id) }}" method="POST" onsubmit="return confirm('Tem a certeza que deseja eliminar este animal?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm w-100">🗑️ Eliminar Animal</button>
                            </form>
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
