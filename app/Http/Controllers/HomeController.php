<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\DB;
use Auth;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function index1()
    {

        $mensaje = "";

        if (Auth::user()->tipo_usuario == 1) {
            return view('admin_panel/index', compact('mensaje'));
        } else {
            return view('home');
        }
    }

    public function perfil()
    {

        $mensaje = "";

        if (Auth::user()) {
            return view('admin_panel/perfil', compact('mensaje'));
        } else {
            return view('home');
        }
    }

    public function usuarios_control()
    {

        $mensaje = "";
        $usuarios = DB::table('users')->get();

        if (Auth::user()) {
            return view('admin_panel/control_usuarios', compact('mensaje', 'usuarios'));
        } else {
            return view('home');
        }
    }

    public function usuarios_actualizar(Request $request)
    {

        dd($_POST);


        $mensaje = "";
        $usuarios = DB::table('users')->get();

        if (Auth::user()) {
            return view('admin_panel/control_usuarios', compact('mensaje', 'usuarios'));
        } else {
            return view('home');
        }
    }

    public function generar_diagrama()
    {
        $periodo = DB::table('periodo')->get();
        $mensaje = "";

        if (Auth::user()->tipo_usuario == 1) {
            return view('admin_panel/diagrama', compact('periodo', 'mensaje'));
        } else {
            return view('home');
        }
    }

    public function ubicaciones($mensaje="")
    {
        $mi_id = Auth::id();
        //dd($mi_id);
        $ubicaciones = DB::table('ubicaciones')->get();
        $tipo_ubicaciones = DB::table('tipo_ubicaciones')->get();

        if (Auth::user()->tipo_usuario == 1) {
            return view('admin_panel/ubicaciones', compact('ubicaciones', 'tipo_ubicaciones', 'mensaje'));
        } else {
            return view('home');
        }
    }

    public function ubicaciones_nueva(Request $request)
    {
        
        $nombre    = $request->input('nombre');
        $direccion = $request->input('direccion');
        $telefono  = $request->input('telefono');
        $ciudad    = $request->input('ciudad');
        $descripcion = $request->input('descripcion');
        $tipo        = $request->input('tipo');
        $dia = Carbon::now();
        $periodo = DB::table('periodo')->get();
        
        $tipo_ubicaciones = DB::table('tipo_ubicaciones')->get();
        //dd($_POST);
        $mensaje = "";
        $insert = DB::table('ubicaciones')->insert([
            'nombre' => $nombre, 'direccion' => $direccion,
            'telefono' => $telefono, 'ciudad' => $ciudad, 'descripcion' => $descripcion,
            'id_tipo'=>$tipo, 'created_at' => "$dia", 'updated_at' => "$dia"
        ]);

        $ubicaciones = DB::table('ubicaciones')->get();
        if (Auth::user()->tipo_usuario == 1 and $insert) {
            $mensaje = "Ubicacion agregada con exito";
            return view('admin_panel/ubicaciones', compact('ubicaciones', 'tipo_ubicaciones', 'mensaje'));
        } else {
            return view('home');
        }
    }

    public function ubicaciones_actualizar(Request $request)
    {
        
        $nombre    = $request->input('nombre');
        $direccion = $request->input('direccion');
        $telefono  = $request->input('telefono');
        $ciudad    = $request->input('ciudad');
        $descripcion = $request->input('descripcion');
        $tipo        = $request->input('tipo');
        $id_ubicacion   = $request->input('ubc');
        $dia = Carbon::now();
        $periodo = DB::table('periodo')->get();
        $tipo_ubicaciones = DB::table('tipo_ubicaciones')->get();
        //dd($_POST);
        $mensaje = "";
        $insert = DB::table('ubicaciones')->where('id',$id_ubicacion)->update([
            'nombre' => $nombre, 'direccion' => $direccion,
            'telefono' => $telefono, 'ciudad' => $ciudad, 'descripcion' => $descripcion,
            'id_tipo'=>$tipo,'updated_at' => "$dia"
        ]);

        $ubicaciones = DB::table('ubicaciones')->get();

        if (Auth::user()->tipo_usuario == 1 and $insert) {
            $mensaje = "Ubicacion agregada con exito";
            return view('admin_panel/ubicaciones', compact('ubicaciones', 'tipo_ubicaciones', 'mensaje'));
        } else {
            return view('home');
        }
    }

    public function ubicaciones_eliminar(Request $request)
    {
        $mi_id = Auth::id();       
        $id_ubicacion = $request->input('ub');
        $delete = DB::table('ubicaciones')->where('id', $id_ubicacion)->delete();
        if ($delete) {
            $mensaje = "Ubicacion eliminada";
        } else {
            $mensaje = "ERROR Ubicacion no eliminada verifica datos";
        }
        return $this->ubicaciones($mensaje); 
    }
}
