@extends('layouts.app')

@section('title', 'Mis Favoritos - Flora y Fauna de Honduras')

@section('content')
<div class="container mt-5">
    <div class="kb-gallery-container">
        @foreach($favoritos as $favorito)
        <a href="{{ route('catalogo.show', $favorito->species->id) }}" class="kb-gallery-item">
            <img src="{{ asset('storage/' . $favorito->species->image_path) }}" alt="{{ $favorito->species->nombre }}">
            <figcaption>
                <strong>{{ $favorito->species->nombre }}</strong>
                <br>
                <em>{{ $favorito->species->nombre_cientifico }}</em>
                @if ($favorito->species->category)
                    <span class="badge bg-success">
                        {{ $favorito->species->category->nombre }} ({{ $favorito->species->category->tipo }})
                    </span>
                @else
                    <span class="badge bg-warning">Sin categoría</span>
                @endif
            </figcaption>
        </a>
        @endforeach
    </div>
</div>
@endsection

<style>
.kb-gallery-container {
    display: flex;
    flex-wrap: wrap;
    gap: 15px;
    justify-content: center;
    padding: 20px 0;
}

.kb-gallery-item {
    position: relative;
    display: flex;
    flex-direction: column;
    align-items: center;
    width: calc(25% - 15px); /* Ajusta para 4 columnas */
    max-width: 300px;
    border-radius: 8px;
    overflow: hidden;
    text-decoration: none;
}

.kb-gallery-item img {
    width: 100%;
    height: auto;
    aspect-ratio: 16/9; /* Mantiene proporción uniforme */
    object-fit: cover;
    transition: transform 0.3s ease-in-out;
}

.kb-gallery-item:hover img {
    transform: scale(1.05);
}

.kb-gallery-item figcaption {
    text-align: center;
    background: rgba(0, 0, 0, 0.7);
    color: white;
    padding: 10px;
    font-size: 0.9em;
    width: 100%;
}
</style>