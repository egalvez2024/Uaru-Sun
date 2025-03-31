@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tienda</h1>
    <ul>
        @foreach($tiendas as $tienda)
            <li>
                <!-- El link se abre en una nueva ventana con target="_blank" -->
                <a href="{{ $tienda->url }}" target="_blank">{{ $tienda->nombre }}</a>
            </li>
        @endforeach
    </ul>
</div>
@endsection
