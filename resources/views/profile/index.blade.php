@extends('layouts.app')

@section('title', 'Mi Perfil')

@section('content')
<div class="container">
    {{-- IMPORTAR FONT AWESOME PARA ÍCONOS --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


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

    <!-- Título de publicaciones -->

    <h2 style="color: white; text-align: center; margin-top: 30px;">Mis Publicaciones</h2>


    
@if($especies->isEmpty())
 <p style="color: white; text-align: center; margin-top: 30px;">No hay especies registradas.</p>
@else
    <div class="gallery-grid">
        @foreach($especies as $especie)
             <div class="custom-card">
                <img src="{{ route('catalogo.show', $especie->id) }}" alt="{{ $especie->nombre }}">
                 <div class="custom-card-body">
                    <h5>{{ $especie->nombre }}</h5>
                    <p>{{ $especie->descripcion }}</p>
                </div>
            </div>
        @endforeach
    </div>
@endif


</div>

{{-- MODAL PARA IMÁGENES --}}
<div id="myModal" class="modal">
    <span class="close" onclick="closeModal()">&times;</span>
    <img class="modal-content" id="img01">
    <button class="close-button" onclick="closeModal()">Cerrar</button>
</div>

{{-- SCRIPTS --}}
<script>
    function openModalWithSrc(src) {
        const modal = document.getElementById("myModal");
        const modalImg = document.getElementById("img01");
        modal.style.display = "flex";
        modalImg.src = src;
    }

    function closeModal() {
        document.getElementById("myModal").style.display = "none";
    }

    document.addEventListener("DOMContentLoaded", function () {
        const avatar = document.getElementById("avatar-profile");
        if (avatar) {
            avatar.addEventListener("click", () => {
                const img = avatar.querySelector("img");
                if (img) openModalWithSrc(img.src);
            });
        }

        document.querySelectorAll(".modal-trigger").forEach(el => {
            el.addEventListener("click", () => {
                const src = el.getAttribute("data-src");
                if (src) openModalWithSrc(src);
            });
        });

        document.addEventListener("keydown", function (event) {
            if (event.key === "Escape") {
                closeModal();
            }
        });

        const modal = document.getElementById("myModal");
        modal.addEventListener("click", function (event) {
            if (event.target === modal) {
                closeModal();
            }
        });
    });
</script>
@endsection
