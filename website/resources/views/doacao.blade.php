<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Doar - Adoptable</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            height: 50px;
        }
        main {
            max-width: 800px;
            margin: 40px auto;
            background-color: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #FE5101;
            margin-bottom: 20px;
        }
        .mbway, .transferencia {
            background-color: #fff4ec;
            border-left: 5px solid #FE5101;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
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
        <h1 class="text-white text-center flex-grow-1 m-0" style="font-size: 1.8rem;">
            Doar para a Adoptable
        </h1>

        <!-- Espaço à direita para equilibrar -->
        <div style="width: 120px;"></div>
    </header>

    <main>
        <h1>Ajuda-nos a mudar vidas 🧡</h1>
        <p class="lead">
            Com a tua contribuição, conseguimos alimentar, tratar e encontrar um lar para muitos animais que precisam de amor e cuidado. Qualquer valor faz a diferença!
        </p>

        <div class="mbway">
            <h4>💳 MB WAY</h4>
            <p><strong>Número:</strong> <span class="text-dark">912 345 678</span></p>
            <p><strong>Nome:</strong> Adoptable - Associação de Apoio Animal</p>
        </div>

        <div class="transferencia">
            <h4>🏦 Transferência Bancária</h4>
            <p><strong>IBAN:</strong> PT50 0002 0123 1234 5678 9015 6</p>
            <p><strong>BIC/SWIFT:</strong> BCOMPTPL</p>
            <p><strong>Banco:</strong> Banco Exemplo, S.A.</p>
            <p><strong>Titular:</strong> Adoptable - Associação de Apoio Animal</p>
        </div>

        <p class="text-muted fst-italic">
            Envia-nos o comprovativo para <strong>doacoes@adoptable.pt</strong> se desejares recibo ou para sabermos quem agradecer. Obrigado por estares connosco! 💛
        </p>
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} Adoptable. Juntos por um futuro com mais amor animal.</p>
    </footer>

</body>
</html>
