@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4 text-white">Grupo de arboles</h1>

    @if($especies->isEmpty())
        <p class="text-white">No hay especies registradas en este grupo.</p>
    @else
        <div class="gallery-grid">
            @foreach($especies as $especie)
                <a href="{{ route('catalogo.show', $especie->id) }}" class="custom-card text-dark">
                    <img src="{{ asset('storage/' . $especie->image_path) }}" alt="{{ $especie->nombre }}">
                    <div class="custom-card-body">
                        <h5>{{ $especie->nombre }}</h5>
                        <p><em>{{ $especie->nombre_cientifico }}</em></p>
                        <p><strong>Hábitat:</strong> {{ $especie->habitat }}</p>
                        <p><strong>Ubicación:</strong> {{ $especie->ubicacion }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    @endif
</div>
@endsection
