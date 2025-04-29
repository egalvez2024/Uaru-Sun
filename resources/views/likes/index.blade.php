@extends('layouts.app')

@section('title', 'Mis Likes')

@section('content')
<div class="container mt-4">
    {{-- Botón estilizado de regreso al perfil --}}
    <div class="mb-4">
        <a href="{{ route('profile.index') }}" class="btn-back">
            Regresar al perfil
        </a>
    </div>

    <h2 class="text-white">Especies que te han gustado</h2>
    
    <div class="row">
        @forelse($likes as $like)
        <div class="col-md-4 mb-4">
    <div class="card h-100 shadow-sm bg-dark text-white">
        <img src="{{ asset('storage/' . $like->species->image_path) }}" class="card-img-top" alt="{{ $like->species->nombre }}">
        <div class="card-body">
            <h5 class="card-title">{{ $like->species->nombre }}</h5>
            <p class="card-text"><em>{{ $like->species->nombre_cientifico }}</em></p>
            <a href="{{ route('catalogo.show', $like->species->id) }}" class="btn btn-primary">Ver más</a>
        </div>
    </div>
</div>
        @empty
            <p>No has dado like a ninguna especie aún.</p>
        @endforelse
    </div>
</div>

<style>
    /* Botón de regresar */
.btn-back {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 10px 20px;
    background: linear-gradient(135deg, #4CE4A0, #2DB07F);
    color: #fff;
    border: none;
    border-radius: 30px;
    font-weight: bold;
    text-decoration: none;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    transition: all 0.3s ease;
}

.btn-back:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
    text-decoration: none;
    color: #fff;
}
</style>
@endsection
