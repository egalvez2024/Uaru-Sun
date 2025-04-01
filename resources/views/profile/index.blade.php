@extends('layouts.app')

@section('title', 'Mi Perfil')

@section('content')
<div class="container">

<style>
        .text-center {
            margin-top: 80px; /* Ajusta este valor según sea necesario */
        }
    </style>

    <div class="text-center mb-4">
        <h1 class="mb-4 text-white" class="display-4 text-success">
            <i class="fas fa-leaf"></i> MI PERFIL
        </h1>
    </div>


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
            border: 2px solid #4CE4A0; /* Cambia el color y el grosor según tus necesidades */
            border-radius: 7px; /* Opcional: para esquinas redondeadas */
        }
    </style>


@if ($posts->count())

    <div class="card-container">
        <div class="card">
            <div class="card-body">
            <ul>
        @foreach ($posts as $post)
            <li>{{ $post->title }}</li>
        @endforeach
    </ul>
            </div>
                
        </div>

        <div class="card">
            <div class="card-body">
            <ul>
        @foreach ($posts as $post)
            <li>{{ $post->title }}</li>
        @endforeach
    </ul>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
            <ul>
        @foreach ($posts as $post)
            <li>{{ $post->title }}</li>
        @endforeach
    </ul>
            </div>
        </div>
    </div>
@else
    <p style="color: white;">No tienes publicaciones aún.</p>
@endif
    
@endsection