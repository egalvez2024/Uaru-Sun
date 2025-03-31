@extends('layouts.app')

@section('title', 'Administrar Especies')

@section('content')
<div class="container">
    <div class="container bg-light p-4 rounded">
    <div class="container bg-light p-4 rounded">

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
        <div class="alert alert-success bg-dark text-white border-secondary">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Imagen</th>
                <th>Nombre Común</th>
                <th>Hábitat</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($species as $specie)
            <tr>
                <td><img src="{{ asset('storage/' . $specie->image_path) }}" width="80" class="rounded"></td>
                <td>{{ $specie->nombre }}</td>
                <td>{{ $specie->habitat }}</td>
                <td>
                    <a href="{{ route('admin.especies.edit', $specie->id) }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-edit">Editar</i>
                    </a>
                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="{{ $specie->id }}">
                        <i class="fas fa-trash">Eliminar</i>
                    </button>
                    <a href="{{ route('comentarios.create', $specie->id) }}" class="btn btn-sm btn-info">Agregar comentarios</a>
                </td>
            </tr>
            @empty
                <td colspan="4" class="text-center">No hay especies.</td>
            @endforelse
        </tbody>
    </table>

    {{ $species->appends(request()->query())->links() }}
</div>

<div class="container" style="background-color: #f5f5f5; padding: 20px; border-radius: 10px;">


<!-- Modal de confirmación de eliminación -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirmar Eliminación</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ¿Estás seguro de que deseas eliminar esta especie?
            </div>
            <div class="modal-footer">
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var deleteModal = document.getElementById("deleteModal");
        deleteModal.addEventListener("show.bs.modal", function(event) {
            var button = event.relatedTarget;
            var id = button.getAttribute("data-id");
            var form = document.getElementById("deleteForm");
            form.action = "/admin/especies/" + id;
        });
    });
</script>
@endsection