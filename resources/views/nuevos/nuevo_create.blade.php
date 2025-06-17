@extends('layouts.app')

@section('title', 'Sugerir Nueva Sección')

@section('content')
    <div class="container" style="margin-top: 50px">

        <div class="alert alert-info">
            <strong>Queremos mejorar:</strong> Ayúdanos a mejorar el sistema de biodiversidad en Honduras sugiriendo nuevas secciones o funcionalidades que consideres importantes.
        </div>

        <hr>

        <form action="{{ route('nuevos.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="dato" class="form-label">¿Qué sección crees que deberíamos agregar?</label>
                <textarea class="form-control @error('dato') is-invalid @enderror" id="dato" name="dato" rows="3" maxlength="150"
                          placeholder="Ejemplo: Añadir una sección para monitoreo de especies invasoras, catálogo de flora por región, etc.">{{ old('dato') }}</textarea>
                @error('dato')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <hr>
            <button type="submit" class="btn btn-success">Enviar Sugerencia</button>
            <a href="{{ route('home') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
