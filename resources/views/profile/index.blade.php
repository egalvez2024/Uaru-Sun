@extends('layouts.app')

@section('title', 'Mi Perfil')

@section('content')
<div class="container">
    <h1 style="color: white; text-align: center;">Mi Perfil</h1>

    <p style="color: white;"><strong>Nombre:</strong> {{ $user->name }}</p>
    <p style="color: white;"><strong>Email:</strong> {{ $user->email }}</p>

    <h2 style="color: white; text-align: center;">Mis Publicaciones</h2>

    <style>
        .card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }
        .card {
            width: 18rem;
            margin: 10px;
            border: 2px solid #4CE4A0;
            border-radius: 7px;
            overflow: hidden;
        }
        .card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
    </style>

    @if ($posts->count())
        <div class="card-container">
            @foreach ($posts as $species)
                <div class="card bg-black">
                    @if($species->image_path)
                        <img src="{{ asset('storage/' . $species->image_path) }}" alt="{{ $species->nombre }}">
                    @endif
                    <div class="card-body" style="padding: 15px;">
                        <h5 style="color: white;">{{ $species->nombre }}</h5>
                        <p style="color: white;">{{ Str::limit($species->descripcion, 80) }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p style="color: white;">No tienes publicaciones aún.</p>
    @endif
</div>
@endsection
