<?php

namespace App;

use CategoriasSeeder;
use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    protected $fillable = [
        'titulo', 'ingredientes', 'preparacion','imagen','categoria_id'
    ];


    public function categoria(){
        return $this->belongsTo(CategoriaReceta::class);
    }

    public function autor(){
        return $this->belongsTo(User::class,'user_id');
    }
}
