@extends('layouts.app')

@section('content')
    {{-- <h4>{{$receta}}</h4> --}}

    <article class="contenido-receta">
        <h1 class="text-center text-primary">{{ $receta->titulo}}</h1>

        <div class="receta-meta">
            <img src="/storage/{{$receta->imagen}}" class="img-fluid mx-auto d-block my-3">
            <p><span class="font-weight-bold text-primary">Creado en: </span>{{$receta->categoria->nombre}}</p>

            <p><span class="font-weight-bold text-primary">Creado por: </span>{{$receta->autor->name}}</p>
            
            <p>
                <span class="font-weight-bold text-primary">Creado el: </span>
                <fecha-receta fecha="{{$receta->created_at}}"></fecha-receta>
            </p>
            
            

            <div class="receta-ingredientes">
                <h2 class="text-primary">Ingredientes</h2>
                {!!$receta->ingredientes!!}
            </div>
            <div class="receta-preparacion">
                <h2 class="text-primary">Preparacion</h2>
                {!!$receta->preparacion!!}
            </div>

        </div>
    </article>
@endsection