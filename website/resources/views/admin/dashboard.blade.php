@extends('layouts.app')

@section('title', 'Painel de Administração')

@section('content')
    <!-- Hero Admin -->
    <section class="py-5 text-white" style="background: linear-gradient(to right, #FE5101, #ff7a3d);">
        <div class="container text-center">
            <h1 class="display-4 fw-bold">Painel de Administração</h1>
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
            </div>
        </div>
    </section>
@endsection
