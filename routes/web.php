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

//--------------------------------CONTROL DE USUARIOS-------------------------------
Route::get('/admin/perfil',[App\Http\Controllers\HomeController::class, 'perfil'],function(){ 
})->middleware('auth')->name('admin/perfil');

Route::get('/admin/usuarios/control',[App\Http\Controllers\HomeController::class, 'usuarios_control'],function(){ 
})->middleware('auth')->name('admin/usuarios/control');

Route::post('/admin/usuarios/control/actualizar',[App\Http\Controllers\HomeController::class, 'usuarios_actualizar'],function(){ 
})->middleware('auth')->name('admin/usuarios/control/actualizar');

//------------------------------END CONTROL DE USUARIOS-------------------------------

//--------------------------------PRODUCTOS-------------------------------
Route::get('/admin/productos',[App\Http\Controllers\ProductosController::class, 'index'],function(){ 
})->middleware('auth')->name('admin/productos');

//--------------------------------END PRODUCTOS-------------------------------


//--------------------------------UBICACIONES-------------------------------
Route::get('/admin/usuarios/ubicaciones',[App\Http\Controllers\HomeController::class, 'ubicaciones'],function(){ 
})->middleware('auth')->name('admin/usuarios/ubicaciones');

Route::post('/admin/usuarios/ubicaciones/nueva',[App\Http\Controllers\HomeController::class, 'ubicaciones_nueva'],function(){ 
})->middleware('auth')->name('admin/usuarios/ubicaciones/nueva');

Route::post('/admin/usuarios/ubicaciones/nueva/actualizar',[App\Http\Controllers\HomeController::class, 'ubicaciones_actualizar'],function(){ 
})->middleware('auth')->name('admin/usuarios/ubicaciones/actualizar');

Route::post('/admin/usuarios/ubicaciones/eliminar',[App\Http\Controllers\HomeController::class, 'ubicaciones_eliminar'],function(){ 
})->middleware('auth')->name('admin/usuarios/ubicaciones/eliminar');

//--------------------------------END UBICACIONES-------------------------------

//--------------------------------DIAGRAMAS-------------------------------
Route::get('/admin/diagramas',[App\Http\Controllers\HomeController::class, 'generar_diagrama'],function(){ 
})->middleware('auth')->name('diagramas');

Route::post('/admin/diagramas/agregar',[App\Http\Controllers\DiagramaController::class,'generar_nuevo'],function(){
})->middleware('auth')->name('diagrama_nuevo');

Route::get('/admin/diagramas/mis/diagramas',[App\Http\Controllers\DiagramaController::class,'mis_diagramas'],function(){
})->middleware('auth')->name('mis_diagramas');

Route::post('/admin/diagramas/mis/diagramas/actualizar',[App\Http\Controllers\DiagramaController::class,'diagramas_actualizar'],function(){
})->middleware('auth')->name('mis_diagramas/actualizar');

Route::post('/admin/diagramas/mis/diagramas/eliminar',[App\Http\Controllers\DiagramaController::class,'diagramas_eliminar'],function(){
})->middleware('auth')->name('diagrama/eliminar');

Route::get('/admin/diagramas/mis/diagramas/{id}',[App\Http\Controllers\DiagramaController::class,'diagrama'],function(){
})->middleware('auth')->name('mis_diagramas/diagrama');

Route::post('/admin/diagramas/mis/diagramas/tarea/nueva',[App\Http\Controllers\DiagramaController::class,'tarea_nueva'],function(){
})->middleware('auth')->name('tarea/nueva');

Route::post('/admin/diagramas/mis/diagramas/tarea/actualizar',[App\Http\Controllers\DiagramaController::class,'tarea_actualizar'],function(){
})->middleware('auth')->name('tarea/actualizar');

Route::post('/admin/diagramas/mis/diagramas/tarea/eliminar',[App\Http\Controllers\DiagramaController::class,'tarea_eliminar'],function(){
})->middleware('auth')->name('tarea/eliminar');
//--------------------------------END DIAGRAMAS-------------------------------