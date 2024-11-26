<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contraloría del Perú</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #F8F9FA;
        }

        .navbar {
            background-color: #F5F5F5; /* Gris claro */
            border-bottom: 2px solid #E30613; /* Línea roja */
        }

        .navbar-brand img {
            height: 100px; /* Ajusta el tamaño según lo que necesites */
            max-height: none; /* Permite que la imagen crezca sin restricciones */
        }


        .navbar-nav .nav-link {
            color: #343A40 !important; /* Negro */
            font-weight: 500;
        }

        .navbar-nav .nav-link:hover {
            color: #E30613 !important; /* Rojo para hover */
        }

        .hero {
            background: #E30613; /* Rojo Contraloría */
            color: white;
            text-align: center;
            padding: 80px 20px;
        }

        .hero h1 {
            font-size: 3rem;
            font-weight: 700;
        }

        .hero p {
            font-size: 1.25rem;
        }

        .btn-custom {
            background-color: white;
            color: #E30613;
            font-weight: bold;
            border: 2px solid white;
        }

        .btn-custom:hover {
            background-color: #C70000;
            color: white;
        }

        .card {
            border: none;
            background-color: white;
        }

        .card-title {
            color: #E30613; /* Títulos en rojo */
            font-weight: bold;
        }

        .card-text {
            color: #6C757D; /* Texto en plomo */
        }

        footer {
            background-color: #F5F5F5; /* Negro */
            color: #343A40;
        }

        footer p {
            margin: 0;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('img/logo_standar.svg') }}" alt="Logo Contraloría">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item">
                                <a href="{{ url('/dashboard') }}" class="nav-link">Dashboard</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a href="{{ route('login') }}" class="nav-link">Iniciar Sesión</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item" style="color: #C70000">
                                    <a href="{{ route('register') }}" class="nav-link" >Registrarse</a>
                                </li>
                            @endif
                        @endauth
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="hero">
        <h1>Bienvenido a la Contraloría</h1>
        <p class="lead">Sistema de seguimiento y monitoreo de denuncias.</p>
        <a href="{{ route('register') }}" class="btn btn-custom btn-lg">Conoce Más</a>
    </div>

    <!-- Main Content -->
    <main class="container mt-5">
        <div class="row text-center">
            <div class="col-md-4 mb-4">
                <div class="card shadow">
                    <button>
                        <div class="card-body">
                        <h5 class="card-title">Realizar denuncia</h5>
                        <p class="card-text">Clik a qui si quiere hacer una denuncia</p>
                        </div>
                    </button>
                    
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card shadow">
                    <button>
                        <div class="card-body">
                            <h5 class="card-title">Hacer seguimeinto a tu denuncia</h5>
                            <p class="card-text">Clik para verl el progreso de su denuncia.</p>
                        </div>
                    </button>
                    
                </div>
            </div>
            
                <div class="col-md-4 mb-4">
                    <button>
                    <div class="card shadow">
                        <div class="card-body">
                            <h5 class="card-title">[pendiente para pensar todavvia</h5>
                            <p class="card-text">Fomentamos prácticas éticas y responsables.</p>
                        </div>
                    </div>
                    </button>
                    
                </div>
            
        </div>
    </main>

    <!-- Footer -->
    <footer class="py-4">
        <div class="container text-center">
            <p class="text-muted">&copy; 2024 Contraloría General de la República del Perú. Todos los derechos reservados.</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
