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
            <figure>
                <img src="{{ asset('storage/' . $specie->image_path) }}" alt="{{ $specie->nombre }}">
                <figcaption>
                    <strong>{{ $specie->nombre }}</strong>
                    <br>
                    <em>{{ $specie->nombre_cientifico }}</em>
                    <br>
                    @if ($specie->category)
                        <span class="badge bg-success">
                            {{ $specie->category->nombre }} ({{ $specie->category->tipo }})
                        </span>
                    @else
                        <span class="badge bg-warning">Sin categoría</span>
                    @endif
                </figcaption>
            </figure>
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
    gap: 20px;
    justify-content: center;
    padding: 10px;
}

.kb-gallery-item {
    display: block;
    width: calc(24% - 20px);
    max-width: 350px;
    border-radius: 6px;
    overflow: hidden;
    text-decoration: none;
    background: #000;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
}

.kb-gallery-item figure {
    margin: 0;
    height: 100%;
    display: flex;
    flex-direction: column;
}

.kb-gallery-item img {
    width: 100%;
    height: auto;
    max-height: 220px;
    object-fit: cover;
}

.kb-gallery-item figcaption {
    text-align: center;
    background-color: rgba(0, 0, 0, 0.7);
    color: white;
    padding: 10px;
    font-size: 0.9em;
    flex-grow: 1;
}

/* PAGINACIÓN */
.pagination-container {
    display: flex;
    justify-content: center;
}

.pagination .page-link {
    color: white;
    background: #198754;
    border: 1px solid #198754;
}

.pagination .page-link:hover {
    background: #145c39;
}

/* RESPONSIVE MEDIA QUERIES */
@media (max-width: 1024px) {
    .kb-gallery-item {
        width: calc(33.33% - 20px);
    }
}

@media (max-width: 768px) {
    .kb-gallery-item {
        width: calc(50% - 20px);
    }
}

@media (max-width: 480px) {
    .kb-gallery-item {
        width: 100%;
    }
}
</style>
