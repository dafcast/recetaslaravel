<?php

namespace App;

use CategoriasSeeder;
use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    protected $fillable = [
        'titulo', 'ingredientes', 'preparacion','imagen','categoria_id'
    ];

    //una receta pertenece a una categoria ¿o varias?
    /**
     * Como la llaver foranea se llama cetegoria_id y la funcion categoria
     * no es necesario espesificar la llave foranea
     */
    public function categoria(){
        return $this->belongsTo(CategoriaReceta::class);
    }

    //una receta pertenece a un unico autor
    /**
     * como el nombre de la funcion no tiene el mismo nombre de la clase,
     * se debe pasar como segundo parametro el nombre de la columna que contiene
     * la llaver foreanea en la tabla de origen si el metodo se llamar "user" no se
     * necesitaria espisificar la llave
     */


    public function autor(){
        return $this->belongsTo(User::class,'user_id');
    }
}
