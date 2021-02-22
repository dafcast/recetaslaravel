@extends('layouts.app')

@section('content')
    {{-- <h4>{{$receta}}</h4> --}}

    <article class="contenido-receta">
        <h1 class="text-center text-primary">{{ $receta->titulo}}</h1>

        <div class="receta-meta">
            <img src="/storage/{{$receta->imagen}}" class="img-fluid mx-auto d-block my-3">
            <p><span class="font-weight-bold text-primary">Creado en: </span>{{$receta->categoria->nombre}}</p>

            <p><span class="font-weight-bold text-primary">Creado por: </span><a href="{{ route('perfils.show',['perfil' => $receta->autor->id])}}">{{$receta->autor->name}}</a></p>
            
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

            <div class="d-flex justify-content-center">
                <like-receta
                    receta-id="{{$receta->id}}"
                    like="{{$like}}"
                    likes="{{$receta->likes->count()}}"
                ></like-receta>
            </div>
        </div>
    </article>
@endsection