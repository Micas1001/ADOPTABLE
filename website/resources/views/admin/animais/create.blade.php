@extends('layouts.app')

@section('title', 'Adicionar Animal')

@section('content')
<section class="py-5 text-center" style="background-color: #FE5101; color: white;">
    <div class="container">
        <h1 class="display-5 fw-bold">Adicionar Novo Animal</h1>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <form action="{{ route('admin.animais.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="nome" class="form-label">Nome</label>
                                <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="tipo" class="form-label">Tipo</label>
                                <select class="form-select" id="tipo" name="tipo" required>
                                    <option value="">Escolha...</option>
                                    <option value="cão" {{ old('tipo') == 'cão' ? 'selected' : '' }}>Cão</option>
                                    <option value="gato" {{ old('tipo') == 'gato' ? 'selected' : '' }}>Gato</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="raca" class="form-label">Raça</label>
                                <input type="text" class="form-control" id="raca" name="raca" value="{{ old('raca') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="sexo" class="form-label">Sexo</label>
                                <select class="form-select" id="sexo" name="sexo" required>
                                    <option value="">Escolha...</option>
                                    <option value="macho" {{ old('sexo') == 'macho' ? 'selected' : '' }}>Macho</option>
                                    <option value="fêmea" {{ old('sexo') == 'fêmea' ? 'selected' : '' }}>Fêmea</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="idade" class="form-label">Idade</label>
                                <select class="form-select" id="idade" name="idade" required>
                                    <option value="">Escolha...</option>
                                    <option value="jovem" {{ old('idade') == 'jovem' ? 'selected' : '' }}>Jovem</option>
                                    <option value="adulto" {{ old('idade') == 'adulto' ? 'selected' : '' }}>Adulto</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="localizacao" class="form-label">Localização</label>
                                <select class="form-select" id="localizacao" name="localizacao" required>
                                    <option value="">Escolha...</option>
                                    <option value="Coimbra" {{ old('localizacao') == 'Coimbra' ? 'selected' : '' }}>Coimbra</option>
                                    <option value="Lisboa" {{ old('localizacao') == 'Lisboa' ? 'selected' : '' }}>Lisboa</option>
                                    <option value="Porto" {{ old('localizacao') == 'Porto' ? 'selected' : '' }}>Porto</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="imagem" class="form-label">Imagem</label>
                                <input type="file" class="form-control" id="imagem" name="imagem" required>
                            </div>

                            <button type="submit" class="btn btn-success">Guardar</button>
                            <a href="{{ route('admin.animais.index') }}" class="btn btn-secondary">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
