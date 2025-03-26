@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4" style="font-family: 'Roboto', sans-serif; color:rgb(233, 238, 244);">Tipo de especies Anfibios</h1>

        @if($especies->isEmpty())
            <p style="font-family: 'Roboto', sans-serif; color:rgb(242, 237, 244);">No hay especies registradas en la categoría de Anfibios.</p>
        @else
            <div class="row">
                @foreach($especies as $especie)
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title" style="font-family: 'Roboto', sans-serif; color: #2c3e50;">{{ $especie->nombre }}</h5>
                                <p class="card-text" style="font-family: 'Roboto', sans-serif; color: #34495e;"><strong>Nombre Científico:</strong> {{ $especie->nombre_cientifico }}</p>
                                <p class="card-text" style="font-family: 'Roboto', sans-serif; color: #34495e;"><strong>Hábitat:</strong> {{ $especie->habitat }}</p>
                                <p class="card-text" style="font-family: 'Roboto', sans-serif; color: #34495e;"><strong>Ubicación:</strong> {{ $especie->ubicacion }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
