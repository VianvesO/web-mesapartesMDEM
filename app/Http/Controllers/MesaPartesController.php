<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expediente;
use App\Mail\CorreoMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\File;


class MesaPartesController extends Controller
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



        
        $dtDatos = Expediente::where(function($query) use($request){
            $query->where('NroExpediente', 'LIKE', '%'.$request->buscar.'%');

        })->orderBy('Fecha','DESC')->orderBy('Hora','DESC')->paginate(10);
    

        return view('admin.expedientes.index',['viewDatos'=>$dtDatos,'valbuscar'=>$request->buscar,'request'=>$request]);





    }

    public function filtrar(Request $request){
        
        
        if ($request->has('fecha_inicio') && $request->has('fecha_fin')) {
            $fecha_inicio = $request->input('fecha_inicio');
            $fecha_fin = $request->input('fecha_fin');
            $dtDatos = Expediente::Buscar($request->buscar)
            ->whereBetween('Fecha', [$fecha_inicio, $fecha_fin])
            ->orderBy('Fecha', 'DESC')
            ->orderBy('Hora', 'DESC')
            ->paginate(10);
        } else {
            $dtDatos=Expediente::Buscar($request->buscar)->orderBy('Fecha','DESC')->orderBy('Hora','DESC')->paginate(10);
            
        }
        return view('admin.expedientes.index',['viewDatos'=>$dtDatos,'valbuscar'=>$request->buscar,'request' => $request]);


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

        $all=json_decode($request->lista,true);
     
        print_r($all);
        $archivo= url('/docus/mesapartes/').'/'.$all['Archivo'];

        $data=[
            'id'=> $all['id'],
            'Tipo'=> $all['Tipo'],
            'Asunto'=> $all['Asunto'],
            'Fecha'=> $all['Fecha'],
            'Hora'=> $all['Hora'],
            'NroExpediente'=> $all['NroExpediente'],
            'Telefono'=> $all['Telefono'],
            'Folios'=> $all['Folios'],
            'Estado'=> $all['Estado'],
            'nombre'=>$request->input('nombre'),


        ];
       
      //  foreach($all as $row){
         //   echo $row->id;
       // }

   // return $all->id;
   
       
        
   /*     if ($request->hasFile('file')) {
            $destino=$request->input('correo');
            
            $correo = new CorreoMail($data);
            Mail::to($destino)->send($correo->attach($request->file->getRealPath(), [
                'as' => $request->file->getClientOriginalName(),
                'mime' => $request->file->getClientMimeType(),
            ]));
          return redirect()->back();
        } else {
            return "No se ha subido correctamente el archivo";
        }*/
        
            $destino=$request->input('correo');
            
            $correo = new CorreoMail($data);
            Mail::to($destino)->send($correo->attach($archivo, [
                'as' =>$all['Archivo'],
                'mime' => 'application/pdf',
            ]));
          return redirect()->back();
      
        
 
          } 

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dtDatos=Expediente::find($id);
         return view('admin.expedientes.atender',['viewDatos'=>$dtDatos]);
         
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

        $dtDatos=Expediente::find($id);
        $dtDatos->Estado=$request->Estado;
        $dtDatos->save();
        return redirect()->route('mesapartes.show',$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $viewDatos=Expediente::find($id);
        if (File::exists(public_path('docus/mesapartes/'.$viewDatos->Archivo))) {
            File::delete(public_path('docus/mesapartes/'.$viewDatos->Archivo));
        }
        $viewDatos->delete();

        return redirect()->back();
        //
    }
}
