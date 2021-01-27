@extends('layouts.app')

@section('botones')
    @include('ui.botones')
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
                        {{-- <form action="{{ route('recetas.destroy',[ 'receta' => $receta->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn d-block m-1 btn-danger w-100" value="Eliminar">
                        </form> --}}

                        <eliminar-receta receta-id="{{ $receta->id }}"></eliminar-receta>
                        
                        <a href="{{ route('recetas.edit',['receta' => $receta->id]) }}" class="btn w-100 d-block m-1 btn-dark">Editar</a>
                        <a href="{{ route('recetas.show',['receta' => $receta->id]) }}" class="btn w-100 d-block m-1 btn-success">Ver</a>
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>
</div>
@endsection