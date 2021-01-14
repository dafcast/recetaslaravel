@extends('layouts.app')

@section('estilos')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css" integrity="sha512-5m1IeUDKtuFGvfgz32VVD0Jd/ySGX7xdLxhqemTmThxHdgqlgPdupWoSN8ThtUSLpAGBvA8DY2oO7jJCrGdxoA==" crossorigin="anonymous" />
@endsection

@section('botones')
<a href="{{ route('recetas.index')}}" class="btn btn-primary px-4">Regresar</a>
@endsection

@section('content')
    <h2 class="text-center my-3">Crea nueva receta</h2>

    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <form method="POST" action="{{ route('recetas.store')}}" enctype="multipart/form-data" novalidate>
                <div class="form-group">
                    <label for="titulo">Titulo Receta:</label>
                    <input id="titulo"
                        name="titulo"
                        type="text"
                        placeholder="Titulo Receta"
                        class="form-control @error('titulo') is-invalid @enderror"
                        value="{{old('titulo')}}"
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
                                {{ old('categoria') == $categoria->id ? 'selected' : '' }}
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
                        value="{{ old('preparacion')}}"
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
                        value="{{ old('ingredientes')}}"
                    >
                    <trix-editor input="ingredientes" class="form-control @error('ingredientes') is-invalid @enderror"></trix-editor>

                    @error('ingredientes')
                        <div class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </div>
                    @enderror

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
                    <input type="submit" class="btn btn-primary" value="Agregar Receta">
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js" integrity="sha512-2RLMQRNr+D47nbLnsbEqtEmgKy67OSCpWJjJM394czt99xj3jJJJBQ43K7lJpfYAYtvekeyzqfZTx2mqoDh7vg==" crossorigin="anonymous"></script>
@endsection
