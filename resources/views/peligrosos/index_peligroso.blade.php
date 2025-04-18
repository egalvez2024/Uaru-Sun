@extends('layouts.app')

@section('title', 'Administrar Peligrosos')

@section('content')
    <style>
        .text-center {
            margin-top: 50px;
        }

        .custom-table {
            width: 100%;
            background: rgba(30,28,28,0.67);
            color: white;
            font-size: 18px;
            border-collapse: collapse;
        }

        .custom-table thead {
            background-color: rgba(30,28,28,0.87);
            font-weight: bold;
        }

        .custom-table th, .custom-table td {
            padding: 15px;
        }

        .custom-table td img {
            max-width: 100%;
            height: auto;
        }

        .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        .custom-table .pagination {
            margin-top: 20px;
            text-align: center;
        }

        .no-records td {
            text-align: center;
            font-style: italic;
        }

    </style>

    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4" style="margin-top: 50px">
            <h1 style="color: white; text-align: center;">Animales peligrosos</h1>
        </div>

             <!-- Menú desplegable -->
    <div class="d-flex justify-content-end mb-4">
        <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                Seleccionar Categoría
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <li><a class="dropdown-item" href="{{ route('peligro.index') }}">Peligro de Extinción</a></li>
                <li><a class="dropdown-item" href="{{ route('anfibio.index') }}">Grupo de Anfibios</a></li>
                <li><a class="dropdown-item" href="{{ route('aves.index') }}">Grupo de Aves</a></li>
                <li><a class="dropdown-item" href="{{ route('mamiferos.index') }}">Grupo de Mamiferos</a></li>
            </ul>
        </div>
    </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <table class="custom-table">
                <thead>
                <tr>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Características</th>
                    <th>Clasificación</th>
                </tr>
                </thead>
                <tbody>
                @forelse($peligrosos as $peligroso)
                    <tr>
                        <td><img src="{{ asset($peligroso->imagen) }}" width="100"></td>
                        <td>{{$peligroso->nombre}}</td>
                        <td>{{$peligroso->caracteristicas}}</td>
                        <td>{{$peligroso->tipo}}</td>
                    </tr>
                @empty
                    <tr class="no-records">
                        <td colspan="4">No hay animales peligrosos registrados.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        {{ $peligrosos->links() }}
    </div>
@endsection
