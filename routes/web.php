<?php

use GuzzleHttp\Middleware;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin',[App\Http\Controllers\HomeController::class, 'index1'],function(){ 
})->middleware('auth')->name('admin');

Route::get('/admin/diagramas',[App\Http\Controllers\HomeController::class, 'generar_diagrama'],function(){ 
})->middleware('auth')->name('diagramas');

Route::post('/admin/diagramas/agregar',[App\Http\Controllers\DiagramaController::class,'generar_nuevo'],function(){

})->middleware('auth')->name('diagrama_nuevo');

Route::get('/admin/diagramas/mis/diagramas',[App\Http\Controllers\DiagramaController::class,'mis_diagramas'],function(){
    
})->middleware('auth')->name('mis_diagramas');