@extends('layouts.app')

@section('content')
<style>
    .hero {
        background: url('{{ asset('img/contraloria.jpg') }}') no-repeat center center; /* Ruta de la imagen */
        background-size: cover; /* Ajusta la imagen para cubrir todo el contenedor */
        text-align: center;
        padding: 80px 20px;
        margin-bottom: 50px;
        position: relative;
    }

    .hero h1,
    .hero p {
        color: white;
        position: relative;
        z-index: 2;
    }

    .hero h1 {
        font-size: 3rem;
        font-weight: bold;
    }

    .hero p {
        font-size: 1.5rem;
        margin-top: 20px;
    }

    .hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(to bottom, rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.2));
        z-index: 1;
    }

    .btn-custom {
        background-color: white;
        color: #E30613; /* Rojo institucional */
        font-weight: bold;
        border: 2px solid white;
        position: relative;
        z-index: 2;
    }

    .btn-custom:hover {
        background-color: #C70000;
        color: white;
    }
</style>

<div class="hero">
    <h1>Bienvenido a la Contraloría</h1>
    <p class="lead">Sistema de seguimiento y monitoreo de denuncias.</p>
    <a href="{{ route('register') }}" class="btn btn-custom btn-lg">Conoce Más</a>
</div>

<!-- Main Content -->
<main class="d-flex justify-content-center align-items-center">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-md-4 mb-4">
                <div class="card shadow">
                    <a href="/denuncias/mostrar" class="btn btn-light w-100 text-decoration-none">
                        <div class="card-body">
                            <h5 class="card-title text-danger">Seguimiento a tu denuncia</h5>
                            <p class="card-text">Click para ver el progreso de su denuncia.</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card shadow">
                    <a href="/denuncias/registro" class="btn btn-light w-100 text-decoration-none">
                        <div class="card-body">
                            <h5 class="card-title text-danger">Realizar denuncia</h5>
                            <p class="card-text">Click aquí si quieres hacer una denuncia.</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Footer -->
<footer class="py-4">
    <div class="container text-center">
        <p class="text-muted">&copy; 2024 Contraloría General de la República del Perú. Todos los derechos reservados.</p>
    </div>
</footer>
@endsection
