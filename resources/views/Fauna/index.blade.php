@extends('layouts.app')

@section('content')

<div class="container">

    <!-- Menú desplegable -->
    <div class="d-flex justify-content-end mb-4">
    <div class="dropdown">
        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
            Seleccionar Categoría
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <li><a class="dropdown-item" href="{{ route('peligro.index') }}">Peligro de Extincion</a></li>
            <li><a class="dropdown-item" href="{{ route('anfibio.index') }}">Grupo de Anfibios</a></li>
            <li><a class="dropdown-item" href="{{ route('arboles.index') }}">Grupo de Arboles</a></li>
        </ul>
    </div>
</div>

    @foreach($especies as $especie)
        <div class="col-md-4 mb-3">
            <div class="card">
                @if($especie->imagen)
                    <img src="{{ asset('storage/' . $especies->imagen) }}" class="card-img-top" alt="Imagen de {{ $especie->nombre }}">
                @else
                @endif
                <div class="card-body">
                    <h5 class="card-title" style="font-family: 'Roboto', sans-serif; color: #2c3e50;">{{ $especie->nombre }}</h5>
                    <p class="card-text"><strong>Nombre Científico:</strong> {{ $especie->nombre_cientifico }}</p>
                    <p class="card-text"><strong>Hábitat:</strong> {{ $especie->habitat }}</p>
                    <p class="card-text"><strong>Ubicación:</strong> {{ $especie->ubicacion }}</p>
                </div>
            </div>
        </div>
    @endforeach
</div>

@endsection
