@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4 text-white">Especies en peligro de Extinción</h1>

        @if($especies->isEmpty())
            <p class="text-white">No hay especies registradas en los animales en peligro de extincion.</p>
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
