<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/','InicioController@index')->name('inicio.index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// Route::get('/recetas','RecetaController@index')->name('recetas.index');
// Route::get('/recetas/create','RecetaController@create')->name('recetas.create');
// Route::post('/recetas','RecetaController@store')->name('recetas.store');
// Route::get('/recetas/{receta}','RecetaController@show')->name('recetas.show');
// Route::get('/recetas/{receta}/edit','RecetaController@edit')->name('recetas.edit');
// Route::put('/recetas/{receta}','RecetaController@update')->name('recetas.update');
// Route::delete('/recetas/{receta}','RecetaController@destroy')->name('recetas.destroy');

Route::resource('/recetas', 'RecetaController');

Route::get('/perfils/{perfil}','PerfilController@show')->name('perfils.show');
Route::get('/perfils/{perfil}/edit','PerfilController@edit')->name('perfils.edit');
Route::put('/perfils/{perfil}','PerfilController@update')->name('perfils.update');


Route::post('likes/{receta}','LikesController@update')->name('likes.update');

// buscador


Route::get('/buscar','RecetaController@search')->name('buscar.search');

Route::get('categorias/{categoriaReceta}','CategoriaRecetaController@show')->name('categorias.show');

// Route::get('/nosotros', function () {
//     return view('nosotros');
// });

// Route::get('/recetas','RecetaController');




