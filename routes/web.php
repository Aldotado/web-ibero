<?php

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

Route::get('/', ['App\Http\Controllers\TaskController', 'index']);*/



//post es más adecuado que get por cuestiones de seguridad
//se pide el {id} porque es la variable que solicita la función @changeStatus

Route::get('/', [
        'uses' => 'App\Http\Controllers\HomeController@mainSite',
        'as' => 'index'
    ]);

Auth::routes();

Route::group(['middleware' => 'auth'], function(){
	Route::resource('/tareas', 'App\Http\Controllers\TaskController');

	Route::resource('/proyectos', 'App\Http\Controllers\ProjectController');

	Route::post('/completar-tarea/{id}',[
	'uses' => 'App\Http\Controllers\TaskController@changeStatus',
	'as' => 'completar.tarea'
	]);

	Route::get('/admin', [
		'uses' => 'App\Http\Controllers\HomeController@index',
		'as' => 'home'
	]);
});
