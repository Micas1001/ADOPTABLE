<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Adoptable')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <style>
        html {
            scroll-behavior: smooth;
        }
        .footer-link:hover {
            text-decoration: underline;
        }
    </style>
</head>

@if(session('success'))
<script>
    document.addEventListener('DOMContentLoaded', function () {
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'success',
            title: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true
        });
    });
</script>
@endif

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-white shadow-sm">
        <div class="container-fluid">

            <button class="btn me-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu" aria-controls="mobileMenu">
                <i class="bi bi-list fs-2"></i>
            </button>

            <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
                <img src="{{ asset('images/LOGO1.png') }}" alt="Logo" width="124" height="36" class="d-inline-block align-text-top">
            </a>



            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item px-3">
                        <a class="nav-link" href="{{ route('animais.index') }}">Animais</a>
                    </li>
                    <li class="nav-item px-3">
                        <a class="nav-link" href="{{ route('doacao') }}">Doar</a>
                    </li>
                    <li class="nav-item px-3">
                        <a class="nav-link" href="{{ route('sobrenos') }}">Sobre Nós</a>
                    </li>
                    <li class="nav-item px-3">
                        <a class="nav-link" href="{{ route('contacto') }}">Contacto</a>
                    </li>
                    @auth
    @if(auth()->user()->is_admin)
        <a href="{{ route('admin.animais.index') }}" class="btn btn-warning ms-2">ADMIN</a>
    @endif
@endauth

                </ul>

                <div class="d-flex ms-auto align-items-center">
                    @auth
                        <a href="{{ route('wishlist') }}" class="btn btn-outline-danger me-2" title="Wishlist">❤️</a>
                        <a href="{{ route('dashboard') }}" class="btn btn-outline-primary me-2">Área Pessoal</a>
                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-outline-secondary">Logout</button>
                        </form>
                    @endauth

                    @guest
                        <a href="{{ route('login') }}" class="btn me-2 p-2" style="border: 1px solid #D9D9D9;">Login</a>
                        <a href="{{ route('register') }}" class="btn p-2 text-white" style="background-color:#FE5101;">Criar conta</a>
                    @endguest
                </div>
            </div>
        </div>
    </nav>

    <div class="offcanvas offcanvas-start" tabindex="-1" id="mobileMenu" aria-labelledby="mobileMenuLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="mobileMenuLabel">Menu</h5>
          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Fechar"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="list-unstyled">
            <li><a href="{{ route('home') }}" class="nav-link">🏠 Início</a></li>
            <li><a href="{{ route('animais.index') }}" class="nav-link">🐾 Animais</a></li>
            <li><a href="{{ route('doacao') }}" class="nav-link">💖 Doar</a></li>
            <li><a href="{{ route('sobrenos') }}" class="nav-link">📖 Sobre Nós</a></li>
            <li><a href="{{ route('contacto') }}" class="nav-link">📬 Contacto</a></li>

            @auth
              <li><a href="{{ route('wishlist') }}" class="nav-link">❤️ Wishlist</a></li>
              <li><a href="{{ route('dashboard') }}" class="nav-link">👤 Área Pessoal</a></li>
              <li>
                  <form action="{{ route('logout') }}" method="POST" class="d-inline">
                      @csrf
                      <button class="nav-link btn btn-link text-start ps-0">🚪 Logout</button>
                  </form>
              </li>
            @else
              <li><a href="{{ route('login') }}" class="nav-link">🔐 Login</a></li>
              <li><a href="{{ route('register') }}" class="nav-link">📝 Criar Conta</a></li>
            @endauth
          </ul>
        </div>
      </div>

    <!-- Conteúdo dinâmico -->
    <main class="container py-5">
        @yield('content')
    </main>

    <!-- Footer com 3 colunas -->
    <footer class="text-white pt-5 pb-3" style="background-color: #FE5101;">
        <div class="container">
            <div class="row text-center text-md-start">
                <div class="col-md-4 mb-4">
                    <h5 class="fw-bold">Adoptable</h5>
                    <p>Plataforma dedicada à adoção de animais abandonados. Juntos criamos novas histórias de amor e carinho. 🐾</p>
                </div>

                <div class="col-md-4 mb-4">
                    <h6 class="fw-bold">Navegação</h6>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('home') }}" class="text-white text-decoration-none footer-link">Início</a></li>
                        <li><a href="{{ route('animais.index') }}" class="text-white text-decoration-none footer-link">Animais</a></li>
                        <li><a href="{{ route('doacao') }}" class="text-white text-decoration-none footer-link">Doar</a></li>
                        <li><a href="{{ route('sobrenos') }}" class="text-white text-decoration-none footer-link">Sobre Nós</a></li>
                        <li><a href="{{ route('contacto') }}" class="text-white text-decoration-none footer-link">Contacto</a></li>
                    </ul>
                </div>

                <div class="col-md-4 mb-4" id="contacto">
                    <h6 class="fw-bold">Contacto</h6>
                    <p class="mb-1">Email: contactoadoptable@gmail.com</p>
                    <p class="mb-1">Telefone: 912 345 678</p>
                    <p class="mb-0">São Martinho do Bispo, Coimbra</p>
                </div>
            </div>
            <hr style="border-color: rgba(255,255,255,0.3);">
            <div class="text-center">
                <small>© 2025 Adoptable. Todos os direitos reservados.</small>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>



