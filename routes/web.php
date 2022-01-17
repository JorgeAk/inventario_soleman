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
    return view('/auth/login');
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
Route::post('/admin/productos/agregar',[App\Http\Controllers\ProductosController::class, 'nuevo'],function(){ 
})->middleware('auth')->name('admin/productos/agregar');
Route::post('/admin/productos/actualizar',[App\Http\Controllers\ProductosController::class, 'actualizar'],function(){ 
})->middleware('auth')->name('admin/productos/actualizar');
Route::post('/admin/productos/eliminar',[App\Http\Controllers\ProductosController::class, 'eliminar_producto'],function(){ 
})->middleware('auth')->name('admin/productos/eliminar');

Route::get('/barcode/{id}', [App\Http\Controllers\BarcodeController::class, 'index'])
->middleware('auth')->name('barcode/');

//--------------------------------END PRODUCTOS-------------------------------

//--------------------------------CATEGORIAS-------------------------------
Route::get('/admin/productos/categorias',[App\Http\Controllers\ProductosController::class, 'obtener_categorias'],function(){ 
})->middleware('auth')->name('admin/productos/categorias');
Route::post('/admin/productos/categorias/agregar',[App\Http\Controllers\ProductosController::class, 'agregar_categorias'],function(){ 
})->middleware('auth')->name('admin/categorias/agregar');
Route::post('/admin/productos/categorias/actualizar',[App\Http\Controllers\ProductosController::class, 'actualizar_categorias'],function(){ 
})->middleware('auth')->name('admin/categorias/actualizar');
Route::post('/admin/productos/categorias/eliminar',[App\Http\Controllers\ProductosController::class, 'eliminar_categorias'],function(){ 
})->middleware('auth')->name('admin/categorias/eliminar');
//--------------------------------END CATEGORIAS-------------------------------

//--------------------------------SUB CATEGORIAS-------------------------------
Route::get('/admin/productos/sub/categorias',[App\Http\Controllers\ProductosController::class, 'obtener_subcategorias'],function(){ 
})->middleware('auth')->name('admin/productos/Sub_categorias');
Route::post('/admin/productos/sub/categorias/agregar',[App\Http\Controllers\ProductosController::class, 'agregar_subcategorias'],function(){ 
})->middleware('auth')->name('admin/sub/categorias/agregar');
Route::post('/admin/productos/sub/categorias/actualizar',[App\Http\Controllers\ProductosController::class, 'actualizar_subcategorias'],function(){ 
})->middleware('auth')->name('admin/sub/categorias/actualizar');
Route::post('/admin/productos/sub/categorias/eliminar',[App\Http\Controllers\ProductosController::class, 'eliminar_subcategorias'],function(){ 
})->middleware('auth')->name('admin/sub/categorias/eliminar');

//--------------------------------END CATEGORIAS-------------------------------


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

//--------------------------------INGRESO DE INVENTARIO-------------------------------
Route::get('/admin/usuarios/inventario/ingreso',[App\Http\Controllers\InventarioController::class, 'index'],function(){ 
})->middleware('auth')->name('admin/inventario/ingreso');

Route::post('/admin/usuarios/inventario/nuevo',[App\Http\Controllers\InventarioController::class, 'nuevo'],function(){ 
})->middleware('auth')->name('admin/usuarios/inventario/nuevo');

Route::post('/admin/usuarios/inventario/actualizar',[App\Http\Controllers\InventarioController::class, 'actualizar'],function(){ 
})->middleware('auth')->name('admin/inventario/actualizar');

Route::post('/admin/usuarios/inventario/eliminar',[App\Http\Controllers\HomeController::class, 'index'],function(){ 
})->middleware('auth')->name('admin/inventario/eliminar');

//--------------------------------END INGRESO DE INVENTARIO-------------------------------

//--------------------------------BAJA DE INVENTARIO-------------------------------

Route::get('/admin/usuarios/inventario/bajas',[App\Http\Controllers\InventarioController::class, 'v_baja'],function(){ 
})->middleware('auth')->name('admin/inventario/bajas');

Route::post('/admin/usuarios/inventario/bajas/nuevo',[App\Http\Controllers\InventarioController::class, 'v_baja_nuevo'],function(){ 
})->middleware('auth')->name('admin/inventario/bajas/nuevo');

Route::post('/admin/usuarios/inventario/bajas/nuevo/generar',[App\Http\Controllers\InventarioController::class, 'baja_nuevo'],function(){ 
})->middleware('auth')->name('admin/inventario/bajas/nuevo/generar');
//--------------------------------END BAJA DE INVENTARIO-------------------------------

//--------------------------------REPORTES-------------------------------
Route::get('/admin/usuarios/ubicaciones/reportes',[App\Http\Controllers\ReportesController::class, 'index'],function(){ 
})->middleware('auth')->name('admin/reportes');
Route::post('/admin/usuarios/ubicaciones/reportes/existencias',[App\Http\Controllers\ReportesController::class, 'existencias'],function(){ 
})->middleware('auth')->name('admin/existencias');
Route::post('/admin/usuarios/ubicaciones/reportes/entradas',[App\Http\Controllers\ReportesController::class, 'entradas'],function(){ 
})->middleware('auth')->name('admin/entradas');
Route::post('/admin/usuarios/ubicaciones/reportes/historico/productos',[App\Http\Controllers\ReportesController::class, 'reporte_historico'],function(){ 
})->middleware('auth')->name('admin/reporte/historico/producto');
//--------------------------------END REPORTES-------------------------------

//--------------------------------TRASLADOS-----------------------------------
Route::get('/admin/traslados',[App\Http\Controllers\InventarioController::class, 'traslados'],function(){ 
})->middleware('auth')->name('admin/traslados');

Route::post('/admin/traslados/nuevo',[App\Http\Controllers\InventarioController::class, 'nuevo_traslado'],function(){ 
})->middleware('auth')->name('admin/traslados/nuevo');

Route::get('/admin/obtener/prod/',[App\Http\Controllers\HomeController::class, 'obtn_prod'],function(){ 
})->middleware('auth')->name('admin/obtener/prod');
//--------------------------------END TRASLADOS-------------------------------

//--------------------------------DIAGRAMAS----------------------------------
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

Route::post('/admin/diagramas/mis/diagramas',[App\Http\Controllers\DiagramaController::class,'diagrama'],function(){
})->middleware('auth')->name('mis_diagramas/diagrama');

Route::post('/admin/diagramas/mis/diagramas/tarea/nueva',[App\Http\Controllers\DiagramaController::class,'tarea_nueva'],function(){
})->middleware('auth')->name('tarea/nueva');

Route::post('/admin/diagramas/mis/diagramas/tarea/actualizar',[App\Http\Controllers\DiagramaController::class,'tarea_actualizar'],function(){
})->middleware('auth')->name('tarea/actualizar');

Route::post('/admin/diagramas/mis/diagramas/tarea/eliminar',[App\Http\Controllers\DiagramaController::class,'tarea_eliminar'],function(){
})->middleware('auth')->name('tarea/eliminar');
//--------------------------------END DIAGRAMAS-------------------------------