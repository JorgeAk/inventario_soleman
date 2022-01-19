<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\DB;
use Auth;
use Carbon\Carbon;

class ReportesController extends Controller
{
    public function index()
    {

        $mensaje = "";
        $sucursales = DB::table('ubicaciones')->get();
        $productos = DB::table('productos')->get();
        if (Auth::user()) {
            return view('admin_panel/reportes', compact('mensaje', 'sucursales', 'productos'));
        } else {
            return view('home');
        }
    }

    public function existencias(Request $request)
    {

        $mensaje = "";
        $id_sucursal = $request->input('sucursal');
        //dd($_POST);
        $sucursales  = DB::table('ubicaciones')->get();
        if ($id_sucursal  != "all") {
            $existencias = DB::table('existencias_inventario')->where('id_ubicacion', $id_sucursal)->get();
            $productos = DB::table('productos')->get();
        } else {
            $productos = DB::table('productos')->get();
            $existencias = DB::table('existencias_inventario')->get();
        }

        if (Auth::user()) {
            return view('admin_panel/reporte_existencias', compact('mensaje', 'productos', 'existencias', 'sucursales'));
        } else {
            return view('home');
        }
    }

    public function entradas(Request $request)
    {

        $mensaje = "";
        $id_sucursal = $request->input('sucursal');
        $xfecha = $request->input('xfecha');
        $fecha = $request->input('fecha');
        $fecha = explode("-", $fecha);
        $f_ini = trim($fecha[0]);
        $f_fin = trim($fecha[1]);
        $f_ini = date("Y-m-d", strtotime($fecha[0]));
        $f_fin = date("Y-m-d", strtotime($fecha[1]));
        $productos = DB::table('productos')->get();
        //$f_ini = Carbon::createFromFormat('Y-m-d', $fech);
        //dd($f_fin);
        $sucursales  = DB::table('ubicaciones')->get();
        if ($id_sucursal  != "all") {
            if ($xfecha == 1) {
                $existencias = DB::table('ingreso_inventario')->where('id_ubicacion', $id_sucursal)
                    ->where('created_at', '>=', date('Y-m-d', strtotime($f_ini)))
                    ->where('created_at', '<=', date('Y-m-d', strtotime($f_fin)))->get();
                //dd($productos);
            } else {
                $existencias = DB::table('ingreso_inventario')->where('id_ubicacion', $id_sucursal)->get();
            }
        } else {
            if ($xfecha == 1) {
                $existencias = DB::table('ingreso_inventario')
                    ->where('created_at', '>=', date('Y-m-d', strtotime($f_ini)))
                    ->where('created_at', '<=', date('Y-m-d', strtotime($f_fin)))->get();
            } else {
                $existencias = DB::table('ingreso_inventario')->get();
            }
        }
        if (Auth::user()) {
            return view('admin_panel/reporte_existencias', compact('mensaje', 'productos', 'existencias', 'sucursales'));
        } else {
            return view('home');
        }
    }

    public function reporte_historico(Request $request)
    {

        $mensaje = "";
        $id_sucursal = $request->input('sucursal');
        $id_producto = $request->input('producto');
        $xfecha = $request->input('xfecha');
        $fecha = $request->input('fecha');
        $fecha = explode("-", $fecha);
        $f_ini = trim($fecha[0]);
        $f_fin = trim($fecha[1]);
        $f_ini = date("Y-m-d", strtotime($fecha[0]));
        $f_fin = date("Y-m-d", strtotime($fecha[1]));
        $productos = DB::table('productos')->get();
        $usuarios = DB::table('users')->get();
        $sucursales  = DB::table('ubicaciones')->get();
        $exist_t = DB::table('existencias_inventario')->select('cantidad')->where('id_ubicacion', $id_sucursal)->where('id_producto', $id_producto)->get()->first();
        if($exist_t){
            $exist_t = $exist_t->cantidad;
        }else{
            $exist_t = 0;
        }
        
        $date =  Carbon::now();
        //$f_ini = Carbon::createFromFormat('Y-m-d', $fech);
        //dd($f_fin);
        $sucursales  = DB::table('ubicaciones')->get();
        //DD($_POST);

        if ($xfecha == 1) {
            $ingresos = DB::table('ingreso_inventario')->where('id_ubicacion', $id_sucursal)->where('id_producto', $id_producto)
                ->where('created_at', '>=', date('Y-m-d', strtotime($f_ini)))
                ->where('created_at', '<=', date('Y-m-d', strtotime($f_fin)));
        } else {
            $ingresos = DB::table('ingreso_inventario')->where('id_ubicacion', $id_sucursal)
            ->where('id_producto', $id_producto);
        }

        $sentencia =  DB::table('ingreso_inventario')->
        join('baja_inventario',"baja_inventario.id_producto","ingreso_inventario.id_producto")->
        where('ingreso_inventario.id_ubicacion', $id_sucursal)->
        where('ingreso_inventario.id_producto', $id_producto)->get();
        $bajas = DB::table('baja_inventario')->where('id_ubicacion', $id_sucursal)->where('id_producto', $id_producto);
        

    

        $union = $ingresos->union($bajas)->get();

            //dd($union);

        if (Auth::user()) {
            return view('admin_panel/reportes_historic', compact('mensaje','usuarios' ,'ingresos','sucursales', 'bajas','union', 'productos', 'sucursales','id_sucursal','id_producto','date','exist_t'));
        } else {
            return view('home');
        }
    }
}
