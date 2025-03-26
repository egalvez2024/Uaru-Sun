@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4" style="color: white !important;">Riquesa en area verde</h1>

        @if($especies->isEmpty())
            <p style="color: white !important;">No hay publicaciones registradas.</p>
        @else
            <div class="row">
                @foreach($especies as $especie)
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <!-- Verificar si existe una imagen y mostrarla -->
                                @if($especie->imagen)
                                    <img src="{{ asset('storage/' . $especie->imagen) }}" class="card-img-top" alt="Imagen de {{ $especie->nombre }}" style="height: 200px; object-fit: cover;">
                                @else
                                    <img src="default-image.jpg" class="card-img-top" alt="Imagen no disponible" style="height: 200px; object-fit: cover;">
                                @endif
                                <h5 class="card-title" style="color: blue !important;">{{ $especie->nombre }}</h5>
                                <p class="card-text" style="color: green !important;"><strong>Nombre Científico:</strong> {{ $especie->nombre_cientifico }}</p>
                                <p class="card-text" style="color: brown !important;"><strong>Hábitat:</strong> {{ $especie->habitat }}</p>
                                <p class="card-text" style="color: purple !important;"><strong>Ubicación:</strong> {{ $especie->ubicacion }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
