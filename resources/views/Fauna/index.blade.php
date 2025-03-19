@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Especies de Fauna</h1>

        @if($especies->isEmpty())
            <p>No hay especies registradas en la categoría de fauna.</p>
        @else
            <div class="row">
                @foreach($especies as $especie)
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $especie->nombre }}</h5>
                                <p class="card-text"><strong>Nombre Científico:</strong> {{ $especie->nombre_cientifico }}</p>
                                <p class="card-text"><strong>Hábitat:</strong> {{ $especie->habitat }}</p>
                                <p class="card-text"><strong>Ubicación:</strong> {{ $especie->ubicacion }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
