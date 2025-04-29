<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | Flora y Fauna de Honduras</title>

    <!-- Bootstrap 5 desde CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Fuentes de Breeze (opcional) -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @stack('styles')

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
        height: 100%;
    }

        /* Fondo de la página */
        body {
            background-image: url('images/fonds.jpg');
            background-size: cover; /* Hace que la imagen cubra toda la pantalla */
            background-position: center; /* Centra la imagen */
            background-attachment: fixed; /* Fija la imagen para que no se desplace al hacer scroll */
            background-repeat: no-repeat; /* Evita que la imagen se repita */
        }

        /* Contenido encima del fondo */
        .content {
            position: relative;
            z-index: 1; /* Asegura que el contenido esté sobre la imagen */
            text-align: center;
            color: white;
            height: 100vh; /* Ocupa toda la pantalla */
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: rgba(0, 0, 0, 0.3); /* Oscurece el fondo para mejorar la visibilidad del texto */
        }
    main {
        flex: 1 0 auto; /* Permite que el contenido crezca */
    }
    </style>

</head>
<body class="d-flex flex-column min-vh-100 font-sans antialiased">
    <!-- Navbar de Bootstrap -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <div class="container">
            <a class="navbar-brand" href="/">Biodiversidad HN</a>
            
            <!-- Integrar Menú de Breeze -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                @include('layouts.navigation')  <!-- Menú de Breeze modificado -->
            </div>
        </div>
    </nav>

    <!-- Contenido Principal -->
    <main class="py-4 flex-grow-1">
        <div class="container">
            @yield('content')
        </div>
    </main>

    <!-- Scripts de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var userDropdown = document.getElementById("userDropdown");
            if (userDropdown) {
                var dropdown = new bootstrap.Dropdown(userDropdown);

                userDropdown.addEventListener("click", function (event) {
                    event.preventDefault();
                    dropdown.toggle();
                });
            }
        });
    </script>
</body>
</html>
