@extends('layouts.app')

@section('title', 'Administrar Especies')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Paisajes naturales</h1>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($paisajes as $paisaje)
            <tr>
                <td><img src="{{ asset($paisaje->url) }}" width="100"></td>
                <td>{{$paisaje->nombres}}</td>
                <td>
                    <a href="{{ route('paisajes.show', $paisaje->id) }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-edit">Mostrar</i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $paisajes->links() }}
</div>
@endsection
