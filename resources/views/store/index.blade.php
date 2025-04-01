@extends('layouts.app')

@section('title', 'Tienda')

@section('content')
<div class="container">
    <ul>
    <style>
        .text-center {
            margin-top: 80px; /* Ajusta este valor según sea necesario */
        }
    </style>

    <div class="text-center mb-4">
        <h1 class="mb-4 text-white" class="display-4 text-success">
            <i class="fas fa-leaf"></i> Bienvenido a la Lista de Tiendas
        </h1>
    </div>

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

    <ul>

    <div class="card-container">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">kokoro's PetShop HN </h5>
                <a href="https://kokoroshn.com/" class="card-link">Abrir Link</a>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">El Canario Pet Shop</h5>
                <a href="https://elcanariohn.com/" class="card-link">Abrir Link</a>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Super Mascota Honduras</h5>
                <a href="https://www.supermascota.hn/?from=AppAgg.com" class="card-link">Abrir Link</a>
            </div>
        </div>
    </div>
    <div class="card-container">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">daFlores</h5>
                <a href="https://flowers.daflores.com/honduras/" class="card-link">Abrir Link</a>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">LatinFlores</h5>
                <a href="https://latinflores.com/collections/flores-a-honduras" class="card-link">Abrir Link</a>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">JardinFloral</h5>
                <a href="https://www.jardinfloral.com/honduras/" class="card-link">Abrir Link</a>
            </div>
        </div>
    </div>

    <div class="card-container">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Jetstereo</h5>
                <a href="https://www.jetstereo.com/category/camaras" class="card-link">Abrir Link</a>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">La Tienda del Fotógrafo</h5>
                <a href="https://latiendadelfotografohn.com/categoria-producto/camaras/" class="card-link">Abrir Link</a>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">RadioShack</h5>
                <a href="https://www.radioshackla.com/honduras/c/fotografia/camaras" class="card-link">Abrir Link</a>
            </div>
        </div>
    </div>
       
    </ul>
    </ul>
</div>
@endsection
