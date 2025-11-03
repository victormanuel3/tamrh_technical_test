<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel</title>

    {{-- Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter+Tight:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body x-data class="bg-light">
    <nav class="navbar navbar-light bg-white shadow-sm">
        <div class="container-fluid px-4">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="{{ asset('/images/tamrh.png') }}" alt="Logo" height="40" class="me-2">
            </a>
            <div>
                <button class="btn text-white me-2" style="background-color: #4338ca;" @click="$dispatch('open-login-modal')">
                    Iniciar sesión
                </button>
                <button class="btn btn-outline-primary" style="border-color: #4338ca; color: #4338ca;" @click="$dispatch('open-register-modal')">
                    Registrarse
                </button>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row min-vh-100 align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold mb-4" style="color: #4338ca;">
                    Bienvenido a mí prueba técnica
                </h1>
                <p class="lead text-muted mb-4">
                    Soy Víctor Manuel, Desarrollador web
                </p>
                <div class="d-flex gap-3">
                    <button class="btn btn-lg text-white" style="background-color: #4338ca;" @click="$dispatch('open-register-modal')">
                        Comenzar ahora
                    </button>
                    <button class="btn btn-lg btn-outline-secondary" @click="$dispatch('open-login-modal')">
                        Ya tengo cuenta
                    </button>
                </div>
            </div>
            <div class="col-lg-6 text-center">
                <img src="{{ asset('/images/tamrh.png') }}" alt="Logo" class="img-fluid" style="max-width: 600px;">
            </div>
        </div>
    </div>

    {{-- Modals --}}
    @livewire('auth.login')
    @livewire('auth.register')
</body>
</html>