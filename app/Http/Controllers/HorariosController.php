<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Horario;

class HorariosController extends Controller
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
        $dtDatos=Horario::Buscar($request->buscar)->orderBy('Descripcion','ASC')->paginate(10);
        return view('admin.horarios.index',['viewDatos'=>$dtDatos,'valbuscar'=>$request->buscar]);
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
        $dtDato=new Horario($request->all());
        $dtDato->save();
        return redirect()->route('horarios.index');
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
        $dtDato=Horario::find($id);
        return view('admin.horarios.edit',['viewDatos'=>$dtDato]);
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
        $dtDato=Horario::find($id);
        $dtDato->Descripcion=$request->Descripcion;
        $dtDato->HoraInicio=$request->HoraInicio;
        $dtDato->HoraFin=$request->HoraFin;
        $dtDato->save();
        return redirect()->route('horarios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dtDato=Horario::find($id);
        $dtDato->delete();
        return redirect()->route('horarios.index');
    }
}
