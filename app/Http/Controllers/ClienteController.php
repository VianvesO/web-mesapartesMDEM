<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expediente;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExpedienteExport;
use App\Correlativo;
use date;
use DB;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function registrar()
    {
        return view('registrar');
    }
    public function buscar(Request $request)
    {
        $dtDatos=Expediente::BuscarExpe($request->buscar)->where('Anio',date('Y'))->where('CodSeguridad',$request->codigo)->paginate(10);
        return view('seguimiento',['viewDatos'=>$dtDatos,'valbuscar'=>$request->buscar,'valcodigo'=>$request->codigo]);
    }
    public function excel(Request $request)
    {
        $fecha_inicio = $request->input('fecha_inicio');
        $fecha_fin = $request->input('fecha_fin');
    
        $expedientes = Expediente::select('Fecha', 'NroExpediente', 'Tipo', 'Asunto', 'Remitente', 'Estado', 'CodSeguridad')
                ->when($fecha_inicio && $fecha_fin, function ($query) use ($fecha_inicio, $fecha_fin) {
                    return $query->whereBetween('Fecha', [$fecha_inicio, $fecha_fin]);
                })
                ->orderBy('Fecha', 'desc')
                ->get();
    
        return Excel::download(new ExpedienteExport($expedientes), 'expedientes.xlsx');
    }
    




    public function guardardocu(Request $request)
    {
        $inicia=0;
        /*
        $dtCorre=Correlativo::where('Anio',date('Y'))->get();
        if ($dtCorre->count()>0) {
            foreach ($dtCorre as $correlativo) {
              $inicia=$correlativo->Numero;
            }
        }*/
        $fecha=date('Y-m-d');
        $hora=date('H:i:s');
        
        $ultimo=DB::table('expediente')->where('Anio',date('Y'))->max('nroExpediente');
        $newNro='';
        if ($ultimo==0) {
            $newNro=str_pad(($inicia + 1), 6, "0", STR_PAD_LEFT);
        }else{
            $num=$ultimo;
            $newNro=str_pad(($num + 1), 6, "0", STR_PAD_LEFT);
        }
        if($request->file('Archivo'))
        {
           $archivo=$request->file('Archivo');
            $name='REG'.$newNro.'.'.$archivo->getClientOriginalExtension();
            $path=public_path().'/docus/mesapartes';
            $archivo->move($path,$name);
        }

        $txtTelf='';
        $txtCorreo='';
        if ($request->Correo!='') { $txtCorreo=$request->Correo; }
        if ($request->Telefono!='') { $txtTelf=$request->Telefono; }



        $anio=date('Y');
        $txtExpe=$newNro*1;
        $txtNumPrimo1=13;
        $txtNumPrimo2=21;
        $txtNumPrimo3=3;

        $v1=$txtExpe * $txtNumPrimo1;
        $v2=$v1 + ($anio*1);
        $v3=$v2 * $txtNumPrimo3;
        $v4=$v3 - $txtNumPrimo2;
        $nFolios=1;
        if (is_numeric($request->Folios)) {
            $nFolios=$request->Folios;
        }
        if ($request->input('Tipo') === 'Otros') {
            $tipo = $request->input('OtroTipo');
        } else {
            $tipo = $request->input('Tipo');
        }
        $dtExpe=new Expediente();
        $dtExpe->Anio=date('Y');
        $dtExpe->Fecha=$fecha;
        $dtExpe->Hora=$hora;
        $dtExpe->Tipo=$tipo;
        $dtExpe->Asunto=$request->Asunto;
        $dtExpe->TipoPersona=$request->TipoPersona;
        $dtExpe->NumDocumento=$request->NumDocumento;
        $dtExpe->Remitente=mb_strtoupper($request->Remitente);
        $dtExpe->Archivo='REG'.$newNro.'.pdf';
        $dtExpe->Correo=$txtCorreo;
        $dtExpe->Telefono=$txtTelf;        
        $dtExpe->NroExpediente=$newNro*1;
        $dtExpe->NroExpedientetxt=$newNro;
        $dtExpe->Estado='Pendiente';
        $dtExpe->Observaciones='';
        $dtExpe->Folios=$nFolios;
        $dtExpe->CodSeguridad=$v4;
        $dtExpe->save();
        $id=$dtExpe->id;
        $encrypted = \Illuminate\Support\Facades\Crypt::encrypt($id);
        return redirect("/mdp/cargodocu/$encrypted");

    }

    public function cargodocu($dato)
    {
       $idExpe=\Illuminate\Support\Facades\Crypt::decrypt($dato);
       $dtDatos=Expediente::find($idExpe);
       if ($dtDatos->count()>0) {
          return view('cargodocu',['idexpeCrypt'=>$dato]); 
       }else{
        return redirect("/");
       }
        //$encrypted = \Illuminate\Support\Facades\Crypt::encrypt($string);
        //$decrypted_string = \Illuminate\Support\Facades\Crypt::decrypt($encrypted);
    }

    

    public function index(Request $request)
    {

    }
    /**valbuscar
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
        //
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
