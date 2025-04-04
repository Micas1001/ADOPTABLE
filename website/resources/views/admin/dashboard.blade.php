@extends('layouts.app')

@section('title', 'Painel de Administração')

@section('content')
    <!-- Hero Admin -->
    <section class="py-5 text-white" style="background: linear-gradient(to right, #FE5101, #ff7a3d);">
        <div class="container text-center">
            <h1 class="display-4 fw-bold">Painel de Administração</h1>
            <p class="lead">Gestão completa do sistema Adoptable 🛠️</p>
        </div>
    </section>

    <!-- Painel de Cards -->
    <section class="py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="card-body text-center">
                            <i class="bi bi-paw fs-1 text-primary"></i>
                            <h5 class="mt-3">Animais</h5>
                            <p class="text-muted">Adicionar, editar ou remover animais disponíveis para adoção.</p>
                            <a href="{{ route('admin.animais.index') }}" class="btn btn-outline-primary">Gerir Animais</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="card-body text-center">
                            <i class="bi bi-people-fill fs-1 text-secondary"></i>
                            <h5 class="mt-3">Utilizadores</h5>
                            <p class="text-muted">Ver utilizadores registados e gerir permissões.</p>
                            <a href="#" class="btn btn-outline-secondary">Gerir Utilizadores</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="card-body text-center">
                            <i class="bi bi-envelope-fill fs-1 text-danger"></i>
                            <h5 class="mt-3">Mensagens</h5>
                            <p class="text-muted">Ler mensagens enviadas através do formulário de adoção.</p>
                            <a href="{{ route('admin.mensagens.index') }}" class="btn btn-outline-danger">Ver Mensagens</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
