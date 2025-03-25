<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adoptable</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        /* Faz a página ocupar toda a altura */
        html, body {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
        }

        body {
          background-color:rgba(255, 255, 255, 0.82);
        }

        /* O conteúdo cresce para empurrar o footer para baixo */
        .content {
            flex-grow: 1;
        }

         /* Ajusta o layout das seções */
         .hero {
            background-color: #FE5101;
            color: white;
            padding: 50px 0;
        }
        .search-box {
            background: white;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            margin-top: -30px;
            position: relative;
            z-index: 10;
        }
        .text-highlight {
            color: #FE5101;
            font-weight: bold;
        }
        html {
        scroll-behavior: smooth;

        .wishlist-btn {
            font-size: 1.2rem;
            color: #fe5101;
            background: none;
            border: none;
        }
        .wishlist-btn:hover {
            color: #c64400;
        }
    }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg bg-white shadow-sm">
        <div class="container-fluid">
          <!-- Logo -->
          <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
              <img src="{{ asset('images/LOGO1.png') }}" alt="Logo" width="124" height="36" class="d-inline-block align-text-top">
          </a>

          <!-- Botão Hamburger -->
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown">
            <span class="navbar-toggler-icon"></span>
          </button>

          <!-- Itens do menu -->
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item px-2">
                  <a class="nav-link" href="{{ route('animais.index') }}">Animais</a>
              </li>
              <li class="nav-item px-2">
                  <a class="nav-link" href="{{ route('doacao') }}">Doar</a>
              </li>
              <li class="nav-item px-2">
                  <a class="nav-link" href="#sobre-nos">Sobre Nós</a>
              </li>
              <li class="nav-item px-2">
                  <a class="nav-link" href="#contacto">Contacto</a>
              </li>
              @auth
    @if(auth()->user()->is_admin)
        <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-dark me-2">
            Administração
        </a>
    @endif
@endauth

            </ul>

            <!-- Botões à direita -->
            <div class="d-flex align-items-center">
                @auth
                    <a href="{{ route('wishlist') }}" class="btn wishlist-btn me-2" title="Ver Wishlist">
                        ❤️
                    </a>
                    <a href="{{ route('dashboard') }}" class="btn btn-outline-primary me-2">Área Pessoal</a>

                @endauth
              @guest
                <a href="{{ route('login') }}" class="btn btn-outline-secondary me-2">Login</a>
                <a href="{{ route('register') }}" class="btn text-white" style="background-color:#FE5101;">Criar conta</a>
              @else
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger">Logout</button>
                </form>
              @endguest
            </div>
          </div>
        </div>
      </nav>


  <section class="hero text-center text-lg-start">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4">
                    <h1>Descubra o Amor Sem Fim com Seu Novo Companheiro Peludo!</h1>
                    <p>Adote agora e encontre um amigo para toda a vida. Juntos, vocês criarão memórias inesquecíveis.</p>
                </div>
                <div class="col-lg-6">
                    <img src="{{ asset('images/mulher.jpg') }}" alt="Mulher com cachorro" class="img-fluid rounded">
                </div>
            </div>
        </div>
    </section>

    <!-- Caixa de Busca -->
    <div class="container">
        <div class="search-box text-center p-3">
            <form class="row g-2">
                <div class="col-md-3">
                    <select class="form-select">
                        <option selected>Localização</option>
                        <option>Lisboa</option>
                        <option>Porto</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select class="form-select">
                        <option>Cães</option>
                        <option>Gatos</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select class="form-select">
                        <option selected>Raça</option>
                        <option>Todas</option>
                        <option>Labrador</option>
                        <option>Persa</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select class="form-select">
                        <option selected>Idade</option>
                        <option>Jovem</option>
                        <option>Adulto</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <button class="btn btn-danger w-100">Procurar</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Seção de Destaque -->
    <section class="py-5">
        <div class="container">
            <div class="row align-items-center">
                <!-- Carousel -->
                <div class="col-lg-6">
                    <div id="carouselDogs" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ asset('images/cao.jpg') }}" class="d-block w-100 rounded" alt="Cachorro sendo acariciado">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('images/gato.jpg') }}" class="d-block w-100 rounded" alt="Outro cachorro feliz">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselDogs" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselDogs" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        </button>
                    </div>
                </div>

                <!-- Texto ao lado -->
                <div class="col-lg-6 mt-4 mt-lg-0">
                    <h2>Descubra qual o <span class="text-highlight">amigo peludo</span> que melhor combina consigo!</h2>
                    <p>Os animais precisam de uma família cheia de carinho e companheirismo. Adote um amigo e transforme a sua vida com amor incondicional.</p>
                </div>
            </div>
        </div>
    </section>

