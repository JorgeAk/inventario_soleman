<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Auth;
use Carbon\Carbon;


class BarCodeController extends Controller
{
    public function index($id)
    {
        $mensaje = "";
        $productos = DB::table('productos')->where('id',$id)->get();
        return view('admin_panel/barcode', compact('productos', 'mensaje'));
    }
}
