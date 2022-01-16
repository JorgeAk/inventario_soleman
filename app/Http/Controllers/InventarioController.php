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
            return view('admin_panel/ingreso', compact('mensaje', 'ingresos', 'productos', 'usuarios', 'categorias', 'sub_categorias', 'sucursales'));
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

        $existe   = DB::table('existencias_inventario')->select('cantidad')->where('id_producto', $id_producto)
            ->where('id_ubicacion', $id_suc)->first();
        //dd($existe);
        if ($existe) {
            $total = $existe->cantidad + $cantidad;
            //DD($total);
            $actualizar = DB::table('existencias_inventario')->where('id_producto', $id_producto)
                ->where('id_ubicacion', $id_suc)->update(['cantidad' => $total, 'updated_at' => "$fecha"]);
        } else {
            $insert = DB::table('existencias_inventario')->insert([
                'id_producto' => $id_producto, 'id_ubicacion' => $id_suc,
                'cantidad' => $cantidad, 'created_at' => "$fecha", 'updated_at' => "$fecha"
            ]);
        }

        $insert = DB::table('ingreso_inventario')->insert([
            'id_producto' => $id_producto, 'id_ubicacion' => $id_suc,
            'cantidad' => $cantidad, 'descripcion' => $descr,
            'id_genero' => $id, 'created_at' => "$fecha", 'updated_at' => "$fecha"
        ]);


        if ($insert) {
            $mensaje = "Se añadio el producto correctamente";
        } else {
            $mensaje = "Error verifica los datos ingresados";
        }

        return $this->index($mensaje);
    }


    public function actualizar(Request $request)
    {
        $id       =  Auth::user()->id;
        $id_producto   = $request->input('producto');
        $cantidad = $request->input('cantidad');
        $descr    = $request->input('descripcion');
        $id_suc   = $request->input('sucursal');
        $id_ingr  = $request->input('ingres');

        $fecha    = Carbon::now();

        $insert = DB::table('ingreso_inventario')->where('id', $id_ingr)->update([
            'id_producto' => $id_producto, 'id_ubicacion' => $id_suc,
            'cantidad' => $cantidad, 'descripcion' => $descr,
            'id_genero' => $id, 'updated_at' => "$fecha"
        ]);

        if ($insert) {
            $mensaje = "Se añadio el producto correctamente";
        } else {
            $mensaje = "Error verifica los datos ingresados";
        }

        return $this->index($mensaje);
    }

    //***BAJAS**//

    public function v_baja($mensaje = "")
    {

        $productos      = DB::table('productos')->get();
        $categorias     = DB::table('categorias')->get();
        $sub_categorias = DB::table('sub_categorias')->get();
        $ingresos       = DB::table('baja_inventario')->get();
        $usuarios       = DB::table('users')->get();
        $sucursales     = DB::table('ubicaciones')->get();
        //dd($sucursales);

        if (Auth::user()->tipo_usuario == 1) {
            return view('admin_panel/baja', compact('mensaje', 'ingresos', 'productos', 'usuarios', 'categorias', 'sub_categorias', 'sucursales'));
        } else {
            return view('home');
        }
    }

    public function v_baja_nuevo($mensaje = "", Request $request)
    {
        $id_sucursal    = $request->input('sucursal');
        $productos      = DB::table('productos')->get();
        $categorias     = DB::table('categorias')->get();
        $sub_categorias = DB::table('sub_categorias')->get();
        $ingresos       = DB::table('ingreso_inventario')->where('id_ubicacion', $id_sucursal)->get();
        $usuarios       = DB::table('users')->get();
        $ubicaciones    = DB::table('ubicaciones')->get();
        $sucursales     = DB::table('ingreso_inventario')->where('id_ubicacion', $id_sucursal)->get();
        $existencias     = DB::table('existencias_inventario')->where('id_ubicacion', $id_sucursal)->where('cantidad', ">", 0)->get();
        //dd($sucursales);




        if (Auth::user()->tipo_usuario == 1) {
            return view('admin_panel/baja_nuevo', compact('mensaje', 'ubicaciones', 'existencias', 'ingresos', 'productos', 'usuarios', 'categorias', 'sub_categorias', 'sucursales'));
        } else {
            return view('home');
        }
    }

    public function baja_nuevo(Request $request)
    {
        $id       =  Auth::user()->id;
        $id_producto   = $request->input('producto');
        $cantidad      = $request->input('cantidad');
        $id_ingreso    = $request->input('ingres');
        $descr    = $request->input('descripcion');
        $id_suc   = $request->input('sucursal');
        $fecha    = Carbon::now();

        //dd($_POST);

        $cantidad_ingres = DB::table('existencias_inventario')->select('cantidad')->where('id', $id_ingreso)->get()->first();
        $total = $cantidad_ingres->cantidad - $cantidad;

        //dd($total);
        $actualiza = DB::table('existencias_inventario')->where('id', $id_ingreso)->update(['cantidad' => $total, 'updated_at' => $fecha]);

        $insert = DB::table('baja_inventario')->insert([
            'id_producto' => $id_producto, 'id_ubicacion' => $id_suc,
            'cantidad' => $cantidad, 'descripcion' => $descr,
            'id_genero' => $id, 'created_at' => "$fecha", 'updated_at' => "$fecha"
        ]);

        if ($insert and $actualiza) {
            $mensaje = "Se dio de baja el producto correctamente";
        } else {
            $mensaje = "Error verifica los datos ingresados";
        }

        return $this->v_baja($mensaje);
    }

    public function traslados($mensaje = "")
    {

        $productos      = DB::table('productos')->get();
        $categorias     = DB::table('categorias')->get();
        $sub_categorias = DB::table('sub_categorias')->get();
        $sucursales     = DB::table('ubicaciones')->get();
        $ingresos       = DB::table('ingreso_inventario')->get();
        $usuarios       = DB::table('users')->get();
        $traslados      = DB::table('traslado_inventario')->get();

        if (Auth::user()->tipo_usuario == 1) {
            return view('admin_panel/traslados', compact('mensaje', 'ingresos', 'traslados', 'productos', 'usuarios', 'categorias', 'sub_categorias', 'sucursales'));
        } else {
            return view('home');
        }
    }

    public function nuevo_traslado(Request $request)
    {
        $id       =  Auth::user()->id;
        $id_origen   = $request->input('origen');
        $id_destino  = $request->input('destino');
        $id_producto = $request->input('producto');
        $cantidad = $request->input('cantidad');
        $fecha    = Carbon::now();

        $verificar_inventario = DB::table('existencias_inventario')->where('id_producto', $id_producto)
            ->where('id_ubicacion', $id_origen)->where('cantidad', ">=", $cantidad)->exists();
        if ($verificar_inventario) {
            // Se genera el insert en traslado
         $insert= DB::table('traslado_inventario')->insert([
            'id_producto' => $id_producto, 'id_origen' => $id_origen, 'id_destino' => $id_destino,
            'cantidad' => $cantidad, 'id_genero' => $id,
            'created_at' => "$fecha", 'updated_at' => "$fecha"
        ]);

           
            // verificamos si existe producto similar en la tabla de existencias
            $existe   = DB::table('existencias_inventario')->select('cantidad')->where('id_producto', $id_producto)
                ->where('id_ubicacion', $id_destino)->first();

            if ($existe) {
                $total = $existe->cantidad + $cantidad;
                $actualizar = DB::table('existencias_inventario')->where('id_producto', $id_producto)
                    ->where('id_ubicacion', $id_destino)->update(['cantidad' => $total, 'updated_at' => "$fecha"]);
            } else {
                $insert_existencia = DB::table('existencias_inventario')->insert([
                    'id_producto' => $id_producto, 'id_ubicacion' => $id_destino,
                    'cantidad' => $cantidad, 'created_at' => "$fecha", 'updated_at' => "$fecha"
                ]);
            }
            // se genera un nuevo ingreso para la sucursal destino 
            $insert_ingreso = DB::table('ingreso_inventario')->insert([
                'id_producto' => $id_producto, 'id_ubicacion' => $id_destino,
                'cantidad' => $cantidad, 'descripcion' => "Ingreso por traslado",
                'id_genero' => $id, 'created_at' => "$fecha", 'updated_at' => "$fecha"
            ]);

            // Generacion de baja de productos en origen
            $cantidad_ingres = DB::table('existencias_inventario')->select('cantidad')->where('id_producto', $id_producto)->where('id_ubicacion',$id_origen)->get()->first();
            $total_baja = $cantidad_ingres->cantidad - $cantidad;

            $actualiza = DB::table('existencias_inventario')->where('id_producto', $id_producto)->where('id_ubicacion',$id_origen)
            ->update(['cantidad' => $total_baja, 'updated_at' => $fecha]);

            $insert_baja = DB::table('baja_inventario')->insert([
                'id_producto' => $id_producto, 'id_ubicacion' => $id_origen,
                'cantidad' => $cantidad, 'descripcion' => "Baja por traslado",
                'id_genero' => $id, 'created_at' => "$fecha", 'updated_at' => "$fecha"
            ]);
        } else {
            $mensaje = "La candidad a trasladar rebasa la cantidad en inventario de este producto porfavor verifica";
        }

         

        if ($insert) {
            $mensaje = "Se agenero el traslado con exito";
        } else {
            $mensaje = "Error verifica los datos ingresados,".$mensaje;
        }

        return $this->traslados($mensaje);
    }
}