<!-- Secção: Sobre Nós -->
<section id="sobre-nos" class="py-5" style="background-color: #fff4ec;">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8">
                <h2 class="mb-4" style="color: #FE5101;">Sobre Nós</h2>
                <p class="lead">
                    A Adoptable é uma organização sem fins lucrativos que tem como missão resgatar, cuidar e encontrar um lar para animais abandonados em todo o país.
                </p>
                <p>
                    Acreditamos que todos os animais merecem amor, carinho e uma segunda oportunidade. Com a ajuda de voluntários e doações, garantimos que cada animal receba os cuidados que merece até encontrar a sua família ideal.
                </p>
                <p class="fw-bold" style="color:#FE5101;">Juntos, podemos mudar vidas — uma adoção de cada vez.</p>
            </div>
        </div>
    </div>
</section>

<!-- Secção: Contacto -->
<section id="contacto" class="py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8">
                <h2 class="mb-4" style="color: #FE5101;">Contacto</h2>
                <p class="mb-1"><strong>Email:</strong> <a href="mailto:info@adoptable.pt" class="text-decoration-none text-dark">info@adoptable.pt</a></p>
                <p class="mb-1"><strong>Telefone:</strong> <span class="text-dark">+351 912 345 678</span></p>
                <p class="mb-3"><strong>Morada:</strong> Rua dos Animais Felizes, nº 123, Coimbra</p>

                <div class="d-flex justify-content-center gap-3 mt-3">
                    <a href="#" class="btn btn-outline-dark btn-sm" target="_blank">Facebook</a>
                    <a href="#" class="btn btn-outline-dark btn-sm" target="_blank">Instagram</a>
                    <a href="#" class="btn btn-outline-dark btn-sm" target="_blank">Twitter</a>
                </div>
            </div>
        </div>
    </div>
</section>


<footer class="bg-light py-4">
        <div class="container">
            <div class="row">
                <!-- Logo -->
                <div class="col-md-3 mb-3">
                    <img src="{{ asset('images/LOGO1.png') }}" alt="Adoptable Logo" width="130">
                </div>

                <!-- Adotar -->
                <div class="col-md-3 mb-3">
                    <h6 class="fw-bold">Adotar</h6>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-muted text-decoration-none">Animais</a></li>
                    </ul>
                </div>

                <!-- Como Ajudar -->
                <div class="col-md-3 mb-3">
                    <h6 class="fw-bold">Como Ajudar</h6>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-muted text-decoration-none">Doe</a></li>
                    </ul>
                </div>

                <!-- Institucional -->
                <div class="col-md-3 mb-3">
                    <h6 class="fw-bold">Institucional</h6>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-muted text-decoration-none">Sobre nós</a></li>
                        <li><a href="#" class="text-muted text-decoration-none">Contacto</a></li>
                    </ul>
                </div>
            </div>

            <!-- Linha divisória -->
            <hr>

            <div class="d-flex justify-content-between align-items-center">
                <small class="text-muted">© Adoptable 2025. Todos direitos reservados.</small>

                <!-- Ícones sociais -->
                <div>
                    <a href="#" class="text-warning me-2"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="text-primary me-2"><i class="bi bi-twitter"></i></a>
                    <a href="#" class="text-danger"><i class="bi bi-youtube"></i></a>
                </div>
            </div>
        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
