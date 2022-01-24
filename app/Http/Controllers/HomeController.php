<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

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


        if (Auth::user()) {
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

    public function usuarios_control($mensaje="")
    {

        
        $usuarios = DB::table('users')->get();

        if (Auth::user()) {
            return view('admin_panel/control_usuarios', compact('mensaje', 'usuarios'));
        } else {
            return view('home');
        }
    }

    public function usuarios_actualizar(Request $request)
    {

        //dd($_POST);
        
        $mensaje = "";
        $usuarios = DB::table('users')->get();
        $nombre    = $request->input('name');
        $correo    = $request->input('email');
        $pass    = $request->input('password');
        $tipo_user    = $request->input('tipo_usuario');
        $id_usr    = $request->input('usr');

        $device = User::find($id_usr);
        
        if(empty($pass)){
            $updat = $device->update([
                'name' => $nombre,
                'email' => $correo,
                'tipo_usuario' => $tipo_user,
            ]);
        }else{
            $updat = $device->update([
                'name' => $nombre,
                'email' => $correo,
                'password' => Hash::make($pass),
                'tipo_usuario' => $tipo_user,
            ]);
        }
        

      
        if ($updat) {
            $mensaje = "Usuario Actualizado con exito";
            return view('admin_panel/index', compact('mensaje'));
        } else {
            $mensaje = "Error verifica datos";
            return view('admin_panel/index', compact('mensaje'));
        }
    }

    public function usuarios_crear(Request $request)
    {
        
        $mensaje = "";
        $usuarios = DB::table('users')->get();
        $nombre    = $request->input('name');
        $correo    = $request->input('email');
        $pass    = $request->input('password');
        $tipo_user    = $request->input('tipo_usuario');
        $creat = User::create([
            'name' => $nombre,
            'email' => $correo,
            'password' => Hash::make($pass),
            'tipo_usuario' => $tipo_user,
        ]);

        

        if ($creat) {
            $mensaje = "Usuario Creado con exito";
            return $this->usuarios_control($mensaje);
        } else {
            $mensaje = "Error verifica datos";
            return $this->usuarios_control($mensaje);
        }
    }

    public function generar_diagrama()
    {
        $periodo = DB::table('periodo')->get();
        $mensaje = "";

        if (Auth::user()) {
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

    public function obtn_prod(Request $request){

        $id_origen = $request->input('id');
        $existencia = DB::table('existencias_inventario')->select('id_producto','productos.nombre')->join('productos',"existencias_inventario.id_producto","productos.id")->where('id_ubicacion',$id_origen)->get();
        return response()->json($existencia);

    }

    public function obtn_sub_cat(Request $request){

        $id_origen = $request->input('id');
        $existencia = DB::table('sub_categorias')->select('id','nombre')->where('id_categoria',$id_origen)->get();
        return response()->json($existencia);

    }

    public function estadistico(){
        $datos = [];
        $productos  = DB::table('productos')->count();
        $sucursales = DB::table('ubicaciones')->count();
        $diagramas  = DB::table('diagramas')->count(); 
        $traslados  = DB::table('traslado_inventario')->count();
        $datos= ['productos' => $productos, 'sucursales'=>$sucursales,'diagramas'=>$diagramas,'traslados'=>$traslados];
        return response()->json($datos);

    }
}

