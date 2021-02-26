<?php

namespace App\Http\Controllers;

use App\Receta;
use App\CategoriaReceta;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function index(){

        // $ultimasRecetas = Receta::orderBy('created_at','DESC')->get();

        $categorias = CategoriaReceta::all();

        foreach($categorias as $categoria){
            $recetas[Str::slug($categoria->nombre)][] = Receta::where('categoria_id',$categoria->id)->limit(3)->get();
        }
        // return $recetas;
        $ultimasRecetas = Receta::latest()->limit(5)->get();

        // $masVotadas = Receta::has('likes','>','0')->get();

        $masVotadas = Receta::withCount('likes')->orderBy('likes_count','DESC')->limit(3)->get();

        // return $masVotadas;
        return view('inicio.index', ['ultimasRecetas' => $ultimasRecetas, 'recetas' => $recetas, 'masVotadas' => $masVotadas]);
    }
}
