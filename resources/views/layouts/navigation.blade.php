<!-- resources/views/layouts/navigation.blade.php -->
<nav class="navbar navbar-expand-lg navbar-dark bg-success shadow-sm fixed-top">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="d-inline-block align-text-top" width="40" height="40">
            Biodiversidad HN
        </a>

        <!-- Menú Hamburguesa -->
        <button class="navbar-toggler" 
                type="button" 
                data-bs-toggle="collapse" 
                data-bs-target="#mainNavbar"
                aria-controls="mainNavbar" 
                aria-expanded="false" 
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Elementos del Menú -->
        <div class="collapse navbar-collapse" id="mainNavbar">
            <!-- Menú Izquierdo -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" 
                       href="{{ route('home') }}">
                        <i class="fas fa-home me-1"></i>Inicio
                    </a>
                </li>
            
                @auth
                @if(Auth::user()->role === 'admin')
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admin.especies.index') ? 'active' : '' }}" 
                           href="{{ route('admin.especies.index') }}">
                            <i class="fas fa-cog me-1"></i>Administrar Publicaciones
                        </a>
                    </li>
                @endif
                @endauth
            </ul>
            

            <!-- Menú Derecho -->
            <ul class="navbar-nav ms-auto">
                @guest
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('login') ? 'active' : '' }}" 
                       href="{{ route('login') }}">
                        <i class="fas fa-sign-in-alt me-1"></i>Ingresar
                    </a>
                </li>
                @endguest

                @auth
                <!-- Dropdown Usuario -->
                <li class="nav-item dropdown position-relative">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown"
                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                     <i class="fas fa-user-circle me-1"></i>{{ Auth::user()->name }}
                 </a>
                 
                 <ul class="dropdown-menu dropdown-menu-end" id="dropdownMenu">
                     <li><hr class="dropdown-divider"></li>
                     <li>
                         <form method="POST" action="{{ route('logout') }}">
                             @csrf
                             <button type="submit" class="dropdown-item text-danger">
                                 <i class="fas fa-sign-out-alt me-2"></i>Cerrar Sesión
                             </button>
                         </form>
                     </li>
                 </ul>
                 
                </li>
                @endauth


            </ul>
        </div>
    </div>
</nav>