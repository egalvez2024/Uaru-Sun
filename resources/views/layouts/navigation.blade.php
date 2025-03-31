<!-- resources/views/layouts/navigation.blade.php -->
<nav class="navbar navbar-expand-lg navbar-dark bg-success shadow-sm fixed-top">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="d-inline-block align-text-top" width="40" height="40">
            ÚARU SUN
        </a>
    

    <style>
        .boton-flotante {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #28a745;
            color: white;
            border: 2px solid #ED7456;
            border-radius: 50%;
            width: 70px; 
            height: 70px; 
            font-size: 30px; /* Ajustado tamaño de fuente */
            cursor: pointer;
            text-align: center;
            line-height: 60px; 
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); 
            text-decoration: none; 
        }
    </style>


        <!-- Menú Hamburguesa -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" >
            <span class="navbar-toggler-icon"></span>
        </button>



        <!-- Elementos del Menú -->
        <div class="collapse navbar-collapse" id="mainNavbar">
            <!-- Menú Izquierdo -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                        <i class="fas fa-home me-1"></i>Inicio
                    </a>
                </li>


                @auth
                    @if(Auth::user()->role === 'admin')
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.especies.index') ? 'active' : '' }}" href="{{ route('admin.especies.index') }}">
                                <i class="fas fa-cog me-1"></i>Administrar Publicaciones
                            </a>
                        </li>
                    @endif

                    @if(Auth::user()->role === 'user' || Auth::user()->role === 'user')
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('favoritos.index') ? 'active' : '' }}" href="{{ route('favoritos.index') }}">
                                <i class="fas fa-plus-circle me-1"></i>Favoritos
                            </a>
                        </li>
                    @endif
                @endauth

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('profile.index') }}">Mi Perfil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('store.index') }}">Tienda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('course.index') }}">Cursos</a>
                </li>

            </ul>

           <!-- Menú Derecho -->
<ul class="navbar-nav ms-auto">
    @guest
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('login') ? 'active' : '' }}" href="{{ route('login') }}">
                <i class="fas fa-sign-in-alt me-1"></i>Ingresar
            </a>
        </li>
    @endguest

    @auth
        <!-- Menú desplegable de opciones -->
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="menuDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-bars me-1"></i>Menú
            </a>
            <div class="dropdown-menu" aria-labelledby="menuDropdown">
                <a class="dropdown-item" href="{{ route('fauna.index') }}">
                    <i class="fas fa-paw me-2"></i>Fauna 
                </a>

                <a class="dropdown-item" href="{{ route('flora.index') }}">
                    <i class="fas fa-paw me-2"></i>Flora 
                </a>


                <a class="dropdown-item" href="{{ route('peligro.index') }}">
                    <i class="fas fa-paw me-2"></i>Peligro de Extincion
                </a>
            </div>
        </li>

        <!-- Dropdown Usuario -->
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-user-circle me-1"></i>{{ Auth::user()->name }}
            </a>
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                <hr class="dropdown-divider">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="dropdown-item text-danger">
                        <i class="fas fa-sign-out-alt me-2"></i>Cerrar Sesión
                    </button>
                </form>
            </div>
        </li>
    @endauth
</ul>


<button class="boton-flotante" onclick="window.location.href='{{ route('UsuarioPost.create') }}'">+</button>

 

            </ul>
        </div>

        <a href="{{ route('UsuarioPost.create') }}" class="boton-flotante">+</a>

        
    </div>
</nav>


