<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AlertaUsuario;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','roles:1']); 
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $Alertas=AlertaUsuario::where('Estado_Alerta',0)->count();
        return view('home',['vCantidad'=>$Alertas]);
    }
}
