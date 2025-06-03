@extends('layouts.app')

@section('title', 'Bitácora')

@section('content')
<div class="container mt-4">
   
        <h1 class="mb-3 text-white">Bitácora del Sistema</h1>


    @if($registros->isEmpty())
       <p class="text-white">No hay registros para mostrar.</p>
    @else
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Usuario</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            @foreach($registros as $registro)
            <tr>
                <td>{{ $registro->fecha }}</td>
                <td>{{ $registro->usuario }}</td>
                <td>{{ $registro->accion }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
@endsection
