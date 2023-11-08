<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WebMaster;
use App\Horario;
use DB;

class WebMastersController extends Controller
{
    public function __construct()
    {
       $this->middleware(['auth','roles:1']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dtDatos=WebMaster::Buscar($request->buscar)->orderBy('Nombres','ASC')->paginate(10);
        return view('admin.webmasters.index',['viewDatos'=>$dtDatos,'valbuscar'=>$request->buscar]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dtDato=new WebMaster();
        $dtDato->Rol=1;
        $dtDato->Dni=$request->Dni;
        $dtDato->Nombres=$request->Nombres;
        $dtDato->Genero=$request->Sexo;
        $dtDato->email=$request->Email;
        $dtDato->email_verified_at=null;
        $dtDato->remember_token=null;
        $dtDato->password=bcrypt($request->Dni);
        $dtDato->IdHorario=$request->IdHorario;
        $dtDato->Estado=1;
        $dtDato->session_id='';
        $dtDato->save();
        return redirect()->route('webmasters.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $horario = Horario::select(
                DB::raw("CONCAT(Descripcion,' / ',HoraInicio,' - ',HoraFin) AS horario"),'id')
                ->orderBy('Descripcion','ASC')
                ->pluck('horario', 'id');
        $dtDatos=WebMaster::find($id);
        return view('admin.webmasters.edit',['dato'=>$dtDatos,'viewhorario'=>$horario]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dtDato=WebMaster::find($id);
        $dtDato->Nombres=$request->Nombres;
        $dtDato->email=$request->Email;
        $dtDato->IdHorario=$request->IdHorario;
        $dtDato->Estado=$request->Estado;
        $dtDato->save();
        return redirect()->route('webmasters.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dtDato=WebMaster::find($id);
        $dtDato->Estado=0;
        $dtDato->save();
        return redirect()->route('webmasters.index');
    }
    public function clave()
    {
        return view('clave');
    }
    public function CambiarClave(Request $request)
    {
        $dtDato=WebMaster::find($request->Usuario);
        $dtDato->password=bcrypt($request->Clave);
        $dtDato->save();
        return redirect()->route('home');
    }


}
