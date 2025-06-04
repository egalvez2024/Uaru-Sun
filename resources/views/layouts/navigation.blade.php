<nav class="navbar navbar-expand-lg navbar-dark bg-success shadow-sm fixed-top">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="d-inline-block align-text-top" width="40" height="40">
            ÚARU SUN
        </a>

        <!-- Menú Hamburguesa -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Elementos del Menú -->
        <div class="collapse navbar-collapse" id="mainNavbar">
            <!-- Menú Izquierdo -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @auth
                    @if(Auth::user()->role === 'admin')
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.especies.index') ? 'active' : '' }}" href="{{ route('admin.especies.index') }}">
                                <i class="fas fa-cog me-1"></i>Administrar Publicaciones
                            </a>
                        </li>
                    @endif

                    @if(Auth::user()->role === 'user')
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('UsuarioPost.create') ? 'active' : '' }}" href="{{ route('UsuarioPost.create') }}">
                                <i class="fas fa-plus-circle me-1"></i>Crear Publicación
                            </a>
                        </li>
                    @endif


                    @if(Auth::user()->role === 'user' || Auth::user()->role === 'admin')
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('paisajes.index') ? 'active' : '' }}" href="{{ route('paisajes.index') }}">
                                <i class="fas fa-image me-1"></i>Paisajes
                            </a>
                        </li>
                    @endif

                @endauth
            </ul>

<form class="d-flex align-items-center gap-1 ms-2 flex-wrap" method="GET" action="{{ route('admin.especies.index') }}">
    <div class="filtro-container">
        <input type="hidden" name="filtro" id="filtroSeleccionado" value="{{ request('filtro', 'nombre_comun') }}">
        <input type="text" class="form-control form-control-sm" name="query" id="campoBusqueda" value="{{ request('query') }}" placeholder="Buscar especie..." style="max-width: 160px;">
        <div class="filtro-dropdown" id="filtroDropdown">
            <label><input type="radio" name="filtro_opcion" value="nombre_comun" checked> Nombre Común</label>
            <label><input type="radio" name="filtro_opcion" value="habitat"> Hábitat</label>
        </div>
    </div>
    <button class="btn btn-outline-light btn-sm" type="submit">🔍</button>
</form>







            <!-- Menú Derecho -->
            <ul class="navbar-nav ms-auto">

            <!-- Dropdown de Usuario -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle {{ request()->routeIs('login', 'admin.especies.index', 'UsuarioPost.create', 'profile.index') ? 'active' : '' }}" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user-circle me-1"></i>
                    @auth {{ Auth::user()->name }} @else Menú @endauth
                </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
            @guest
            <li>
                <a class="dropdown-item {{ request()->routeIs('login') ? 'active' : '' }}" href="{{ route('login') }}">
                    <i class="fas fa-sign-in-alt me-1"></i> Ingresar
                </a>
            </li>
            @endguest

                @auth
                    <!-- Menú desplegable de opciones -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="menuDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-bars me-1"></i>Flora y Fauna
                        </a>
                        <div class="dropdown-menu" aria-labelledby="menuDropdown">
                            <a class="dropdown-item" href="{{ route('fauna.index') }}">
                                <i class="fas fa-paw me-2"></i>Fauna
                            </a>
                            <a class="dropdown-item" href="{{ route('flora.index') }}">
                                <i class="fas fa-leaf me-2"></i>Flora
                            </a>
                            @if(Auth::user()->role === 'admin')
                                <a class="dropdown-item" href="{{ route('reportes.index') }}">
                                    <i class="fas fa-triangle-exclamation me-2"></i>Ver actividades ilegales
                                </a>
                            @endif
                            @if(Auth::user()->role === 'user')
                                <a class="dropdown-item" href="{{ route('reportes.create') }}">
                                    <i class="fas fa-triangle-exclamation me-2"></i>Reportar actividad ilegal
                                </a>
                            @endif
                        </div>
                    </li>

                    <!-- Dropdown Usuario -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user-circle me-1"></i>{{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
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
        </div>
    </div>
</nav>