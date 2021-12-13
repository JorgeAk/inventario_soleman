<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\DB;
use Auth;

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

    public function index1(){

        $mensaje ="";

        if(Auth::user()->tipo_usuario == 1){ 
            return view('admin_panel/index', compact('mensaje')); 
        }else{
            return view('home');
        }
    }

    public function perfil(){

        $mensaje ="";

        if(Auth::user()){ 
            return view('admin_panel/perfil', compact('mensaje')); 
        }else{
            return view('home');
        }
    }

    public function usuarios_control(){

        $mensaje ="";
        $usuarios = DB::table('users')->get();

        if(Auth::user()){ 
            return view('admin_panel/control_usuarios', compact('mensaje','usuarios')); 
        }else{
            return view('home');
        }
    }

    public function usuarios_actualizar(Request $request){

        dd($_POST);
        

        $mensaje ="";
        $usuarios = DB::table('users')->get();

        if(Auth::user()){ 
            return view('admin_panel/control_usuarios', compact('mensaje','usuarios')); 
        }else{
            return view('home');
        }
    }

    public function generar_diagrama(){
        $periodo = DB::table('periodo')->get();
        $mensaje = "";

        if(Auth::user()->tipo_usuario == 1){ 
            return view('admin_panel/diagrama',compact('periodo','mensaje')); 
        }else{
            return view('home');
        }
    }
}
