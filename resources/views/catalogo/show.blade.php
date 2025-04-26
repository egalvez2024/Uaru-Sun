@extends('layouts.app')

@section('title', $specie->nombre)

@section('content')
    <div class="container" style="min-height: 80vh; display: flex; justify-content: center; align-items: center; margin-top: 40px">
        <div class="row" style="width: 100%; max-width: 1200px; background: #fff; border: 1px solid #ccc; border-radius: 10px; padding: 20px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">

            <div class="col-md-6" style="border-right: 1px solid #ccc; padding-right: 20px;">
                <div class="species-detail">
                    <img src="{{ asset('storage/' . $specie->image_path) }}" alt="{{ $specie->nombre }}" class="detail-image">

                    <div class="species-info">
                        <h1>{{ $specie->nombre }}</h1>
                        <h2><em>{{ $specie->nombre_cientifico }}</em></h2>

                        <!-- Botón de Favoritos -->

                        <div class="favorite-section">
                            @if(auth()->user() && auth()->user()->favoritos->where('species_id', $specie->id)->count())
                                <form action="{{ route('favoritos.destroy', $specie->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fas fa-heart-broken"></i> Quitar de Favoritos
                                    </button>
                                </form>

                            @else


                                <form action="{{ route('favoritos.store') }}" method="POST">

                                    @csrf
                                    <input type="hidden" name="species_id" value="{{ $specie->id }}">
                                    <button type="submit" class="btn btn-warning">
                                        <i class="fas fa-heart"></i> Añadir a Favoritos
                                    </button>
                                </form>
                            @endif



                        </div>

                        <div class="info-section">
                            <h3>Hábitat</h3>
                            <p>{{ $specie->habitat }}</p>
                        </div>

                        <div class="info-section">
                            <h3>Descripción</h3>
                            <p>{{ $specie->descripcion }}</p>
                        </div>

                        <div class="location">
                            <h3>Ubicación en Honduras</h3>
                            <p>{{ $specie->location }}</p>
                            <!-- Aquí podrías integrar un mapa con Leaflet/Google Maps -->
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6" style="padding-left: 20px; display: flex; flex-direction: column;">
                <h2 style="text-align: center; font-weight: bold;">Comentarios</h2>
                @if(session('success'))
                    <div class="alert alert-success text-center">{{ session('success') }}</div>
                @endif

                <div class="comentarios-scroll" style="flex: 1; overflow-y: auto; max-height: 250px; margin-bottom: 20px; padding-right: 10px;">
                    @forelse ($specie->comentarios->sortBy('id') as $comentario)
                        @php
                            $texto = $comentario->comentario;
                            $longitud_maxima = 58;
                            $texto_limitado = wordwrap($texto, $longitud_maxima, "\n", true);
                        @endphp
                        <div class="comentario-burbuja" style="background-color: #f0f2f5; padding: 10px 15px; border-radius: 20px; margin-bottom: 10px; position: relative; border: 1px solid #ccc;">
                            <p style="margin: 0; color: #1877f2; font-weight: bold;">{{ $comentario->user->email }}</p>
                            <p style="margin: 0; color: #050505; white-space: pre-line;">{{ $texto_limitado }}</p>
                            <p style="font-size: 0.75rem; color: #65676b; bottom: 5px; right: 10px;">{{ date('d-m-Y', strtotime($comentario->fecha)) }}</p>
                            <div style="margin-top: 15px; text-align: right;">
                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal{{$comentario->id}}">
                                    Eliminar
                                </button>
                            </div>
                        </div>

                        <div class="modal fade" id="modal{{$comentario->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5">Eliminar comentario</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        ¿Desea realmente eliminar el comentario "{{ $texto_limitado }}"?
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{ route('comentarios.destroy', $comentario->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="specie_id" value="{{ $specie->id }}">
                                            <button type="submit" class="btn btn-primary">Eliminar</button>
                                        </form>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-center">No se han agregado comentarios</p>
                    @endforelse
                </div>

                <form action="{{ route('comentarios.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <textarea name="comentario" id="comentario" maxlength="200" class="form-control @error('comentario') is-invalid @enderror" placeholder="Escribe un comentario..." style="resize: none; height: 80px;"></textarea>
                        @error('comentario')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <input type="hidden" name="specie_id" value="{{ $specie->id }}">

@if(auth()->check())
    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
@else
    <input type="hidden" name="user_id" value="">
@endif

<input type="hidden" name="accion" value="especie">
<button type="submit" class="btn btn-primary w-100">Comentar</button>

                </form>

                <div class="text-end mt-4">
                    <a href="{{ route('home') }}" class="btn btn-secondary">Salir</a>
                </div>
            </div>
        </div>
    </div>
@endsection

<style>
    .species-detail {
        display: grid;
        grid-template-columns: 1fr 2fr;
        gap: 30px;
        padding: 20px;
    }

    .detail-image {
        width: 100%;
        max-height: 500px;
        object-fit: cover;
        border-radius: 10px;
    }

    .species-info h1 {
        color: #2c3e50;
        margin-bottom: 5px;
    }

    .species-info h2 {
        color: #7f8c8d;
        margin-bottom: 25px;
    }

    .favorite-section {
        margin-bottom: 20px;
    }

    .favorite-section .btn {
        font-size: 16px;
        padding: 10px 15px;
    }

    .info-section {
        margin-bottom: 25px;
    }

    .info-section h3 {
        color: #27ae60;
        border-bottom: 2px solid #27ae60;
        padding-bottom: 5px;
        margin-bottom: 10px;
    }
</style>
