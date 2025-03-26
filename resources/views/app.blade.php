<!DOCTYPE html>
<html lang="es">
<>
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
    </style>

    
</head>
<body class="font-sans antialiased">

    <!-- Contenido Principal -->
    <main class="py-4">
        <div class="container">
            @yield('content')
        </div>
    </main>


    <div class="vision" style="background-position: center 263.6px; opacity: 1; transform: translateY(0px);">
    <div class="vision-content">
        <!-- Footer -->
    <footer class="bg-dark text-white mt-5">
        <div class="container py-4">
            <p class="mb-0 text-center">© {{ date('Y') }} Biodiversidad Hondureña</p>
        </div>
    </footer>
        
    </div>
    <div class="vision-image">
        
</div>
    

    <style>
    /* Estilos para que el footer siempre esté visible sobre el fondo */
    .footer {
        position: fixed; /* Fijado en la parte inferior */
        bottom: 0;
        width: 100%;
        background: rgba(0, 0, 0, 0.7); /* Oscuro pero semi-transparente */
        color: white;
        padding: 10px 0;
        text-align: center;
        z-index: 1000; /* Asegura que esté sobre otros elementos */
    }
</style>
    

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var userDropdown = document.getElementById("userDropdown");
            var dropdown = new bootstrap.Dropdown(userDropdown);
    
            userDropdown.addEventListener("click", function (event) {
                event.preventDefault();
                dropdown.toggle();
            });
        });
    </script>
    
</body>
</html>