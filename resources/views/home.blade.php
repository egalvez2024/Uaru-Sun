@extends('layouts.app')

@section('title', 'Inicio - Flora y Fauna de Honduras')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-12 text-center mb-4">
            <h1 class="display-4 text-success">
                <i class="fas fa-leaf"></i> Biodiversidad Hondureña
            </h1>
            <p class="lead">Descubre nuestra riqueza natural</p>
        </div>

        @foreach($species as $specie)
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow">
                <img src="{{ asset('storage/' . $specie->image_path) }}" 
                     class="card-img-top" 
                     alt="{{ $specie->nombre }}"
                     style="height: 200px; object-fit: cover;">
                
                <div class="card-body">
                    <h5 class="card-title">{{ $specie->nombre }}</h5>
                    <p class="text-muted">
                        <em>{{ $specie->nombre_cientifico }}</em>
                        @if ($specie->category)
                            <span class="badge bg-success">
                                {{ $specie->category->nombre }} ({{ $specie->category->tipo }})
                            </span>
                        @else
                            <span class="badge bg-warning">Sin categoría</span>
                        @endif
                    </p>
                    
                    
                    <a href="{{ route('catalogo.show', $specie->id) }}" 
                       class="btn btn-success">
                        Ver detalles <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection