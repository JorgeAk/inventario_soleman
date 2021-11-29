<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\DB;
use Auth;
use Carbon\Carbon;


class DiagramaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function mis_diagramas()
    {

        $mi_id = Auth::id();
        //dd($mi_id);
        $mensaje = "";
        $diagramas = DB::table('diagramas')->where('id_usuario', $mi_id)->get();
        $periodo = DB::table('periodo')->get();

        if (Auth::user()->tipo_usuario == 1) {
            return view('admin_panel/mis_diagramas', compact('diagramas', 'periodo', 'mensaje'));
        } else {
            return view('home');
        }
    }


    public function generar_nuevo(Request $request)
    {

        $nombre = $request->input('n_diagrama');
        $descripcion = $request->input('d_diagrama');
        $duracion = $request->input('duracion_diagrama');
        $id_periodo = $request->input('duracion_dividir');
        $usuario = Auth::user()->id;
        $dia = Carbon::now();
        $periodo = DB::table('periodo')->get();
        //dd($_POST);
        $mensaje = "";
        $insert = DB::table('diagramas')->insert([
            'nombre' => $nombre, 'descripcion' => $descripcion,
            'id_usuario' => $usuario, 'id_periodo' => $id_periodo, 'duracion' => $duracion, 'created_at' => "$dia", 'updated_at' => "$dia"
        ]);
        if ($insert) {
            $mensaje = "Diagrama generado con exito";
            if (Auth::user()->tipo_usuario == 1) {
                return view('admin_panel/diagrama', compact('periodo', 'mensaje'));
            } else {
                return view('home');
            }
        }
    }

    public function diagrama($id, $mensaje = "")
    {
        $mi_id = Auth::id();
        //dd($mi_id);
        //$mensaje = "";
        $diagramas = DB::table('diagramas')->where('id_usuario', $mi_id)->where('id', $id)->get();
        //$periodo   = DB::table('periodo')->get();
        $tareas = DB::table('tareas')->where('id_diagrama', $id)->get();
        $maximo = DB::table('diagramas')->select('duracion')->where('id_usuario', $mi_id)->where('id', $id)->get()->first();
        $maximo = $maximo->duracion;
        $periodo = DB::table('diagramas')->select('id_periodo')->where('id_usuario', $mi_id)->where('id', $id)->get()->first();
        $periodo = $periodo->id_periodo;
        //dd($periodo);
        $dg = $id;
        if (Auth::user()->tipo_usuario == 1 and count($diagramas) > 0) {
            return view('admin_panel/modificar_diagramas', compact('dg', 'diagramas', 'periodo', 'tareas', 'maximo', 'mensaje'));
        } else {
            $mensaje = "Error no existe ese diagrama";
            return view('admin_panel/index', compact('mensaje'));
        }
    }

    public function tarea_nueva(Request $request)
    {

        $mi_id = Auth::id();
        $id_diagrama = $request->input('dg');
        $nombre = $request->input('nombre');
        $descripcion = $request->input('descripcion');
        $f_inicio = $request->input('f_inicio');
        $f_fin = $request->input('f_fin');
        $color = $request->input('color');
        $dia = Carbon::now();
        $insert = DB::table('tareas')->insert([
            'nombre' => $nombre, 'descripcion' => $descripcion,
            'id_diagrama' => $id_diagrama, 'f_inicio' => $f_inicio, 'f_fin' => $f_fin, 'color' => $color, 'created_at' => "$dia", 'updated_at' => "$dia"
        ]);

        $mensaje = "Tarea generada con exito";
        return $this->diagrama($mi_id, $mensaje);
    }
}
