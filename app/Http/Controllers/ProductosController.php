<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\DB;
use Auth;
use Carbon\Carbon;

class ProductosController extends Controller
{
    public function index()
    {
        $mensaje = "";

        if (Auth::user()->tipo_usuario == 1) {
            return view('admin_panel/productos', compact('mensaje'));
        } else {
            return view('home');
        }
    }
}
