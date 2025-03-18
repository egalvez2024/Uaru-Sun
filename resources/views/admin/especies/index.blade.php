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

    <form method="GET" action="{{ route('admin.especies.index') }}">
        <div class="row">
            <div class="col-2">
                <select class="form-select" name="filtro">
                    <option value="nombre_comun" {{ request('filtro') == 'nombre_comun' ? 'selected' : '' }}>Nombre Común</option>
                    <option value="habitat" {{ request('filtro') == 'habitat' ? 'selected' : '' }}>Hábitat</option>
                </select>
            </div>
            <div class="col-9">
                <input type="text" class="form-control" name="query" value="{{ request('query') }}" placeholder="Buscar especie">
            </div>
            <div class="col-1">
                <button type="submit" class="btn btn-primary">Buscar</button>
            </div>
        </div>
    </form>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Imagen</th>
                <th>Nombre Común</th>
                <th>Habitat</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($species as $specie)
            <tr>
                <td><img src="{{ asset('storage/' . $specie->image_path) }}" width="80"></td>
                <td>{{ $specie->nombre }}</td>
                <td>{{ $specie->habitat }}</td>
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
            @empty
                <td colspan="4" style="text-align: center">No hay especies.</td>
            @endforelse
        </tbody>
    </table>

    {{ $species->appends(request()->query())->links() }}
</div>
@endsection
