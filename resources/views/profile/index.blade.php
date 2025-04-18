@extends('layouts.app')

@section('title', 'Mi Perfil')

@section('content')
<div class="container">

    <!-- Título principal -->
    <h1 style="color: white; text-align: center; margin-top: 50px">Mi Perfil</h1>

    <!-- Contenedor de la información personal (dividido en dos columnas) -->
    <div class="perfil-container" style="display: flex; justify-content: space-between; margin-top: 30px;">
        
        <!-- Columna Izquierda -->
        <div class="columna" style="width: 48%;">
            <p style="color: white;"><strong>Nombre:</strong> {{ $user->name }}</p>
            <p style="color: white;"><strong>Email:</strong> {{ $user->email }}</p>
            <p style="color: white;"><strong>Preferencias:</strong> {{ $user->datos->preferencias ?? 'Dato no disponible' }}</p>
            <p style="color: white;"><strong>Alias:</strong> {{ $user->datos->alias ?? 'Dato no disponible' }}</p>
        </div>
        
        <!-- Columna Derecha -->
        <div class="columna" style="width: 48%;">
            <p style="color: white;"><strong>Teléfono:</strong> {{ $user->datos->telefono ?? 'Dato no disponible' }}</p>
            <p style="color: white;"><strong>Animal Favorito:</strong> {{ $user->datos->animal_favorito ?? 'Dato no disponible' }}</p>
            <p style="color: white;"><strong>Ocupación:</strong> {{ $user->datos->ocupacion ?? 'Dato no disponible' }}</p>
        </div>

    </div>

    <!-- Título de publicaciones -->
    <h2 style="color: white; text-align: center; margin-top: 30px;">Mis Publicaciones</h2>

    <div class="container mt-5">
    <div class="kb-gallery-container">
        @foreach($posts as $post)
        <a href="{{ route('posts.show', $post->id) }}" class="kb-gallery-item">
            <img src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->title }}">
            <figcaption>
                <strong>{{ $post->title }}</strong>
                <br>
                <em>{{ \Illuminate\Support\Str::limit($post->body, 60) }}</em>
                @if ($post->category)
                    <span class="badge bg-success">
                        {{ $post->category->nombre }} ({{ $post->category->tipo }})
                    </span>
                @else
                    <span class="badge bg-warning">Sin categoría</span>
                @endif
            </figcaption>
        </a>
        @endforeach
    </div>

    @if($posts->isEmpty())
    <div class="text-center mt-5">
        <p class="text-white">No has creado publicaciones todavía.</p>
    </div>
    @endif
</div>
</div>
@endsection
