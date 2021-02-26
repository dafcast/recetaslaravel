<?php

namespace App\Http\Controllers;

use App\Receta;
use App\CategoriaReceta;
use Illuminate\Http\Request;

class CategoriaRecetaController extends Controller
{
    
    /**
     * Display the specified resource.
     *
     * @param  \App\CategoriaReceta  $categoriaReceta
     * @return \Illuminate\Http\Response
     */
    public function show(CategoriaReceta $categoriaReceta)
    {
        $recetas = Receta::where('categoria_id',$categoriaReceta->id)->paginate(3);
        return view('categorias.show', ['recetas' => $recetas, 'categoriaReceta' => $categoriaReceta]);
    }
}
