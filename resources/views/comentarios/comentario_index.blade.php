@extends('layouts.app')

@section('title', 'Comentarios')
<style>
    h1{

    }
</style>

@section('content')
<div class="container" style="display: flex; justify-content: center; align-items: center; min-height: 100vh;">
    <div class="comentarios-wrapper" style="width: 100%; max-width: 600px; border: 1px solid #ccc; border-radius: 10px; padding: 15px; background-color: #fff;">
        <h1 style="text-align: center; font-size: 2rem; color: #000; font-weight: bold;">Comentarios de la especie {{$specie->nombre}}</h1>
        <hr>

        @if(session('success'))
            <div class="alert alert-success" style="text-align: center;">{{ session('success') }}</div>
        @endif

        <div class="comentarios-container" style="display: flex; flex-direction: column; gap: 10px; margin-top: 20px;">
            @forelse ($specie->comentarios->sortBy('id')  as $comentario)
            @if($comentario->comentario)
                    @php
                        $texto = $comentario->comentario;
                        $longitud_maxima = 58;
                        $texto_limitado = wordwrap($texto, $longitud_maxima, "\n", true);
                    @endphp
            @endif
                <div class="comentario-burbuja" style="background-color: #f0f2f5; padding: 10px 15px; border-radius: 20px; width: 100%; box-sizing: border-box; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1); position: relative; border: 1px solid #ccc;">
                    <p style="margin: 0; color: #1877f2; font-weight: bold;">{{$user->email}}</p>
                    <p style="margin: 0; color: #050505;">{{ $texto_limitado }}</p>
                    <div style="margin-top: 20px">
                        <p style="margin: 20px 0 0 0; font-size: 0.75rem; color: #65676b; position: absolute; bottom: 5px; right: 10px;">{{ date('d-m-Y', strtotime($comentario->fecha)) }}</p>
                    </div>
                </div>
                <div style="display: flex; justify-content: flex-end;  width: 100%; box-sizing: border-box;">
                    <button type="submit" style="background-color: #ff4d4d; color: white; border: none; padding: 5px 10px; border-radius: 10px; font-size: 0.75rem; cursor: pointer;" class="btn btn-outline-danger bm-3" data-bs-toggle="modal" data-bs-target="#modal{{$comentario->id}}">
                        Eliminar
                    </button>
                    <div class="modal fade" id="modal{{$comentario->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar comentario</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    ¿Desea realmente eliminar el comentario "{{$texto_limitado}}"?
                                </div>
                                <div class="modal-footer">
                                    <form action="{{ route('comentarios.destroy', $comentario->id) }}" method="post" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="specie_id" id="specie_id" value="{{$specie->id}}">
                                        <input type="submit" value="Eliminar" class="btn btn-primary">
                                    </form>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="comentario-burbuja vacio" style="text-align: center; background-color: #f0f2f5; border: 1px solid #ccc;">
                    <p>No se han agregado comentarios</p>
                </div>
            @endforelse
        </div>

        <div class="comentarios-form" style="background-color: #fff; padding: 15px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); border-radius: 10px; margin-top: 20px; border: 1px solid #ccc;">
            <form action="{{ route('comentarios.store') }}" method="POST">
                @csrf
                <div class="input-group" style="width: 100%;">
                    <textarea name="comentario" id="comentario" maxlength="200" class="form-control @error('comentario') is-invalid @enderror" placeholder="Escribe un comentario..." style="resize: none; height: 60px; border-radius: 20px; border: 1px solid #ccc; padding: 10px;"></textarea>
                    @error('comentario')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <input type="hidden" name="specie_id" id="specie_id" value="{{$specie->id}}">
                <input type="hidden" name="user_id" id="user_id" value="{{$user->id}}">
                <button type="submit" style="width: 100%; border-radius: 20px; padding: 10px; background-color: #1877f2; color: white; border: none; font-size: 16px; margin-top: 10px;">Comentar</button>
            </form>
        </div>
        <hr>
        <div style="margin-top: 30px">
            <a href="{{ route('admin.especies.index') }}" class="btn btn-secondary">Salir </a>
        </div>
    </div>
</div>
@endsection
