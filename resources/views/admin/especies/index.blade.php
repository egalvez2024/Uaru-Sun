@extends('layouts.app')

@section('title', 'Administrar Especies')

@section('content')
<!-- Fondo de pantalla completo -->
<style>
    body {
        background: url('{{ asset('images/fonds.jpg') }}') no-repeat center center fixed;
        background-size: cover;
    }
    .content-box {
        background-color: rgba(255, 255, 255, 0.6); /* Fondo más transparente */
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 15px rgba(255, 255, 255, 0.4); /* Efecto de transparencia en los bordes */
    }
    .action-buttons a, .action-buttons button {
        width: 100%; /* Hace que los botones ocupen el ancho completo de la celda */
        margin: 2px 0;
        font-size: 12px; /* Reducir el tamaño de los botones */
    }

    /* Estilo para la tabla con tamaño fijo */
    table {
        table-layout: fixed; /* Hace que las columnas tengan el mismo tamaño */
        width: 100%; /* Asegura que la tabla ocupe todo el ancho disponible */
    }
    td, th {
        overflow: hidden; /* Evita que el contenido se desborde */
        text-overflow: ellipsis; /* Agrega '...' cuando el contenido es demasiado largo */
        white-space: nowrap; /* Evita que el texto se divida en varias líneas */
        padding: 10px;
    }

    /* Estilo específico para la imagen */
    .image-cell {
        width: 20%;
    }
    .name-cell {
        width: 35%;
    }
    /* Columna de Hábitat con truncamiento */
    .habitat-cell {
        width: 35%;
        text-overflow: ellipsis;
        overflow: hidden;
        white-space: nowrap;
    }
    .action-cell {
        width: 20%; /* Ajustamos el tamaño de la columna de acciones */
        text-align: center;
        vertical-align: top; /* Asegura que los botones se alineen en la parte superior */
    }

    /* Estilo para apilar botones y ajustarlos */
    .action-buttons {
        display: flex;
        flex-direction: column; /* Hace que los botones se apilen verticalmente */
        align-items: center;
    }

    .action-buttons a, .action-buttons button {
        margin: 5px 0; /* Espaciado entre los botones */
    }

    /* Tooltip al pasar el mouse sobre contenido largo */
    .habitat-cell:hover {
        overflow: visible;
        white-space: normal;
        background-color: #f0f0f0;
    }
</style>

<div class="container mt-4">
    <div class="content-box">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Administrar Especies</h1>
            <a href="{{ route('admin.especies.create') }}" class="btn btn-success">
                <i class="fas fa-plus"></i> Nueva Especie
            </a>
        </div>

        <!-- Mostrar el filtro solo si el usuario es un administrador -->
        @can('admin') <!-- Aquí se verifica si el usuario tiene permisos de administrador -->
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
        @endcan

        @if(session('success'))
            <div class="alert alert-success bg-dark text-white border-secondary">{{ session('success') }}</div>
        @endif

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Hábitat</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($species as $specie)
                <tr>
                    <!-- Imagen más grande -->
                    <td class="image-cell">
                        <img src="{{ asset('storage/' . $specie->image_path) }}" class="rounded" style="width: 120px; height: 120px; object-fit: cover;">
                    </td>
                    <!-- Nombre ajustado -->
                    <td class="name-cell">{{ $specie->nombre }}</td>
                    <!-- Hábitat ajustado, truncado si es necesario -->
                    <td class="habitat-cell" title="{{ $specie->habitat }}">{{ $specie->habitat }}</td>

                    <!-- Columna de acciones con botones apilados verticalmente -->
                    <td class="action-cell">
                        <div class="action-buttons">
                            @can('edit-species') <!-- Solo los usuarios con el permiso 'edit-species' pueden ver este botón -->
                                <a href="{{ route('admin.especies.edit', $specie->id) }}" class="btn btn-sm btn-success">Editar</a>
                            @endcan

                            @can('delete-species') <!-- Solo los usuarios con el permiso 'delete-species' pueden ver este botón -->
                                <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="{{ $specie->id }}">Eliminar</button>
                            @endcan

                            <a href="{{ route('comentarios.create', $specie->id) }}" class="btn btn-sm btn-success" style="background-color: #28a745;">Comentarios</a>
                        </div>
                    </td>
                </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">No hay especies.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{ $species->appends(request()->query())->links() }}
    </div>
</div>

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
