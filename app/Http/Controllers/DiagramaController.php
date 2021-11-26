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


    public function mis_diagramas(){

        $mi_id = Auth::id();
        //dd($mi_id);
        $mensaje = "";
        $diagramas = DB::table('diagramas')->where('id_usuario',$mi_id)->get();
        $periodo = DB::table('periodo')->get();

        if(Auth::user()->tipo_usuario == 1){ 
            return view('admin_panel/mis_diagramas',compact('diagramas','periodo','mensaje')); 
        }else{
            return view('home');
        }
        
    }

    
    public function generar_nuevo(Request $request){

        $nombre = $request->input('n_diagrama');
        $descripcion = $request->input('d_diagrama');
        $duracion = $request->input('duracion_diagrama');
        $id_periodo = $request->input('duracion_dividir');
        $usuario = Auth::user()->id;
        $dia = Carbon::now();
        $periodo = DB::table('periodo')->get();
        //dd($_POST);
        $mensaje = "";
        $insert = DB::table('diagramas')->insert(['nombre'=>$nombre,'descripcion'=>$descripcion,
        'id_usuario'=>$usuario,'id_periodo'=>$id_periodo,'duracion'=>$duracion,'created_at'=>"$dia",'updated_at'=>"$dia"]);
        if($insert){
            $mensaje ="Diagrama generado con exito";
            if(Auth::user()->tipo_usuario == 1){ 
                return view('admin_panel/diagrama',compact('periodo','mensaje')); 
            }else{
                return view('home');
            }
        }   

    }


}
