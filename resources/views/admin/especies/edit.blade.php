@extends('layouts.app')

@section('title', 'Editar Especie')

@section('content')
<div class="container">
    <h1>Editar {{ $species->nombre }}</h1>

    <form action="{{ route('admin.especies.update', $species->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Nombre común -->
        <div class="mb-3">
            <label>Nombre Común</label>
            <input type="text" class="form-control" name="nombre" value="{{ old('nombre', $species->nombre) }}" required>
        </div>

        <!-- Nombre Científico -->
        <div class="mb-3">
            <label>Nombre Científico</label>
            <input type="text" class="form-control" name="nombre_cientifico" value="{{ old('nombre_cientifico', $species->nombre_cientifico) }}" required>
        </div>

        <!-- Descripción -->
        <div class="mb-3">
            <label>Descripción</label>
            <textarea class="form-control" name="descripcion" required>{{ old('descripcion', $species->descripcion) }}</textarea>
        </div>

        <!-- Hábitat -->
        <div class="mb-3">
            <label>Hábitat</label>
            <input type="text" class="form-control" name="habitat" value="{{ old('habitat', $species->habitat) }}" required>
        </div>

        <!-- Ubicación -->
        <div class="mb-3">
            <label>Ubicación</label>
            <input type="text" class="form-control" name="location" value="{{ old('location', $species->location) }}" required>
        </div>

        <!-- Imagen -->
        <div class="mb-3">
            <label>Imagen Actual</label>
            <img src="{{ asset('storage/' . $species->image_path) }}" width="150" class="d-block mb-2">
            <input type="file" class="form-control" name="image">
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form> 
</div>
@endsection
