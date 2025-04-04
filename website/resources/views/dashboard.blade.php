@extends('layouts.app')

@section('title', 'Área Pessoal')

@section('content')
    <!-- Hero Área Pessoal -->
    <section class="py-5 text-white" style="background: linear-gradient(to right, #FE5101, #ff7a3d);">
        <div class="container text-center">
            <h1 class="display-4 fw-bold">Olá, {{ Auth::user()->name }} 👋</h1>
            <p class="lead">Bem-vindo à sua área pessoal. Aqui pode gerir a sua conta, ver favoritos e muito mais!</p>
        </div>
    </section>

    <!-- Secções em cartões modernos -->
    <section class="py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="card-body text-center">
                            <i class="bi bi-person-lines-fill fs-1 text-primary"></i>
                            <h5 class="card-title mt-3">Editar Perfil</h5>
                            <p class="card-text">Atualize as suas informações pessoais e dados de login.</p>
                            <a href="{{ route('profile.edit') }}" class="btn btn-outline-primary">Gerir Perfil</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="card-body text-center">
                            <i class="bi bi-heart-fill fs-1 text-danger"></i>
                            <h5 class="card-title mt-3">Wishlist</h5>
                            <p class="card-text">Consulte os animais que marcou como favoritos.</p>
                            <a href="{{ route('wishlist') }}" class="btn btn-outline-danger">Ver Wishlist</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="card-body text-center">
                            <i class="bi bi-shield-lock-fill fs-1 text-secondary"></i>
                            <h5 class="card-title mt-3">Segurança</h5>
                            <p class="card-text">Altere a sua palavra-passe e proteja a sua conta.</p>
                            <a href="{{ route('profile.edit') }}" class="btn btn-outline-secondary">Configurar Conta</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
