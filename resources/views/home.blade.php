@extends('layouts.app')

@section('title', 'Inicio - Flora y Fauna de Honduras')

@section('content')
<div class="container mt-5">
    <div class="text-center mb-4">
        <h1 class="display-4 text-success">
            <i class="fas fa-leaf"></i> Biodiversidad Hondureña
        </h1>
        <p class="lead" style="color: white;">Descubre nuestra riqueza natural</p>
    </div>

    <div class="kb-gallery-container">
        @foreach($species as $specie)
        <a href="{{ route('catalogo.show', $specie->id) }}" class="kb-gallery-item">
            <img src="{{ asset('storage/' . $specie->image_path) }}" alt="{{ $specie->nombre }}" height="100%">
            <figcaption>
                <strong>{{ $specie->nombre }}</strong>
                <br>
                <em>{{ $specie->nombre_cientifico }}</em>
                @if ($specie->category)
                    <span class="badge bg-success">
                        {{ $specie->category->nombre }} ({{ $specie->category->tipo }})
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