<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f3f3f3;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
            width: 350px;
            text-align: center;
        }
        .login-container h3 {
            margin-bottom: 20px;
        }
        .login-container input {
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <header class="bg-dark text-white text-center p-3 w-100">
        <h2>ADOPTABLE</h2>
    </header>

    <div class="login-container">
        <h3>Login</h3>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <input type="email" class="form-control" name="email" placeholder="Email" required>
            <input type="password" class="form-control" name="password" placeholder="Password" required>
            <button type="submit" class="btn btn-primary w-100">Entrar</button>
        </form>
        <p class="mt-3">Não tens conta? <a href="{{ route('register') }}">Criar conta</a></p>
    </div>

    <footer class="bg-dark text-white text-center p-3 w-100 mt-5">
        <p>&copy; 2025 ADOPTABLE - Todos os direitos reservados.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
