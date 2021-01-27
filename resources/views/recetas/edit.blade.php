@extends('layouts.app')

@section('estilos')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css" integrity="sha512-5m1IeUDKtuFGvfgz32VVD0Jd/ySGX7xdLxhqemTmThxHdgqlgPdupWoSN8ThtUSLpAGBvA8DY2oO7jJCrGdxoA==" crossorigin="anonymous" />
@endsection

@section('botones')
<a href="{{ route('recetas.index')}}" class="btn btn-outline-primary text-uppercase font-weight-bold px-2 mr-2">
    <svg class="icono w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z"></path></svg>
    Regresar</a>
@endsection

@section('content')
    <h2 class="text-center my-3">Editar Receta: {{$receta->titulo}}</h2>

    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <form method="POST" action="{{ route('recetas.update',['receta' => $receta->id])}}" enctype="multipart/form-data" novalidate>

                @method('PUT')
                
                <div class="form-group">
                    <label for="titulo">Titulo Receta:</label>
                    <input id="titulo"
                        name="titulo"
                        type="text"
                        placeholder="Titulo Receta"
                        class="form-control @error('titulo') is-invalid @enderror"
                        value="{{$receta->titulo}}"
                    >
                    @error('titulo')
                        <div class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="categoria">Seleccione una categoria</label>
                    <select name="categoria"
                        id="categoria"
                        class="form-control @error('categoria') is-invalid @enderror"
                    >
                        <option value="">-- Seleccione --</option>
                        @foreach($categorias as $categoria)

                            <option value="{{$categoria->id}}"
                                {{ $receta->categoria_id == $categoria->id ? 'selected' : '' }}
                            >{{$categoria->nombre}}</option>
                        @endforeach
                    </select>
                    @error('categoria')
                        <div class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="preparacion">Preparacion</label>
                    <input type="hidden"
                        id="preparacion"
                        name="preparacion"
                        value="{{ $receta->preparacion}}"
                    >
                    <trix-editor class="form-control @error('preparacion') is-invalid @enderror" input="preparacion"></trix-editor>

                    @error('preparacion')
                        <div class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </div>
                    @enderror

                </div>

                <div class="form-group">
                    <label for="ingredientes">Ingredientes</label>
                    <input type="hidden"
                        id="ingredientes"
                        name="ingredientes"
                        value="{{ $receta->ingredientes}}"
                    >
                    <trix-editor input="ingredientes" class="form-control @error('ingredientes') is-invalid @enderror"></trix-editor>

                    @error('ingredientes')
                        <div class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </div>
                    @enderror

                </div>
                <div class="form-group">
                    <h4>Imagen previa</h4>
                    <img src="/storage/{{$receta->imagen}}" width="300px" class="img-fluid">
                </div>
                <div class="form-group">
                    <label for="imagen">Seleccione la imagen</label>
                    <input type="file"
                        id="imagen"
                        name="imagen"
                        class="form-control @error('imagen') is-invalid @enderror"
                    >

                    @error('imagen')
                    <div class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </div>
                @enderror
                </div>

                <div class="form-group">
                    @csrf
                    <input type="submit" class="btn btn-primary" value="Guardar Receta">
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js" integrity="sha512-2RLMQRNr+D47nbLnsbEqtEmgKy67OSCpWJjJM394czt99xj3jJJJBQ43K7lJpfYAYtvekeyzqfZTx2mqoDh7vg==" crossorigin="anonymous" defer></script>
@endsection
