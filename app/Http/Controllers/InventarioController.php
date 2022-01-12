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

        if (Auth::user()->tipo_usuario == 1) {
            return view('admin_panel/productos', compact('mensaje', 'productos', 'categorias', 'sub_categorias', 'sucursales'));
        } else {
            return view('home');
        }
    }
}
