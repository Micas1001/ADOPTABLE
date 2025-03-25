<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Conta - Adoptable</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f9f9f9;
            font-family: 'Segoe UI', sans-serif;
        }
        header {
            background-color: #FE5101;
            padding: 15px 30px;
            display: flex;
            align-items: center;
        }
        header img {
            height: 35px;
        }
        main {
            max-width: 450px;
            margin: 60px auto;
            background-color: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0px 4px 12px rgba(0,0,0,0.1);
        }
        h2 {
            color: #FE5101;
            margin-bottom: 25px;
        }
        .form-control:focus {
            border-color: #FE5101;
            box-shadow: 0 0 0 0.2rem rgba(254, 81, 1, 0.25);
        }
        .btn-custom {
            background-color: #FE5101;
            color: white;
        }
        .btn-custom:hover {
            background-color: #d64500;
        }
        footer {
            background-color: #FE5101;
            color: white;
            text-align: center;
            padding: 20px;
            margin-top: 60px;
        }
    </style>
</head>
<body>

    <header>
        <a href="{{ route('home') }}">
            <img src="{{ asset('images/LOGO1.png') }}" alt="Adoptable Logo">
        </a>
    </header>

    <main>
        <h2 class="text-center">Criar Conta</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input id="password" type="password" class="form-control" name="password" required>
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirmar Password</label>
                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
            </div>

            <button type="submit" class="btn btn-custom w-100">Criar Conta</button>
        </form>

        <p class="text-center mt-3">Já tens conta?
            <a href="{{ route('login') }}" class="text-decoration-none" style="color:#FE5101;">Fazer login</a>
        </p>
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} Adoptable. Todos os direitos reservados.</p>
    </footer>

</body>
</html>
