@extends('layouts.app')

@section('title', 'Sobre Nós - Adoptable')

@section('content')
    <!-- Hero Sobre Nós -->
    <section class="py-5 text-white" style="background-color: #FE5101;">
        <div class="container text-center">
            <h1 class="display-4 fw-bold">Sobre a Adoptable</h1>
            <p class="lead">Dedicamo-nos a encontrar lares amorosos para os nossos amigos de quatro patas. 🐶🐱</p>
        </div>
    </section>

    <!-- Missão e Visão -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 mb-4 mb-md-0">
                    <img src="{{ asset('images/sobrenos1.jpg') }}" alt="Missão" class="img-fluid w-60 rounded shadow-lg">
                </div>
                <div class="col-md-6">
                    <h2 class="fw-bold">A Nossa Missão</h2>
                    <p class="text-muted">A Adoptable existe para garantir que cada animal abandonado tenha uma nova oportunidade. Ajudamos a criar conexões entre pessoas e animais que mudam vidas para sempre. Trabalhamos com dedicação para proporcionar cuidados, amor e um lar seguro.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- História -->
    <section class="py-5">
        <div class="container">
            <div class="row align-items-center flex-md-row-reverse">
                <div class="col-md-6 mb-4 mb-md-0">
                    <img src="{{ asset('images/sobrenos2.jpg') }}" alt="História" class="img-fluid rounded shadow">
                </div>
                <div class="col-md-6">
                    <h2 class="fw-bold">Como Tudo Começou</h2>
                    <p class="text-muted">Fundada por amantes de animais, a Adoptable começou como uma pequena iniciativa de resgate. Com o tempo, tornou-se uma plataforma completa, reunindo voluntários, veterinários e famílias em torno de um único objetivo: salvar e amar.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Valores -->
    <section class="py-5 bg-light text-center">
        <div class="container">
            <h2 class="fw-bold mb-5">Os nossos valores</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="p-4 shadow-sm rounded bg-white">
                        <i class="bi bi-heart-fill fs-2 text-danger"></i>
                        <h5 class="mt-3">Amor</h5>
                        <p class="text-muted">Amamos cada animal que acolhemos, e queremos que eles sintam esse amor nos seus novos lares.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4 shadow-sm rounded bg-white">
                        <i class="bi bi-shield-check fs-2 text-primary"></i>
                        <h5 class="mt-3">Responsabilidade</h5>
                        <p class="text-muted">Adoções conscientes e seguras para garantir o bem-estar animal e humano.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4 shadow-sm rounded bg-white">
                        <i class="bi bi-people-fill fs-2 text-warning"></i>
                        <h5 class="mt-3">Comunidade</h5>
                        <p class="text-muted">Juntos somos mais fortes. Unimos pessoas em torno de uma causa nobre e solidária.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
