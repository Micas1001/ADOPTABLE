@extends('layouts.app')

@section('title', 'Criar Animal')

@section('content')
<section class="py-5 text-center" style="background-color: #FE5101; color: white;">
    <div class="container">
        <h1 class="display-5 fw-bold">Registar Novo Animal</h1>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <div class="card shadow-sm">
                    <div class="card-body">
                        <form action="{{ route('animais.user.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="nome" class="form-label">Nome</label>
                                <input type="text" name="nome" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="tipo" class="form-label">Tipo</label>
                                <select name="tipo" class="form-select" required>
                                    <option value="">Escolha...</option>
                                    <option value="cão">Cão</option>
                                    <option value="gato">Gato</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="raca" class="form-label">Raça</label>
                                <input type="text" name="raca" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="sexo" class="form-label">Sexo</label>
                                <select name="sexo" class="form-select" required>
                                    <option value="">Escolha...</option>
                                    <option value="macho">Macho</option>
                                    <option value="fêmea">Fêmea</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="idade" class="form-label">Idade</label>
                                <select name="idade" class="form-select" required>
                                    <option value="">Escolha...</option>
                                    <option value="jovem">Jovem</option>
                                    <option value="adulto">Adulto</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="localizacao" class="form-label">Localização</label>
                                <select name="localizacao" class="form-select" required>
                                    <option value="">Escolha...</option>
                                    <option value="Coimbra">Coimbra</option>
                                    <option value="Lisboa">Lisboa</option>
                                    <option value="Porto">Porto</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="imagem" class="form-label">Imagem</label>
                                <input type="file" name="imagem" class="form-control">
                            </div>

                            <button type="submit" class="btn btn-success">Registar Animal</button>
                            <a href="{{ route('animais.index') }}" class="btn btn-secondary">Cancelar</a>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection
