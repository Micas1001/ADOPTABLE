<!-- resources/views/animais/show.blade.php -->

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $animal->nome }} - Detalhes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <a href="{{ url()->previous() }}" class="btn btn-secondary mt-2">← Voltar atrás</a>
<div class="container py-5">
    <div class="row">
        <!-- Imagem do Animal -->
        <div class="col-md-6">
            @if($animal->imagem)
                <img src="{{ asset('storage/' . $animal->imagem) }}" class="img-fluid rounded shadow" alt="{{ $animal->nome }}">
            @else
                <img src="https://via.placeholder.com/500x350" class="img-fluid rounded shadow" alt="Sem imagem">
            @endif
        </div>

        <!-- Detalhes do Animal -->
        <div class="col-md-6">
            <h2 class="text-primary">{{ $animal->nome }}</h2>
            <p><strong>Raça:</strong> {{ $animal->raca }}</p>
            <p><strong>Sexo:</strong> {{ $animal->sexo }}</p>
            <p><strong>Idade:</strong> {{ $animal->idade }}</p>
            <p><strong>Localização:</strong> {{ $animal->localizacao }}</p>
            <p>{{ $animal->descricao }}</p>
        </div>
    </div>

    <!-- Formulário de Candidatura à Adoção -->
    <hr class="my-5">
    <h4>Candidatar-se à Adoção</h4>
    <form action="#" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Nome</label>
                <input type="text" class="form-control" name="nome" required>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email" required>
            </div>
            <div class="col-md-12 mb-3">
                <label class="form-label">Mensagem</label>
                <textarea class="form-control" name="mensagem" rows="4" placeholder="Fale um pouco sobre si e porque quer adotar..."></textarea>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-success">Enviar Candidatura</button>
            </div>
        </div>
    </form>
</div>
</body>
</html>
