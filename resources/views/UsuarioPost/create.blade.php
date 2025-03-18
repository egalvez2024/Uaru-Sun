@extends('layouts.app')

@section('title', 'Nueva Especie')

@section('content')
<div class="container">
    <h1>Agregar Nueva Especie</h1>

    <form action="{{ route('UsuarioPost.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
    
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre Común</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
    
        <div class="mb-3">
            <label for="nombre_cientifico" class="form-label">Nombre Científico</label>
            <input type="text" class="form-control" id="nombre_cientifico" name="nombre_cientifico" required>
        </div>
    
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
        </div>
    
        <div class="mb-3">
            <label for="habitat" class="form-label">Hábitat</label>
            <textarea class="form-control" id="habitat" name="habitat" rows="2" required></textarea>
        </div>
    
        <div class="mb-3">
            <label for="location" class="form-label">Ubicación</label>
            <input type="text" class="form-control" id="location" name="location" required>
        </div>
    
        <div class="mb-3">
            <label for="category_id" class="form-label">Categoría</label>
            <select class="form-control" id="category_id" name="category_id" required>
                <option value="" selected disabled>Seleccione una categoría</option>
                <option value="1">Lawrence Walker (fauna)</option>
                @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->nombre }} ({{ $category->tipo }})</option>
        @endforeach
            </select>
        </div>
    
        <div class="mb-3">
            <label for="image" class="form-label">Imagen</label>
            <input type="file" class="form-control" id="image" name="image" required accept="image/*">
        </div>
    
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('UsuarioPost.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
    
</div>
@endsection