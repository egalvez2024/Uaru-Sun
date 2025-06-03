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

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('profile.index') }}">Mi Perfil</a>
                </li>
            </ul>
            
            <form class="d-flex ms-3" method="GET" action="{{ route('admin.especies.index') }}">
                <select class="form-select form-select-sm me-2" name="filtro">
                    <option value="nombre_comun" {{ request('filtro') == 'nombre_comun' ? 'selected' : '' }}>Nombre Común</option>
                    <option value="habitat" {{ request('filtro') == 'habitat' ? 'selected' : '' }}>Hábitat</option>
                </select>
                <input type="text" class="form-control form-control-sm me-2" name="query" value="{{ request('query') }}" placeholder="Buscar especie...">
                <button class="btn btn-outline-light btn-sm" type="submit">🔍</button>
            </form>

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
                            <i class="fas fa-bars me-1"></i>Flora y Fauna
                        </a>
                        <div class="dropdown-menu" aria-labelledby="menuDropdown">
                            <a class="dropdown-item" href="{{ route('fauna.index') }}">
                                <i class="fas fa-paw me-2"></i>Fauna
                            </a>
                            <a class="dropdown-item" href="{{ route('flora.index') }}">
                                <i class="fas fa-leaf me-2"></i>Flora
                            </a>
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
                  
                           
                <a href="{{ route('bitacora.bita') }}" class="btn btn-secondaryend">Bitácora</a>   
                 
                 
                @endauth
            </ul>
        </div>
    </div>
</nav>
