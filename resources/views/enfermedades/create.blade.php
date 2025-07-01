@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Registrar Enfermedad en Planta</h2>

    <form action="{{ route('enfermedades.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Nombre de la planta</label>
            <input type="text" name="nombre_planta" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Nombre de la enfermedad</label>
            <input type="text" name="nombre_enfermedad" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Síntomas</label>
            <textarea name="sintomas" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label>Causas (opcional)</label>
            <textarea name="causas" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label>Solución</label>
            <textarea name="solucion" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label>Imagen (opcional)</label>
            <input type="file" name="imagen" id="imagen" class="form-control" accept="image/*">
            <div class="mt-3">
                <img id="preview" src="#" alt="Previsualización de imagen" style="display: none; max-width: 250px; border-radius: 10px;">
            </div>
        </div>

        <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('enfermedades.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Regresar
            </a>
            <button class="btn btn-success">
                <i class="fas fa-save"></i> Guardar
            </button>
        </div>
    </form>
</div>

<script>
    document.getElementById('imagen').addEventListener('change', function(event) {
        const [file] = event.target.files;
        const preview = document.getElementById('preview');
        if (file) {
            preview.src = URL.createObjectURL(file);
            preview.style.display = 'block';
        } else {
            preview.src = '#';
            preview.style.display = 'none';
        }
    });
</script>
@endsection
