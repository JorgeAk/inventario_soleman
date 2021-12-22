<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\DB;
use Auth;
use Carbon\Carbon;

class ProductosController extends Controller
{
    public function index()
    {
        $mensaje = "";
        $productos      = DB::table('productos')->get();
        $categorias     = DB::table('categorias')->get();
        $sub_categorias = DB::table('sub_categorias')->get();

        if (Auth::user()->tipo_usuario == 1) {
            return view('admin_panel/productos', compact('mensaje','productos','categorias','sub_categorias'));
        } else {
            return view('home');
        }
    }

    public function nuevo(Request $request){
        $nombre   = $request->input('nombre');
        $cantidad = $request->input('cantidad');
        $estatus  = $request->input('estatus');
        $codigo   = $request->input('codigo');
        $imagen   = $request->input('imagen');
        $id_cat   = $request->input('categoria');
        $id_sub   = $request->input('sub_categoria');
        $descr    = $request->input('descripcion');
        $id_suc   = $request->input('sucursal');
        $fecha    = Carbon::now();

        dd($_POST);

    }
}
