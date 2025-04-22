@extends('layouts.app')

@section('title', isset($paisaje) ? 'Editar Paisaje' : 'Crear Paisaje')

@section('content')
    <div class="container" style="margin-top: 50px">
        <h1>{{ isset($paisaje) ? 'Editar Paisaje: ' . $paisaje->nombres : 'Crear Nuevo Paisaje' }}</h1>
        <hr>

        <form action="{{ isset($paisaje) ? route('paisajes.update', $paisaje->id) : route('paisajes.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($paisaje))
                @method('PUT')
            @endif

            <div class="mb-3">
                <label for="nombres" class="form-label">Nombre del Paisaje</label>
                <input type="text" class="form-control @error('nombres') is-invalid @enderror" id="nombres" name="nombres"
                       value="{{ old('nombres', $paisaje->nombres ?? '') }}" maxlength="100" placeholder="Ejemplo: Bosque Nuboso">
                @error('nombres')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label for="url" class="form-label">Imagen del paisaje</label>
                <input type="file" class="form-control @error('imagen') is-invalid @enderror" id="imagen" name="imagen">
                @error('imagen')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>



            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion" rows="3" maxlength="200">{{ old('descripcion', $paisaje->descripcion ?? '') }}</textarea>
                @error('descripcion')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label for="ubicacion" class="form-label">Ubicación</label>
                <textarea class="form-control @error('ubicacion') is-invalid @enderror" id="ubicacion" placeholder="Ejemplo: https://www.google.com/maps/place/Ubicacion..." name="ubicacion" rows="2" maxlength="400">{{ old('ubicacion', $paisaje->ubicacion ?? '') }}</textarea>
                @error('ubicacion')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <hr>
            <h4 class="mt-4">🌿 Flora</h4>
            <input type="hidden" name="flora_tipo" value="flora">
            <div class="mb-3">
                <label for="flora_nombre" class="form-label">Nombre de la Flora</label>
                <input type="text" class="form-control @error('flora_nombre') is-invalid @enderror" id="flora_nombre" name="flora_nombre"
                       value="{{ old('flora_nombre', $flora->nombre ?? '') }}" maxlength="100" placeholder="Ejemplo: Helechos, Bromelias">
                @error('flora_nombre')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <hr>

            <h4 class="mt-4">🦜 Fauna</h4>
            <input type="hidden" name="fauna_tipo" value="fauna">
            <div class="mb-3">
                <label for="fauna_nombre" class="form-label">Nombre de la Fauna</label>
                <input type="text" class="form-control @error('fauna_nombre') is-invalid @enderror" id="fauna_nombre" name="fauna_nombre"
                       value="{{ old('fauna_nombre', $fauna->nombre ?? '') }}" maxlength="100" placeholder="Ejemplo: Tucanes, Monos aulladores">
                @error('fauna_nombre')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <hr>
            <button type="submit" class="btn btn-success">{{ isset($paisaje) ? 'Actualizar Paisaje' : 'Guardar Paisaje' }}</button>
            <a href="{{ route('paisajes.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>

    <script>
        document.getElementById('url').addEventListener('input', function () {
            const url = this.value;//Se obtiene el valor del entorno con el this, en este caso es el del input
            const img = document.getElementById('vista_previa');
            const container = document.getElementById('contenedor_imagen');

            if (url.match(/\.(jpeg|jpg|gif|png|webp|bmp)$/i)) {
                img.src = url;
                container.style.display = 'block';
            } else {
                container.style.display = 'none';
                img.src = '';
            }
        });
    </script>
@endsection
