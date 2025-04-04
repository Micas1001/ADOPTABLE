@extends('layouts.app')

@section('title', 'Doar - Adoptable')

@section('content')
    <!-- Seção de Doação -->
    <section class="py-5 text-center" style="background-color: #FE5101; color: white;">
        <div class="container">
            <h1 class="display-4 fw-bold">Ajude-nos a salvar vidas</h1>
            <p class="lead">Sua contribuição ajuda a cuidar e a encontrar lares para muitos animais em necessidade.</p>
        </div>
    </section>

    <section class="py-5">
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
            Envia-nos o comprovativo para <strong>contacto@adoptable.pt</strong> se desejares recibo ou para sabermos quem agradecer. Obrigado por estares connosco! 💛
        </p>
    </section>
@endsection
