@extends('layouts.app')

@section('title', $specie->nombre)

@section('content')
<div class="species-page-wrapper">
    <div class="container mt-5 mb-5">
        <div class="detail-card">
            <div class="image-column">
                <img src="{{ asset('storage/' . $specie->image_path) }}" alt="{{ $specie->nombre }}" class="detail-image">
            </div>

            <div class="info-column">
                <h1 class="specie-name">{{ $specie->nombre }}</h1>
                <h2 class="specie-scientific"><em>{{ $specie->nombre_cientifico }}</em></h2>

                <div class="favorite-section">
                    @if(auth()->user() && auth()->user()->favoritos->where('species_id', $specie->id)->count())
                        <form action="{{ route('favoritos.destroy', $specie->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-fav">
                                <i class="fas fa-heart-broken"></i> Quitar de Favoritos
                            </button>
                        </form>
                    @else
                        <form action="{{ route('favoritos.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="species_id" value="{{ $specie->id }}">
                            <button type="submit" class="btn btn-warning btn-fav">
                                <i class="fas fa-heart"></i> Añadir a Favoritos
                            </button>
                        </form>
                    @endif
                </div>

                <div class="info-section">
                    <h3>Hábitat</h3>
                    <p>{{ $specie->habitat }}</p>
                </div>

                <div class="info-section">
                    <h3>Descripción</h3>
                    <p>{{ $specie->descripcion }}</p>
                </div>

                <div class="info-section">
                    <h3>Ubicación en Honduras</h3>
                    <p>{{ $specie->location }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<style>
/* Fondo oscuro que cubre toda la vista */
.species-page-wrapper {
    min-height: 100vh;
    width: 100%;
    padding: 50px 0;
}

/* Tarjeta principal */
.detail-card {
    display: flex;
    flex-wrap: wrap;
    background: #ffffff;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.25);
}

/* Columna de imagen */
.image-column {
    flex: 1 1 400px;
    background: #e9ecef;
    display: flex;
    align-items: center;
    justify-content: center;
}

.detail-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    max-height: 600px;
}

/* Columna de información */
.info-column {
    flex: 2 1 500px;
    padding: 30px;
    background-color: white;
}

/* Textos */
.specie-name {
    color: #198754;
    margin-bottom: 5px;
    font-size: 2.2rem;
    font-weight: bold;
}

.specie-scientific {
    color: #6c757d;
    margin-bottom: 25px;
    font-size: 1.2rem;
}

/* Favoritos */
.favorite-section {
    margin-bottom: 25px;
}

.btn-fav {
    font-size: 16px;
    padding: 10px 18px;
    border-radius: 8px;
}

/* Info secciones */
.info-section {
    margin-bottom: 25px;
}

.info-section h3 {
    color: #198754;
    border-bottom: 2px solid #198754;
    padding-bottom: 5px;
    margin-bottom: 10px;
}

/* Responsivo */
@media (max-width: 768px) {
    .detail-card {
        flex-direction: column;
    }

    .image-column,
    .info-column {
        flex: 1 1 100%;
    }

    .detail-image {
        max-height: 300px;
    }
}
</style>
