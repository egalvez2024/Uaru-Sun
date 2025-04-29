@extends('layouts.app')

@section('title', 'Actualizar Información')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg border-0 rounded-4 p-4 bg-light">
        <h3 class="text-center mb-4">
            <i class="fas fa-user-edit me-2 text-success"></i>Actualizar Información de {{ $usuario->name }}
        </h3>

        <form action="{{ isset($informacion) ? route('informacion.update', $informacion->id) : route('informacion.store') }}"
              method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($informacion))
                @method('PUT')
            @endif

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="usuario_name" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="usuario_name" name="usuario_name"
                           value="{{ isset($informacion) ? $usuario->name : old('usuario_name') }}" maxlength="100">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">Correo electrónico</label>
                    <input type="email" class="form-control" id="email" name="email"
                           value="{{ isset($informacion) ? $usuario->email : old('email') }}" maxlength="100">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="preferencias" class="form-label">Preferencias</label>
                    <input type="text" class="form-control" id="preferencias" name="preferencias"
                           value="{{ isset($informacion) ? $informacion->preferencias : old('preferencias') }}"
                           placeholder="Ejemplo: Flora, Fauna">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
                    <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento"
                           value="{{ isset($informacion) ? $informacion->fecha_nacimiento : old('fecha_nacimiento') }}">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="alias" class="form-label">Alias</label>
                    <input type="text" class="form-control" id="alias" name="alias"
                           value="{{ isset($informacion) ? $informacion->alias : old('alias') }}" maxlength="30">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="text" class="form-control" id="telefono" name="telefono"
                           value="{{ isset($informacion) ? $informacion->telefono : old('telefono') }}"
                           placeholder="Ejemplo: +504 9876-5432" maxlength="15">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="animal_favorito" class="form-label">Animal Favorito</label>
                    <input type="text" class="form-control" id="animal_favorito" name="animal_favorito"
                           value="{{ isset($informacion) ? $informacion->animal_favorito : old('animal_favorito') }}"
                           placeholder="Ejemplo: Perro" maxlength="30">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="ocupacion" class="form-label">Ocupación</label>
                    <input type="text" class="form-control" id="ocupacion" name="ocupacion"
                           value="{{ isset($informacion) ? $informacion->ocupacion : old('ocupacion') }}"
                           placeholder="Ejemplo: Ingeniero de Software" maxlength="30">
                </div>
            </div>

            <div class="mb-3">
                <label for="foto_perfil" class="form-label">Foto de Perfil</label>
                <input type="file" class="form-control" id="foto_perfil" name="foto_perfil" onchange="previewImage(event)">
                <div class="mt-3 text-center">
                    <img id="preview" src="{{ isset($informacion) && $informacion->foto_perfil ? asset('storage/' . $informacion->foto_perfil) : '#' }}"
                         alt="Vista previa de la imagen"
                         class="img-thumbnail rounded-circle shadow" style="display: {{ isset($informacion) && $informacion->foto_perfil ? 'block' : 'none' }}; max-width: 150px;">
                </div>
            </div>

            <input type="hidden" name="user_id" value="{{ $usuario->id }}">

            <div class="text-center mt-4">
                <button type="submit" class="btn btn-success px-4">
                    <i class="fas fa-save me-2"></i>{{ isset($informacion) ? 'Actualizar' : 'Guardar' }}
                </button>
                <a href="{{ route('profile.index') }}" class="btn btn-secondary ms-2 px-4">
                    <i class="fas fa-arrow-left me-2"></i>Cancelar
                </a>
            </div>
        </form>
    </div>
</div>

<script>
    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function () {
            const output = document.getElementById('preview');
            output.src = reader.result;
            output.style.display = 'block';
        };
        if (event.target.files.length > 0) {
            reader.readAsDataURL(event.target.files[0]);
        }
    }
</script>
@endsection
