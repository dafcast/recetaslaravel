@extends('layouts.app')

@section('content')
    <div class="row align-items-center">
        <div class="col-md-5">
            <img src="/storage/{{ $perfil->imagen}}" alt="Foto {{ $perfil->user->name}}" class="img-fluid w-100 rounded-circle">
        </div>
        <div class="col-md-7">
            <h2 class="text-center text-primary my-2">{{ $perfil->user->name}}</h2>
            <a href="{{ $perfil->user->url}}">Sitio Web</a>
            <p class="">{!! $perfil->bibliografia !!}</p>
        </div>
    </div>
    <h3 class="text-center py-4">Recetas de: {{ $perfil->user->name}}</h3>
    <div class="row justify-content-center">
        @foreach($recetas as $receta)
            <div class="card col-md-4 px-0 mt-3">
                <img class="card-img-top" src="/storage/{{$receta->imagen}}" alt="Imagen receta {{ $receta->titulo}}">
                <div class="card-body">
                    <h4 class="card-title">{{ $receta->titulo}}</h4>
                    <a href="{{ route('recetas.show',['receta' => $receta->id])}}" class="btn btn-primary d-block text-uppercase font-weight-bold">Ver receta</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection