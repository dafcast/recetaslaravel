@extends('layouts.app')

@section('botones')
    <a href="{{ route('recetas.create')}}" class="btn btn-primary px-4">Crear</a>
@endsection


@section('content')    
<h2 class="text-center mb-3">Administra tus recetas</h2>

<div class="col-md-10 mx-auto bg-white p-3">

    <table class="table">
        <thead class="bg-primary text-light">
            <tr>
                <th scole="col">Titulo</th>
                <th scole="col">Categoria</th>
                <th scole="col">Acciones</th>
            </tr>
                
        </thead>
        <tbody>
            @foreach($recetas as $receta)    
                <tr>
                    <td class="align-middle">{{$receta->titulo}}</td>
                    <td class="align-middle">{{ $receta->categoria->nombre}}</td>
                    <td class="align-middle">
                        <a href="" class="btn m-1 btn-danger">Eliminar</a>
                        <a href="" class="btn m-1 btn-dark">Editar</a>
                        <a href="{{ route('recetas.show',['receta' => $receta->id]) }}" class="btn m-1 btn-success">Ver</a>
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>
</div>
@endsection