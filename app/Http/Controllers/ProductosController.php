<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Auth;
use Carbon\Carbon;


class ProductosController extends Controller
{
    public function index($mensaje = "")
    {

        $productos      = DB::table('productos')->get();
        $categorias     = DB::table('categorias')->get();
        $sub_categorias = DB::table('sub_categorias')->get();
        $sucursales     = DB::table('ubicaciones')->get();

        if (Auth::user()->tipo_usuario == 1) {
            return view('admin_panel/productos', compact('mensaje', 'productos', 'categorias', 'sub_categorias', 'sucursales'));
        } else {
            return view('home');
        }
    }

    public function nuevo(Request $request)
    {
        $nombre   = $request->input('nombre');
        $cantidad = $request->input('cantidad');
        $estatus  = $request->input('estatus');
        $codigo   = $request->input('codigo');
        $imagen   = $request->file('imagen');
        $id_cat   = $request->input('categoria');
        $id_sub   = $request->input('sub_categoria');
        $descr    = $request->input('descripcion');
        $id_suc   = $request->input('sucursal');
        $fecha    = Carbon::now();

        //dd($_POST);
        $validatedData = $request->validate([
            'imagen' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $name = $request->file('imagen')->getClientOriginalName();
        $path = $request->file('imagen')->store('public/images');
        $name = preg_replace('/^.+[\\\\\\/]/', '', $path);


        $insert = DB::table('productos')->insert([
            'nombre' => $nombre, 'cantidad' => $cantidad,
            'estatus' => $estatus, 'codigo' => $codigo,
            'imagen' => $name, 'id_categoria' => $id_cat,
            'id_subcategoria' => $id_sub, 'descripcion' => $descr,
            'id_sucursal' => $id_suc, 'created_at' => "$fecha", 'updated_at' => "$fecha"
        ]);

        $productos      = DB::table('productos')->get();
        $categorias     = DB::table('categorias')->get();
        $sub_categorias = DB::table('sub_categorias')->get();

        if ($insert) {
            $mensaje = "Se añadio el producto correctamente";
        } else {
            $mensaje = "Error verifica los datos ingresados";
        }

        return $this->index($mensaje);
    }

    public function actualizar(Request $request)
    {
        $id_prod  = $request->input('id_pr');
        $nombre   = $request->input('nombre');
        $cantidad = $request->input('cantidad');
        $estatus  = $request->input('estatus');
        $codigo   = $request->input('codigo');
        $imagen   = $request->file('imagen');
        $id_cat   = $request->input('categoria');
        $id_sub   = $request->input('sub_categoria');
        $descr    = $request->input('descripcion');
        $id_suc   = $request->input('sucursal');
        $fecha    = Carbon::now();

        $validatedData = $request->validate([
            'imagen' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $prod = DB::table('productos')->select('imagen')->where('id', $id_prod)->get()->first();
        if (Storage::exists('public/images/' . $prod->imagen)) {
            Storage::delete('public/images/' . $prod->imagen);
        }


        $name = $request->file('imagen')->getClientOriginalName();
        $path = $request->file('imagen')->store('public/images');
        $name = preg_replace('/^.+[\\\\\\/]/', '', $path);

        $update = DB::table('productos')->where('id', $id_prod)->update([
            'nombre' => $nombre, 'cantidad' => $cantidad,
            'estatus' => $estatus, 'codigo' => $codigo,
            'imagen' => $name, 'id_categoria' => $id_cat,
            'id_subcategoria' => $id_sub, 'descripcion' => $descr,
            'id_sucursal' => $id_suc, 'updated_at' => "$fecha"
        ]);

        if ($update) {
            $mensaje = "Producto actualizado";
        } else {
            $mensaje = "Error no se pudo actualizar verifica datos";
        }

        return $this->index($mensaje);
    }


    public function eliminar(Request $request)
    {

        $id_prod  = $request->input('id_pr');
        $delete   = DB::table('productos')->where('id', $id_prod)->delete();

        if ($delete) {
            $mensaje = "Producto eliminado";
        } else {
            $mensaje = "ERROR no eliminado verifica datos";
        }

        return $this->index($mensaje);
    }
}
