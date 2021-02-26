@extends('layouts.app')

@section('content')
    <div class="categoria-de-receta">
        <h2 class="titulo-categoria text-uppercase mt-2 mb-4">{{ $categoriaReceta->nombre}}</h2>
        <div class="row">
            @foreach($recetas as $receta)
                @include('ui.receta')
            @endforeach
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{$recetas->links()}}
        </div>
    </div>
@endsection