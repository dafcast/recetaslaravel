@extends('layouts.app')

@section('content')
    <div class="row align-items-center">
        <div class="col-md-5">
            <img src="/storage/{{ $perfil->imagen}}" alt="Foto {{ $perfil->user->name}}" class="img-fluid w-100 rounded-circle">
        </div>
        <div class="col-md-7">
            <h2 class="text-center text-primary my-2">{{ $perfil->user->name}}</h2>
            <p class="">{!! $perfil->bibliografia !!}</p>
        </div>
    </div>
@endsection