@extends('layouts.app')

@section('title', 'Inicio - Flora y Fauna de Honduras')

@section('content')
<div class="container mt-4">
    <div class="text-center mb-3">
        <h1 class="display-5 text-success">
            <i class="fas fa-leaf"></i> Biodiversidad Hondureña
        </h1>
        <p class="lead text-white">Descubre nuestra riqueza natural</p>
    </div>

    <div class="kb-gallery-container">
        @foreach($species as $specie)
        <a href="{{ route('catalogo.show', $specie->id) }}" class="kb-gallery-item">
            <img src="{{ asset('storage/' . $specie->image_path) }}" alt="{{ $specie->nombre }}">
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

    <!-- PAGINACIÓN -->
    <div class="pagination-container mt-4">
        {{ $species->links() }}
    </div>
</div>
@endsection

<style>
.kb-gallery-container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px; /* Espaciado entre publicaciones */
    justify-content: center;
    padding: 10px;
}

.kb-gallery-item {
    position: relative;
    display: flex;
    flex-direction: column;
    align-items: center;
    width: calc(24% - 20px); /* Mantiene 4 publicaciones por fila */
    max-width: 350px; /* Hace las publicaciones más grandes */
    height: 280px; /* Aumenta la altura */
    border-radius: 6px;
    overflow: hidden;
    text-decoration: none;
    background: #000;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
}

.kb-gallery-item img {
    width: 100%;
    height: 65%;
    object-fit: cover;
    border-bottom: 1px solid #ccc;
}

.kb-gallery-item figcaption {
    text-align: center;
    background-color: rgba(0, 0, 0, 0.6);
    color: white;
    padding: 10px;
    font-size: 0.9em;
    width: 100%;
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
}

/* PAGINACIÓN */
.pagination-container {
    display: flex;
    justify-content: center;
}

.pagination .page-link {
    color: white;
    background: #198754; /* Verde Bootstrap */
    border: 1px solid #198754;
}

.pagination .page-link:hover {
    background: #145c39; /* Verde oscuro */
}

@media (max-width: 1024px) {
    .kb-gallery-item {
        width: calc(33.33% - 20px); /* 3 publicaciones por fila */
    }
}

@media (max-width: 768px) {
    .kb-gallery-item {
        width: calc(50% - 20px); /* 2 publicaciones por fila */
    }
}

@media (max-width: 480px) {
    .kb-gallery-item {
        width: calc(100% - 20px); /* 1 publicación por fila */
    }
}
</style>
