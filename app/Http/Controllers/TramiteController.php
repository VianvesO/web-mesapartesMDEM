<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expediente;
use App\Tramite;
use Mail;

class TramiteController extends Controller
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
    public function index()
    {
        //
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
        $fecha=date('Y-m-d');
        $numero=date('Y').date('m').date('d').date('H').date('i').date('s');
        if($request->file('Archivo'))
        {
           $archivo=$request->file('Archivo');
            $name='Adjto'.$numero.'.'.$archivo->getClientOriginalExtension();
            $path=public_path().'/docus/mesapartes/adjuntos';
            $archivo->move($path,$name);
            $txtAdjunto='Adjto'.$numero.'.pdf';
        }else{
            $txtAdjunto='Ninguna';
        }

        $dtExpe=new Tramite();
        $dtExpe->Anio=date('Y');
        $dtExpe->Fecha=$fecha;
        $dtExpe->Expediente=$request->IdExpediente;
        $dtExpe->Comentario=$request->Descripcion;
        $dtExpe->Adjunto=$txtAdjunto;
        $dtExpe->Usuario=$request->Usuario;
         $dtExpe->Estado=$request->Estado;
        $dtExpe->save();


        $dt_expe=Expediente::find($request->IdExpediente);
        $dt_expe->Estado=$request->Estado;
        $dt_expe->save();


        $for=$dt_expe->Correo;
        $mensaje = "Expediente ".$dt_expe->NroExpedientetxt.' Estado: '.$request->Estado;// asunto
      $datos = array(
    'estado' => 'su expediente <span style="color: blue; font-weight: bold;">'.$dt_expe->NroExpedientetxt.'</span> se encuentra en estado <span style="color: blue; font-weight: bold;">'.$request->Estado.'</span> y <span style="color: blue; font-weight: bold;">'.$request->Descripcion.'</span>'
);

        Mail::send('mensaje',$datos, function($msj) use($mensaje,$for){
            $msj->from('mspartes.virtual@gmail.com',"Mesa de Partes");
            $msj->subject($mensaje);
            $msj->to($for);
        }); 
        return redirect()->route('mesapartes.show',$request->IdExpediente);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
