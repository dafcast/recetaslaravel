<?php

namespace App\Http\Controllers;

use App\CategoriaReceta;
use App\Receta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class RecetaController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth', ['except' => ['show', 'create']]);
        $this->middleware('auth', ['except' => 'show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();

        $recetas = Receta::where('user_id',$user->id)->paginate(5);
        // dd($recetas->get());
        return view('recetas.index')->with('recetas',$recetas)
                                    ->with('usuario',$user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        // $categorias = DB::table('categoria_recetas')->get()->pluck('nombre','id');

        $categorias = CategoriaReceta::all(['id','nombre']);

        return view('recetas/create')->with('categorias',$categorias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request['imagen']->store('upload-recetas','public'));

        $data = request()->validate([
            'titulo' => 'required|min:6',
            'categoria' => 'required',
            'preparacion' => 'required',
            'ingredientes' => 'required',
            'imagen' => 'required|image'
        ]);



        $ruta_imagen = $request['imagen']->store('upload-recetas','public');
        $img = Image::make(public_path("storage/{$ruta_imagen}"))->fit(1000,550);
        $img->save();

        // DB::table('recetas')->insert([
        //     'titulo'=>$data['titulo'],
        //     'ingredientes' => $data['ingredientes'],
        //     'preparacion'=>$data['preparacion'],
        //     'imagen' => $ruta_imagen,
        //     'user_id' => Auth::user()->id,
        //     'categoria_id' => $data['categoria']
        // ]);


        //store con modelo

        auth()->user()->recetas()->create([
            'titulo'=>$data['titulo'],
            'ingredientes' => $data['ingredientes'],
            'preparacion'=>$data['preparacion'],
            'imagen' => $ruta_imagen,
            'categoria_id' => $data['categoria']
        ]);

        return redirect()->action('RecetaController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function show(Receta $receta)
    {
        $like = auth()->user() ? auth()->user()->meGusta->contains($receta) : false;
        return view('recetas.show',compact('receta','like'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function edit(Receta $receta)
    {
        $this->authorize('view',$receta);
        $categorias = CategoriaReceta::all(['id','nombre']);
        return view('recetas.edit', compact('categorias','receta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receta $receta)
    {
        $this->authorize('update',$receta);

        $data = request()->validate([
            'titulo' => 'required|min:6',
            'categoria' => 'required',
            'preparacion' => 'required',
            'ingredientes' => 'required'
        ]);
        

        $receta->titulo = $data['titulo'];
        $receta->categoria_id = $data['categoria'];
        $receta->preparacion = $data['preparacion'];
        $receta->ingredientes = $data['ingredientes'];

        if($request['imagen']){
            $ruta_imagen = $request['imagen']->store('upload-recetas','public');
            $img = Image::make(public_path("storage/{$ruta_imagen}"))->fit(1000,550);
            $img->save();
            $receta->imagen = $ruta_imagen;    
        }

        $receta->save();

        return redirect()->action('RecetaController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receta $receta)
    {
        // return 'eliminando..';
        $this->authorize('delete',$receta);
        $receta->delete();

        return redirect()->action('RecetaController@index');
    }
}
