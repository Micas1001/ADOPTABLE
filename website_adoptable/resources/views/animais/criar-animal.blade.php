@extends('layouts.app')

@section('title', 'Criar Animal')

@section('content')
<!-- Header Section -->
<section class="py-5 text-center text-dark">
    <div class="container">
        <h1 class="display-5 fw-bold">Registar Novo Animal</h1>
        <p class="lead">Complete as informações abaixo para adicionar um animal à nossa plataforma de adoção.</p>
    </div>
</section>

<!-- Form Section -->
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <div class="card shadow-lg border-0 rounded-3" style="background-color: #fff8f1;">
                    <div class="card-body p-4">
                        <form action="{{ route('animais.user.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- Form Fields -->
                            <div class="mb-4">
                                <label for="nome" class="form-label">Nome do Animal</label>
                                <input type="text" name="nome" class="form-control form-control-lg" placeholder="Digite o nome" required>
                            </div>

                            <div class="mb-4">
                                <label for="tipo" class="form-label">Tipo</label>
                                <select name="tipo" class="form-select form-select-lg" required>
                                    <option value="">Selecione...</option>
                                    <option value="cão">Cão</option>
                                    <option value="gato">Gato</option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label for="raca" class="form-label">Raça</label>
                                <input type="text" name="raca" class="form-control form-control-lg" placeholder="Digite a raça" required>
                            </div>

                            <div class="mb-4">
                                <label for="sexo" class="form-label">Sexo</label>
                                <select name="sexo" class="form-select form-select-lg" required>
                                    <option value="">Selecione...</option>
                                    <option value="macho">Macho</option>
                                    <option value="fêmea">Fêmea</option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label for="idade" class="form-label">Idade</label>
                                <select name="idade" class="form-select form-select-lg" required>
                                    <option value="">Selecione...</option>
                                    <option value="jovem">Jovem</option>
                                    <option value="adulto">Adulto</option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label for="localizacao" class="form-label">Localização</label>
                                <input type="text" name="localizacao" class="form-control form-control-lg" placeholder="Digite a localização" required>
                            </div>

                            <div class="mb-4">
                                <label for="imagem" class="form-label">Imagem</label>
                                <input type="file" name="imagem" class="form-control form-control-lg">
                            </div>

                            <!-- Submit Button -->
                            <div class="d-flex justify-content-between">
                                <button type="submit" class="btn btn-orange btn-lg w-48">
                                    <i class="bi bi-save me-2"></i> Registar Animal
                                </button>
                                <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary btn-lg w-48">
                                    <i class="bi bi-x-circle me-2"></i> Cancelar
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
