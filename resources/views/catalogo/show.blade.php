@extends('layouts.app')

@section('title', $specie->nombre)

@section('content')
<div class="container">
    <div class="species-detail">
        <img src="{{ asset('storage/' . $specie->image_path) }}" alt="{{ $specie->common_name }}" class="detail-image">
        
        <div class="species-info">
            <h1>{{ $specie->nombre }}</h1>
            <h2><em>{{ $specie->nombre_cientifico }}</em></h2>
            
            <div class="info-section">
                <h3>Hábitat</h3>
                <p>{{ $specie->habitat }}</p>
            </div>

            <div class="info-section">
                <h3>Descripción</h3>
                <p>{{ $specie->descripcion }}</p>
            </div>

            <div class="location">
                <h3>Ubicación en Honduras</h3>
                <p>{{ $specie->location }}</p>
                <!-- Aquí podrías integrar un mapa con Leaflet/Google Maps -->
            </div>
        </div>
    </div>
</div>
@endsection

<style>
.species-detail {
    display: grid;
    grid-template-columns: 1fr 2fr;
    gap: 30px;
    padding: 20px;
}

.detail-image {
    width: 100%;
    max-height: 500px;
    object-fit: cover;
    border-radius: 10px;
}

.species-info h1 {
    color: #2c3e50;
    margin-bottom: 5px;
}

.species-info h2 {
    color: #7f8c8d;
    margin-bottom: 25px;
}

.info-section {
    margin-bottom: 25px;
}

.info-section h3 {
    color: #27ae60;
    border-bottom: 2px solid #27ae60;
    padding-bottom: 5px;
    margin-bottom: 10px;
}
</style>