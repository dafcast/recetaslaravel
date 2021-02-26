@extends('layouts.app')

@section('estilos')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />    
@endsection

@section('hero')
    <div class="hero-categorias">
        <form action="{{ route('buscar.search')}}" class="container h-100" method="GET">
            <div class="row align-items-center h-100">
                <div class="col-md-4 texto-buscar">
                    <p>Encuentra una receta para tu proxima comida</p>
                    <input type="search"
                        placeholder="Buscar Receta"
                        name="buscar"
                        class="form-control"
                    >
                </div>
            </div>
        </form>
    </div>
    
@endsection


@section('content')

    <div class="ultimas-recetas">
        <h2 class="titulo-categoria text-uppercase">Últimas recetas</h2>
        <div class="owl-carousel owl-theme">

            @foreach($ultimasRecetas as $receta)
            <div class="card">
                <img src="/storage/{{$receta->imagen}}" alt="" class="card-img-top">
                <div class="card-body">
                    <h4 class="card-title">{{$receta->titulo}}</h4>
                    <p class="card-text">{{Str::words(strip_tags($receta->preparacion), 30)}}</p>
                    <a class="btn btn-primary text-uppercase font-weight-bold" href="{{ route('recetas.show',['receta' => $receta->id])}}">Ver receta</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="recetas-mas-votadas">
        <div class="categoria-de-receta">
            <h2 class="titulo-categoria text-uppercase mt-5 mb-4">Recetas mas votadas</h2>
            <div class="row">
                @foreach($masVotadas as $receta)
                    @include('ui.receta')
                @endforeach
            </div>
        </div>
    </div>

    <section class="categorias-recetas">
        @foreach($recetas as $nombreCategoria => $recetas)
            <div class="categoria-de-receta">
                <h2 class="titulo-categoria text-uppercase mt-5 mb-4">{{str_replace('-',' ',$nombreCategoria)}}</h2>
                <div class="row">
                    @foreach($recetas[0] as $receta)
                        @include('ui.receta')
                    @endforeach
                </div>
            </div>
        @endforeach
    </section>


@endsection