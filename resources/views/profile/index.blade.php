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

    <!-- Contenedor de tarjetas de publicaciones -->
    <div class="card-container" style="display: flex; flex-wrap: wrap; justify-content: space-around; margin-top: 20px;">
        @if ($posts->count())
            @foreach ($posts as $post)
                <div class="card" style="width: 18rem; margin: 10px; border: 2px solid #4CE4A0; border-radius: 7px;">
                    <div class="card-body">
                        <h5 class="card-title" style="color: #4CE4A0;">{{ $post->title }}</h5>
                        <p class="card-text" style="color: white;">{{ \Str::limit($post->body, 100) }}</p>
                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary" style="background-color: #4CE4A0; border-color: #4CE4A0;">Ver Más</a>
                    </div>
                </div>
            @endforeach
        @else
            <p style="color: white;">No tienes publicaciones aún.</p>
        @endif
    </div>

</
