@extends('layouts.app')

@section('title', 'Editar Especie')

@section('content')
<div class="container">
    <h1>Editar {{ $species->common_name }}</h1>

    <form action="{{ route('admin.especies.update', $species->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Campos iguales al create pero con value="{{ old('field', $species->field) }}" -->
        
        <div class="mb-3">
            <label>Imagen Actual</label>
            <img src="{{ asset('storage/' . $species->image_path) }}" width="150" class="d-block mb-2">
            <input type="file" class="form-control" name="image">
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form> 
</div>
@endsection