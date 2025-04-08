@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4 text-white">Grupo De Faunas</h1>
         <!-- Menú desplegable -->
    <div class="d-flex justify-content-end mb-4">
        <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                Divicion de Fauna
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <li><a class="dropdown-item" href="{{ route('peligro.index') }}">Peligro de Extinción</a></li>
                <li><a class="dropdown-item" href="{{ route('anfibio.index') }}">Grupo de Anfibios</a></li>
                <li><a class="dropdown-item" href="{{ route('arboles.index') }}">Grupo de Árboles</a></li>
            </ul>
        </div>
    </div>

        @if($especies->isEmpty())
            <p class="text-white">No hay especies registradas en este grupo.</p>
        @else
            <div class="row">
                @foreach($especies as $especie)
                    <div class="col-md-4 mb-3">
                        <div class="card h-100 d-flex flex-column">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title text-primary">{{ $especie->nombre }}</h5>
                                <p class="card-text text-success"><strong>Nombre Científico:</strong> {{ $especie->nombre_cientifico }}</p>
                                <p class="card-text text-danger"><strong>Hábitat:</strong> {{ $especie->habitat }}</p>
                                <p class="card-text text-purple"><strong>Ubicación:</strong> {{ $especie->ubicacion }}</p>
                                <div class="mt-auto text-center">
                                    <img src="{{ asset('storage/' . $especie->image_path) }}" class="img-fluid rounded" style="max-height: 150px;">
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
