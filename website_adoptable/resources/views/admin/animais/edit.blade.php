@extends('layouts.app')

@section('title', 'Editar Animal')

@section('content')
<section class="py-5 text-center" style="background-color: #FE5101; color: white;">
    <div class="container">
        <h1 class="display-5 fw-bold">Editar Animal</h1>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <form action="{{ route('admin.animais.update', $animal->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="nome" class="form-label">Nome</label>
                                <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome', $animal->nome) }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="tipo" class="form-label">Tipo</label>
                                <select class="form-select" id="tipo" name="tipo" required>
                                    <option value="">Escolha...</option>
                                    <option value="cão" {{ old('tipo', $animal->tipo) == 'cão' ? 'selected' : '' }}>Cão</option>
                                    <option value="gato" {{ old('tipo', $animal->tipo) == 'gato' ? 'selected' : '' }}>Gato</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="raca" class="form-label">Raça</label>
                                <input type="text" class="form-control" id="raca" name="raca" value="{{ old('raca', $animal->raca) }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="sexo" class="form-label">Sexo</label>
                                <select class="form-select" id="sexo" name="sexo" required>
                                    <option value="">Escolha...</option>
                                    <option value="macho" {{ old('sexo', $animal->sexo) == 'macho' ? 'selected' : '' }}>Macho</option>
                                    <option value="fêmea" {{ old('sexo', $animal->sexo) == 'fêmea' ? 'selected' : '' }}>Fêmea</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="idade" class="form-label">Idade</label>
                                <select class="form-select" id="idade" name="idade" required>
                                    <option value="">Escolha...</option>
                                    <option value="jovem" {{ old('idade', $animal->idade) == 'jovem' ? 'selected' : '' }}>Jovem</option>
                                    <option value="adulto" {{ old('idade', $animal->idade) == 'adulto' ? 'selected' : '' }}>Adulto</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="localizacao" class="form-label">Localização</label>
                                <input type="text" class="form-control" id="localizaçao" name="nome" value="{{ old('localizacao', $animal->localizacao) }}" required>

                            </div>

                            <div class="mb-3">
                                <label for="imagem" class="form-label">Imagem Atual</label><br>
                                @if($animal->imagem)
                                    <img src="{{ asset('storage/' . $animal->imagem) }}" alt="Imagem" class="img-fluid mb-2" style="max-height: 200px;">
                                @endif
                                <input type="file" class="form-control" id="imagem" name="imagem">
                            </div>

                            <button type="submit" class="btn btn-success">Atualizar</button>
                            <a href="{{ route('admin.animais.index') }}" class="btn btn-secondary">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
