<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Auth;
use Carbon\Carbon;

class InventarioController extends Controller
{
    public function index($mensaje = "")
    {

        $productos      = DB::table('productos')->get();
        $categorias     = DB::table('categorias')->get();
        $sub_categorias = DB::table('sub_categorias')->get();
        $sucursales     = DB::table('ubicaciones')->get();
        $ingresos       = DB::table('ingreso_inventario')->get();
        $usuarios       = DB::table('users')->get();

        if (Auth::user()->tipo_usuario == 1) {
            return view('admin_panel/ingreso', compact('mensaje','ingresos' ,'productos','usuarios', 'categorias', 'sub_categorias', 'sucursales'));
        } else {
            return view('home');
        }
    }

    public function v_baja($mensaje = "")
    {

        $productos      = DB::table('productos')->get();
        $categorias     = DB::table('categorias')->get();
        $sub_categorias = DB::table('sub_categorias')->get();
        $sucursales     = DB::table('ubicaciones')->get();
        $ingresos       = DB::table('baja_inventario')->get();
        $usuarios       = DB::table('users')->get();

        if (Auth::user()->tipo_usuario == 1) {
            return view('admin_panel/baja', compact('mensaje','ingresos' ,'productos','usuarios', 'categorias', 'sub_categorias', 'sucursales'));
        } else {
            return view('home');
        }
    }

    public function nuevo(Request $request)
    {
        $id       =  Auth::user()->id;
        $id_producto   = $request->input('producto');
        $cantidad = $request->input('cantidad');
        $descr    = $request->input('descripcion');
        $id_suc   = $request->input('sucursal');
        $fecha    = Carbon::now();

        $insert = DB::table('ingreso_inventario')->insert([
            'id_producto' => $id_producto, 'id_ubicacion' => $id_suc,
            'cantidad' => $cantidad, 'descripcion' => $descr,
            'id_genero' => $id,'created_at' => "$fecha", 'updated_at' => "$fecha"
        ]);

        if ($insert) {
            $mensaje = "Se añadio el producto correctamente";
        } else {
            $mensaje = "Error verifica los datos ingresados";
        }

        return $this->index($mensaje);
    }
}
