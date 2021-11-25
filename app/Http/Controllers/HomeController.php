<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
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

        if(Auth::user()->tipo_usuario == 1){ 
            return view('admin_panel/index'); 
        }else{
            return view('home');
        }
    }

    public function generar_diagrama(){

        if(Auth::user()->tipo_usuario == 1){ 
            return view('admin_panel/diagrama'); 
        }else{
            return view('home');
        }
    }
}
