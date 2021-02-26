<div class="col-md-4">
    <div class="card shadow">
        <img src="/storage/{{$receta->imagen}}" alt="" class="card-img-top">
        <div class="card-body">
            <h4 class="card-title">{{$receta->titulo}}</h4>
            <div class="d-flex justify-content-between">
                <fecha-receta  class="text-primary font-weight-bold" fecha="{{$receta->created_at}}"></fecha-receta>
                <p>A {{$receta->likes->count()}} les gusto</p>
            </div>
            <p class="card-text">{{Str::words(strip_tags($receta->preparacion), 20)}}</p>
            <a class="btn btn-primary text-uppercase font-weight-bold" href="{{ route('recetas.show',['receta' => $receta->id])}}">Ver receta</a>
        </div>
    </div>
</div>