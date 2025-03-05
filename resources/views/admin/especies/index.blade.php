@extends('layouts.app')

@section('title', 'Administrar Especies')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Administrar Especies</h1>
        <a href="{{ route('admin.especies.create') }}" class="btn btn-success">
            <i class="fas fa-plus"></i> Nueva Especie
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Imagen</th>
                <th>Nombre Común</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($species as $specie)
            <tr>
                <td><img src="{{ asset('storage/' . $specie->image_path) }}" width="80"></td>
                <td>{{ $specie->nombre }}</td>
                <td>
                    <a href="{{ route('admin.especies.edit', $specie->id) }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-edit">Editar</i>
                    </a>
                    <form action="{{ route('admin.especies.destroy', $specie->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar especie?')">
                            <i class="fas fa-trash">Eliminar</i>
                        </button>
                    </form>
                    <a href="{{ route('comentarios.create', $specie->id) }}" class="btn btn-sm btn-primary">Agregar comentarios</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $species->links() }}
</div>
@endsection
