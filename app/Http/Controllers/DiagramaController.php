<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\DB;
use Auth;
use Carbon\Carbon;
use PDO;


class DiagramaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function mis_diagramas($mensaje = "")
    {

        $mi_id = Auth::id();
        //dd($mi_id);
        
        $diagramas = DB::table('diagramas')->where('id_usuario', $mi_id)->get();
        $periodo = DB::table('periodo')->get();

        $tipo = Auth::user()->tipo_usuario;
        if ($tipo == 1 or  $tipo == 2) {
            $diagramas = DB::table('diagramas')->get();

        }
        
        if (Auth::user()) {
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
            $id_diagram = DB::getPdo()->lastInsertId();
            $n_periodo = DB::table('periodo')->select('nombre')->where('id', $id_periodo)->first();
            $movimiento = "Genero un nuevo diagrama el usuario:" . Auth::user()->name . " Datos: Nombre" . $nombre .
                " /Descripcion:" . $descripcion . " /Duracion:" . $duracion . " /Periodo:" . $n_periodo->nombre;
            $this->movimiento_bitacora($usuario, $movimiento, $id_diagram);
            if (Auth::user()) {
                return view('admin_panel/diagrama', compact('periodo', 'mensaje'));
            } else {
                $mensaje = "Error";
                return view('admin_panel/index', compact('mensaje'));
            }
        }
    }

    public function diagrama($id, $mensaje = "")
    {
        $mi_id = Auth::id();
        //dd($mi_id);
        //$mensaje = "";
        $i_diagrama = $id;
        $diagramas = DB::table('diagramas')->where('id_usuario', $mi_id)->where('id', $id)->get();
        //$periodo   = DB::table('periodo')->get();
        $tareas = DB::table('tareas')->where('id_diagrama', $id)->orderBy('tipo', 'ASC')->get();
        $tipo = Auth::user()->tipo_usuario;
        if ($tipo == 1 or  $tipo == 2) {
            $diagramas = DB::table('diagramas')->where('id', $id)->get();
            $maximo = DB::table('diagramas')->select('duracion')->where('id', $id)->get()->first();
            $maximo = $maximo->duracion;
            $periodo = DB::table('diagramas')->select('id_periodo')->where('id', $id)->get()->first();
            $periodo = $periodo->id_periodo;
            $creacion = DB::table('diagramas')->select('created_at')->where('id', $id)->get()->first();
            $creacion = date_create($creacion->created_at);
            $creacion = date_format($creacion, "d/m/Y");
        } else {
            $maximo = DB::table('diagramas')->select('duracion')->where('id_usuario', $mi_id)->where('id', $id)->get()->first();
            $maximo = $maximo->duracion;
            $periodo = DB::table('diagramas')->select('id_periodo')->where('id_usuario', $mi_id)->where('id', $id)->get()->first();
            $periodo = $periodo->id_periodo;
            $creacion = DB::table('diagramas')->select('created_at')->where('id_usuario', $mi_id)->where('id', $id)->get()->first();
            $creacion = date_create($creacion->created_at);
            $creacion = date_format($creacion, "d/m/Y");
        }

        $reprogramacion = DB::table('reprogramacion_tarea')->where('id_diagrama', $id)->get();
        //dd($creacion);
        $dg = $id;
        if (Auth::user() and count($diagramas) > 0) {
            return view('admin_panel/modificar_diagramas', compact('dg', 'creacion', 'reprogramacion', 'diagramas', 'i_diagrama', 'periodo', 'tareas', 'maximo', 'mensaje'));
        } else {
            $mensaje = "Error no existe ese diagrama";
            return view('admin_panel/index', compact('mensaje'));
        }
    }

    public function diagrama_filtrado($id, $mensaje = "")
    {
        $mi_id = Auth::id();
        //dd($mi_id);
        //$mensaje = "";
        $i_diagrama = $id;
        $tot = 100;
        $tipo = Auth::user()->tipo_usuario;
        if ($tipo == 1 or  $tipo == 2) {
            $diagramas = DB::table('diagramas')->where('id', $id)->get();
            //$periodo   = DB::table('periodo')->get();
            $tareas = DB::table('tareas')->where('id_diagrama', $id)->where('avance', "<", $tot)->orderBy('tipo', 'ASC')->get();
            $maximo = DB::table('diagramas')->select('duracion')->where('id', $id)->get()->first();
            $maximo = $maximo->duracion;
            $periodo = DB::table('diagramas')->select('id_periodo')->where('id', $id)->get()->first();
            $periodo = $periodo->id_periodo;
            $creacion = DB::table('diagramas')->select('created_at')->where('id', $id)->get()->first();
            $creacion = date_create($creacion->created_at);
            $creacion = date_format($creacion, "d/m/Y");
        } else {
            $diagramas = DB::table('diagramas')->where('id_usuario', $mi_id)->where('id', $id)->get();
            //$periodo   = DB::table('periodo')->get();
            $tareas = DB::table('tareas')->where('id_diagrama', $id)->where('avance', "<", $tot)->orderBy('tipo', 'ASC')->get();
            $maximo = DB::table('diagramas')->select('duracion')->where('id_usuario', $mi_id)->where('id', $id)->get()->first();
            $maximo = $maximo->duracion;
            $periodo = DB::table('diagramas')->select('id_periodo')->where('id_usuario', $mi_id)->where('id', $id)->get()->first();
            $periodo = $periodo->id_periodo;
            $creacion = DB::table('diagramas')->select('created_at')->where('id_usuario', $mi_id)->where('id', $id)->get()->first();
            $creacion = date_create($creacion->created_at);
            $creacion = date_format($creacion, "d/m/Y");
        }

        $reprogramacion = DB::table('reprogramacion_tarea')->where('id_diagrama', $id)->get();
        //dd($creacion);
        $dg = $id;
        if (Auth::user() and count($diagramas) > 0) {
            return view('admin_panel/modificar_diagramas_filtrado', compact('dg', 'creacion', 'reprogramacion', 'diagramas', 'i_diagrama', 'periodo', 'tareas', 'maximo', 'mensaje'));
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

        if ($post) {
            $mensaje = "Diagrama Actualizado con exito";
            $insert = DB::table('diagramas')->where('id', $id_diagrama)->update([
                'nombre' => $nombre, 'descripcion' => $descripcion,
                'id_usuario' => $usuario, 'id_periodo' => $id_periodo, 'duracion' => $duracion, 'updated_at' => "$dia"
            ]);

            $n_periodo = DB::table('periodo')->select('nombre')->where('id', $id_periodo)->first();
            $movimiento = "Se actualizo el diagrama por el usuario:" . Auth::user()->name . "Datos: Nombre:" . $nombre .
                " /Descripcion:" . $descripcion . " /Duracion:" . $duracion . " /Periodo:" . $n_periodo->nombre;

            $this->movimiento_bitacora($usuario, $movimiento, $id_diagrama);
        } else {
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
        $movimiento = "Se elimino el diagrama por el usuario:" . Auth::user()->name;
        $this->movimiento_bitacora($mi_id, $movimiento, $id_diagrama);
        //DD($delete);

        $mensaje = "Diagrama eliminado";

        return $this->mis_diagramas($mensaje);
    }

    public function tarea_nueva(Request $request)
    {

        $mi_id = Auth::id();
        $filtrado = $request->input('fill');
        $id_diagrama = $request->input('dg');
        $nombre = $request->input('nombre');
        $descripcion = $request->input('descripcion');
        $lider = $request->input('lider_proyecto');
        $materiales = $request->input('materiales');
        $estatus = $request->input('estatus');
        $avance = $request->input('avance');
        $f_inicio = $request->input('f_inicio');
        $f_fin = $request->input('f_fin');
        $color = $request->input('color');
        $tip_ac = $request->input('tip_tar');
        $dia = Carbon::now();
        $insert = DB::table('tareas')->insert([
            'nombre' => $nombre, 'descripcion' => $descripcion, 'lider_proyecto' => $lider, 'materiales' => $materiales, 'estatus' => $estatus, 'avance' => $avance,
            'id_diagrama' => $id_diagrama, 'f_inicio' => $f_inicio, 'f_fin' => $f_fin, 'color' => $color, 'tipo' => $tip_ac, 'created_at' => "$dia", 'updated_at' => "$dia"
        ]);

        $n_diag = DB::table('diagramas')->select('nombre')->where('id', $id_diagrama)->first();
        $movimiento = "Se genero una nueva tarea para el diagrama:" . $n_diag->nombre . " por el usuario:" . Auth::user()->name . "Datos: Nombre:" . $nombre .
            " /Descripcion:" . $descripcion . " /Tipo de actividad" . $tip_ac . " /Lider:" . $lider . " /Materiales:" . $materiales . " /Estatus:" . $estatus . " /Avance:" . $avance . "%" .
            " /Fecha de inicio:" . $f_inicio . " /Fecha de fin:" . $f_fin;

        $this->movimiento_bitacora($mi_id, $movimiento, $id_diagrama);


        $mensaje = "Tarea generada con exito";

        if (!empty($filtrado)) {
            return $this->diagrama_filtrado($id_diagrama, $mensaje);
        } else {
            return $this->diagrama($id_diagrama, $mensaje);
        }
    }

    public function tarea_actualizar(Request $request)
    {
        //dd($_POST);
        $mi_id = Auth::id();
        $filtrado = $request->input('fill');
        $id_tarea = $request->input('tarea');
        $id_diagrama = $request->input('dg');
        $nombre = $request->input('nombre');
        $descripcion = $request->input('descripcion');
        $lider = $request->input('lider_proyecto');
        $materiales = $request->input('materiales');
        $estatus = $request->input('estatus');
        $avance = $request->input('avance');
        $f_inicio = $request->input('f_inicio');
        $f_fin = $request->input('f_fin');
        $color = $request->input('color');
        $tip_ac = $request->input('tip_tar');
        $dia = Carbon::now();
        $post = (isset($mi_id) && !empty($mi_id)) && (isset($id_tarea) && !empty($id_tarea)) && (isset($id_diagrama) && !empty($id_diagrama)) && (isset($nombre) && !empty($nombre)) && (isset($descripcion) && !empty($descripcion))  && (isset($lider) && !empty($lider))  && (isset($materiales) && !empty($materiales))  && (isset($estatus) && !empty($estatus)) && (isset($f_inicio) && !empty($f_inicio)) && (isset($f_fin) && !empty($f_fin)) && (isset($color) && !empty($color));
        //dd($post);
        if ($post) {
            $mensaje = "Tarea Actualizada con exito";
            $insert = DB::table('tareas')->where('id', $id_tarea)->update([
                'nombre' => $nombre, 'descripcion' => $descripcion, 'lider_proyecto' => $lider,
                'materiales' => $materiales, 'estatus' => $estatus, 'avance' => $avance, 'id_diagrama' => $id_diagrama,
                'f_inicio' => $f_inicio, 'f_fin' => $f_fin, 'color' => $color, 'tipo' => $tip_ac, 'updated_at' => "$dia"
            ]);

            $n_diag = DB::table('diagramas')->select('nombre')->where('id', $id_diagrama)->first();
            $movimiento = "Se Actualizo una tarea para el diagrama:" . $n_diag->nombre . " por el usuario:" . Auth::user()->name . "Datos: Nombre:" . $nombre .
                " /Descripcion:" . $descripcion . " /Tipo de actividad" . $tip_ac . " /Lider:" . $lider . " /Materiales:" . $materiales . " /Estatus:" . $estatus . " /Avance:" . $avance . "%" .
                " /Fecha de inicio:" . $f_inicio . " /Fecha de fin:" . $f_fin;

            $this->movimiento_bitacora($mi_id, $movimiento, $id_diagrama);
        } else {
            $mensaje = "Tarea no Actualizada verfica los datos";
        }

        if (!empty($filtrado)) {
            return $this->diagrama_filtrado($id_diagrama, $mensaje);
        } else {
            return $this->diagrama($id_diagrama, $mensaje);
        }
    }

    public function tarea_eliminar(Request $request)
    {

        $mi_id = Auth::id();
        $filtrado = $request->input('fill');
        $id_tarea = $request->input('tarea');
        $id_diagrama = $request->input('dg');
        $n_diag  = DB::table('diagramas')->select('nombre')->where('id', $id_diagrama)->first();
        $delete = DB::table('tareas')->where('id', $id_tarea)->where('id_diagrama', $id_diagrama)->delete();
        $n_tarea = DB::table('tareas')->select('nombre')->where('id', $id_tarea)->first();
        $movimiento = "Se Elimino una tarea para el diagrama:" . $n_diag->nombre . " por el usuario:" . Auth::user()->name . "Datos: Tarea:" . $n_tarea->nombre;
        $this->movimiento_bitacora($mi_id, $movimiento, $id_diagrama);
        if ($delete) {
            $mensaje = "Tarea eliminada";
        } else {
            $mensaje = "ERROR Tarea no eliminada verifica datos";
        }
        return $this->diagrama($id_diagrama, $mensaje);
    }

    private function movimiento_bitacora($id_usuario, $descripcion, $id_diagrama)
    {
        $fecha = Carbon::now();
        $movimiento = DB::table('bitacora_diagramas')->insert([
            'descripcion' => $descripcion,
            'id_genero' => $id_usuario, 'id_diagrama' => $id_diagrama, 'created_at' => $fecha, 'updated_at' => $fecha
        ]);
        if ($movimiento) {
            return "exito";
        } else {
            return "error";
        }
    }

    public function historial_diagramas($id)
    {

        $id_diagrama = $id;
        $bitacoras = DB::table('bitacora_diagramas')->where('id_diagrama', $id_diagrama)->get();
        $mensaje = "";
        $usuarios = DB::table('users')->get();
        $diagramas = DB::table('diagramas')->where('id', $id_diagrama)->get();

        return view('admin_panel/bitacora_diagramas', compact('mensaje', 'bitacoras', 'usuarios', 'diagramas'));
    }

    public function reprogramar_tarea(Request $request)
    {
        $mi_id = Auth::id();
        $filtrado = $request->input('fill');
        $id_tarea = $request->input('tarea');
        $id_diagrama = $request->input('dg');
        $descripcion = $request->input('motivo');
        $f_inicio = $request->input('f_inicio');
        $f_fin = $request->input('f_fin');
        $color = "#8f9397";
        $dia = Carbon::now();
        $mensaje = "";
        $insert = DB::table('reprogramacion_tarea')->insert([
            'motivo' => $descripcion, 'id_tarea' => $id_tarea, 'id_diagrama' => $id_diagrama, 'f_inicio' => $f_inicio, 'f_fin' => $f_fin, 'color' => $color, 'created_at' => "$dia", 'updated_at' => "$dia"
        ]);
        $movimiento = "Se reprogramo la tarea por el usuario:  " . Auth::user()->name . "Datos:  Tarea:" . $id_tarea .
            " /Motivo:" . $descripcion . " /Fecha Inicio:" . $f_inicio . " /Fecha fin:" . $f_fin;

        $this->movimiento_bitacora($mi_id, $movimiento, $id_diagrama);
        if ($insert) {
            $mensaje = "Se Reprogramo la tarea esta accion no podra modificarse";
        } else {
            $mensaje = "Error verifica datos";
        }

        if (!empty($filtrado)) {
            return $this->diagrama_filtrado($id_diagrama, $mensaje);
        } else {
            return $this->diagrama($id_diagrama, $mensaje);
        }
    }
}
