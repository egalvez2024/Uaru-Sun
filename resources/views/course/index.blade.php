@extends('layouts.app')

@section('title', 'Cursos')

@section('content')
<style>
        .text-center {
            margin-top: 80px; /* Ajusta este valor según sea necesario */
        }
    </style>
     <div class="text-center mb-4">
     <h1 style="color: white; text-align: center;">Bienvenido a la Lista de Cursos</h1>
    <p style="color: white; text-align: center;">Mucho leer y bien entender, el mejor camino para aprender.</p>
    </div>
    
<div class="container">
    <ul>
    

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
                <h5 class="card-title">GESTIÓN Y CONTROL DE LA AVISPA ASIÁTICA O AVISPA NEGRA (AVISPA VELUTINA)</h5>
                <a href="https://www.sanea.es/producto/curso-de-gestion-y-control-de-la-avispa-asiatica-o-avispa-negra-avispa-velutina/" class="card-link">Abrir Link</a>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">BIENESTAR ANIMAL EN EXPLOTACIONES DE AVES</h5>
                <a href="https://www.sanea.es/producto/bienestar-animal-en-explotaciones-de-aves-2/" class="card-link">Abrir Link</a>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Introducción a la Siembra Directa</h5>
                <a href="https://www.edx.org/es/learn/agriculture/universidad-nacional-de-cordoba-introduccion-a-la-siembra-directa?irclickid=UvD0ulVb9xyKTmsznz1-SS60Uks1%3AJSOdVUGWU0&utm_source=affiliate&utm_medium=cursando.cl&utm_campaign=Online%20Tracking%20Link_&utm_content=ONLINE_TRACKING_LINK&irgwc=1" class="card-link">Abrir Link</a>
            </div>
        </div>
    </div>
    <div class="card-container">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Principios ecológicos para la comprensión de la sostenibilidad ambiental</h5>
                <a href="https://www.edx.org/es/learn/sustainability/pontificia-universidad-javeriana-principios-ecologicos-para-la-comprension-de-la-sostenibilidad-ambiental?irclickid=UvD0ulVb9xyKTmsznz1-SS60Uks1%3AOyHdVUGWU0&utm_source=affiliate&utm_medium=cursando.cl&utm_campaign=Online%20Tracking%20Link_&utm_content=ONLINE_TRACKING_LINK&irgwc=1" class="card-link">Abrir Link</a>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Conceptos base para el estudio del medio ambiente</h5>
                <a href="https://www.coursera.org/learn/conceptos-estudio-del-medio-ambiente?irclickid=UveSflVb9xyKTJiXnvTxvztYUks1%3AOT3dVUGWU0&irgwc=1&utm_medium=partners&utm_source=impact&utm_campaign=1720753&utm_content=b2c&utm_campaignid=cursando.cl&utm_term=14726_CR_1164545_" class="card-link">Abrir Link</a>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Curso sobre cognición y emociones de los perros</h5>
                <a href="https://cursosgratisunam.com/biologia/cognicion-emociones-de-los-perros/" class="card-link">Abrir Link</a>
            </div>
        </div>
    </div>
    <div class="card-container">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Curso sobre la evolución de las aves y los dinosaurios</h5>
                <a href="https://cursosgratisunam.com/biologia/evolucion-de-aves-y-dinosaurios/" class="card-link">Abrir Link</a>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Curso de biología marina</h5>
                <a href="https://cursosgratisunam.com/biologia/marina/" class="card-link">Abrir Link</a>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">PROJETO DESCOMPLICANDO ORQUÍDEAS</h5>
                <a href="https://hotmart.com/pt-br/marketplace/produtos/orqflix-a-netflix-do-cultivo-de-orquideas/C56738059M?sck=HOTMART_SITE&hotfeature=33" class="card-link">Abrir Link</a>
            </div>
        </div>
    </div>
       
    </ul>
    </ul>
</div>
@endsection
