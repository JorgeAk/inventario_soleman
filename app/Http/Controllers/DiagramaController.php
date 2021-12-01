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


    public function mis_diagramas($mensaje="")
    {

        $mi_id = Auth::id();
        //dd($mi_id);
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
        $creacion = DB::table('diagramas')->select('created_at')->where('id_usuario', $mi_id)->where('id', $id)->get()->first();
        $creacion = date_create($creacion->created_at);
        $creacion = date_format($creacion, "d/m/Y");
        //dd($creacion);
        $dg = $id;
        if (Auth::user()->tipo_usuario == 1 and count($diagramas) > 0) {
            return view('admin_panel/modificar_diagramas', compact('dg', 'creacion', 'diagramas', 'periodo', 'tareas', 'maximo', 'mensaje'));
        } else {
            $mensaje = "Error no existe ese diagrama";
            return view('admin_panel/index', compact('mensaje'));
        }
    }

    public function diagramas_actualizar(Request $request)
    {
        //dd($_POST);
        
        $mi_id = Auth::id();
        $nombre = $request->input('n_diagrama');
        $descripcion = $request->input('d_diagrama');
        $duracion = $request->input('duracion_diagrama');
        $id_periodo = $request->input('duracion_dividir');
        $usuario = Auth::user()->id;
        $dia = Carbon::now();
        $periodo = DB::table('periodo')->get();
        $id_diagrama = $request->input('dg');
        //dd($_POST);
        $mensaje = "";
        $post = (isset($nombre) && !empty($nombre)) && (isset($descripcion) && !empty($descripcion)) && (isset($duracion) && !empty($duracion)) && (isset($id_periodo) && !empty($id_periodo)) && (isset($usuario) && !empty($usuario)) && (isset($id_diagrama) && !empty($id_diagrama));
        
        if($post){
            $mensaje = "Diagrama Actualizado con exito";
            $insert = DB::table('diagramas')->where('id',$id_diagrama)->update([
                'nombre' => $nombre, 'descripcion' => $descripcion,
                'id_usuario' => $usuario, 'id_periodo' => $id_periodo, 'duracion' => $duracion, 'updated_at' => "$dia"
            ]);

        }else{
            $mensaje = "Diagrama no Actualizado verfica los datos";
        }

        return $this->mis_diagramas();       
    }

    public function diagramas_eliminar(Request $request)
    {
        $mi_id = Auth::id();       
        $id_diagrama = $request->input('dg');
        $delete = DB::table('diagramas')->where('id', $id_diagrama)->delete();
        $delete_tarea =  $delete = DB::table('tareas')->where('id_diagrama', $id_diagrama)->delete();
        if ($delete) {
            $mensaje = "Diagrama eliminado";
        } else {
            $mensaje = "ERROR Diagrama no eliminado verifica datos";
        }
        return $this->mis_diagramas($mensaje); 
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
        
        return $this->diagrama($id_diagrama, $mensaje);
    }

    public function tarea_actualizar(Request $request)
    {
        //dd($_POST);
        $mi_id = Auth::id();
        $id_tarea = $request->input('tarea');
        $id_diagrama = $request->input('dg');
        $nombre = $request->input('nombre');
        $descripcion = $request->input('descripcion');
        $f_inicio = $request->input('f_inicio');
        $f_fin = $request->input('f_fin');
        $color = $request->input('color');
        $dia = Carbon::now();
        $post = (isset($mi_id) && !empty($mi_id)) && (isset($id_tarea) && !empty($id_tarea)) && (isset($id_diagrama) && !empty($id_diagrama)) && (isset($nombre) && !empty($nombre)) && (isset($descripcion) && !empty($descripcion)) && (isset($f_inicio) && !empty($f_fin)) && (isset($color) && !empty($color));
        //dd($post);
        if ($post) {
            $mensaje = "Tarea Actualizada con exito";
            $insert = DB::table('tareas')->where('id', $id_tarea)->update([
                'nombre' => $nombre, 'descripcion' => $descripcion,
                'id_diagrama' => $id_diagrama, 'f_inicio' => $f_inicio, 'f_fin' => $f_fin, 'color' => $color, 'updated_at' => "$dia"
            ]);
        } else {
            $mensaje = "Tarea no Actualizada verfica los datos";
        }
        return $this->diagrama($id_diagrama, $mensaje);
    }

    public function tarea_eliminar(Request $request)
    {

        $mi_id = Auth::id();
        $id_tarea = $request->input('tarea');
        $id_diagrama = $request->input('dg');
        $delete = DB::table('tareas')->where('id', $id_tarea)->where('id_diagrama', $id_diagrama)->delete();
        if ($delete) {
            $mensaje = "Tarea eliminada";
        } else {
            $mensaje = "ERROR Tarea no eliminada verifica datos";
        }
        return $this->diagrama($id_diagrama, $mensaje);
    }
}
