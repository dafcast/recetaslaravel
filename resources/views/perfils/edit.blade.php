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
    <h1 class="text-center text-primary">Editar Perfil</h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('perfils.update', ['perfil' => $perfil])}}" enctype="multipart/form-data" method="POST" class="bg-white">

                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input id="nombre"
                        name="nombre"
                        type="text"
                        placeholder="Tu nombre"
                        class="form-control @error('nombre') is-invalid @enderror"
                        value="{{old('nombre') ?? $perfil->user->name}}"
                    >
                    @error('nombre')
                        <div class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </div>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="url">Sitio Web:</label>
                    <input id="url"
                        name="url"
                        type="text"
                        placeholder="Tu sitio web"
                        class="form-control @error('url') is-invalid @enderror"
                        value="{{old('url') ?? $perfil->user->url}}"
                    >
                    @error('url')
                        <div class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </div>
                    @enderror
                    </div>


                    <div class="form-group">
                        <label for="bibliografia">Bibliografia</label>
                        <input type="hidden"
                            id="bibliografia"
                            name="bibliografia"
                            value="{{old('bibliografia') ?? $perfil->bibliografia}}"
                        >
                        <trix-editor input="bibliografia" class="form-control @error('bibliografia') is-invalid @enderror"></trix-editor>
    
                        @error('bibliografia')
                            <div class="invalid-feedback d-block" role="alert">
                                <strong>{{$message}}</strong>
                            </div>
                        @enderror
    
                    </div>

                    
                    <div class="form-group">
                        <h4>Imagen previa</h4>
                        <img src="/storage/{{$perfil->imagen}}" width="300px" class="img-fluid">
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
                        <input type="submit" class="btn btn-primary" value="Guardar Perfil">
                    </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js" integrity="sha512-2RLMQRNr+D47nbLnsbEqtEmgKy67OSCpWJjJM394czt99xj3jJJJBQ43K7lJpfYAYtvekeyzqfZTx2mqoDh7vg==" crossorigin="anonymous" defer></script>
@endsection