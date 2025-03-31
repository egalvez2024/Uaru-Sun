@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Cursos</h1>
    <ul class="list-group">
        @forelse($cursos as $curso)
            <li class="list-group-item">
                <a href="{{ $curso->link }}" target="_blank">{{ $curso->titulo }}</a>
            </li>
        @endforelse
    </ul>
</div>
@endsection
