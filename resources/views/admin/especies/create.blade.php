@extends('layouts.app')

@section('title', 'Nueva Especie')

@section('content')
<style>
    body {
        background-image: url('{{ asset('images/fonds.jpg') }}');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
    }

    .form-container {
        background-color: rgba(255, 255, 255, 0.95);
        padding: 40px;
        border-radius: 20px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        max-width: 800px;
        margin: 50px auto;
    }

    .form-label {
        font-weight: 600;
        color: #333;
    }

    .form-control {
        border-radius: 10px;
        border: 1px solid #ccc;
    }

    textarea.form-control {
        resize: none;
    }

    .btn-primary {
        background-color: #28a745;
        border-color: #28a745;
        border-radius: 10px;
        padding: 10px 30px;
        font-weight: bold;
    }

    .btn-secondary {
        border-radius: 10px;
        padding: 10px 30px;
        font-weight: bold;
    }

    h1 {
        color: #2c3e50;
        font-weight: 700;
        text-align: center;
        margin-bottom: 30px;
    }

    .btn-group {
        display: flex;
        justify-content: space-between;
        gap: 15px;
        margin-top: 20px;
    }

</style>

<div class="container">
    <div class="form-container">
        <h1>Agregar Nueva Especie</h1>

        <form action="{{ route('admin.especies.store') }}" method="POST" enctype="multipart/form-data">
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
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->nombre }} ({{ $category->tipo }})</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Imagen</label>
                <input type="file" class="form-control" id="image" name="image" required accept="image/*">
            </div>

            <div class="btn-group">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="{{ route('admin.especies.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection
