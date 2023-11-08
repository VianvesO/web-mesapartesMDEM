<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Date;
use App\UsuarioAlerta;
use App\TipoAlerta;
use App\AlertaUsuario;
use App\Expediente;

class AjaxController extends Controller
{
    
    function cargarAlertas(Request $request)
    {
        if ($request->ajax()) {
            $rsdatos='';
            $lista=[];
            $resul=DB::table('alerta_usuario')->where('Estado_Alerta',0)->get();
            if ($resul->count()>0) {
            	$rsdatos=$resul;
                foreach ($resul as $alerta) {
                   $dtUsuario=UsuarioAlerta::where('Id_Usuario_Alerta',$alerta->Id_Usuario_Alerta)->first(); // Doc_Identidad,Nombres,Apellidos
                   $dtTipoAlerta=TipoAlerta::where('Id_Tipo_Alerta',$alerta->Id_Tipo_Alerta)->first(); // Descripcion_Tipo_Alerta
                   $nombres=mb_strtoupper('DNI: '.$dtUsuario->Doc_Identidad.' - '.$dtUsuario->Nombres.' '.$dtUsuario->Apellidos);
                   $tipoalerta=mb_strtoupper($dtTipoAlerta->Descripcion_Tipo_Alerta);
                   $fechaalerta=$alerta->Fecha_Alerta.'  '.$alerta->Hora_Alerta;
                   array_push($lista, ['id'=>$alerta->Id_Alerta,'usuario'=>$nombres,'tipo'=>$tipoalerta,'fecha'=>$fechaalerta,'foto'=>$alerta->fotografia_alerta]);
                }
            }

            $rsdatossereno='';
            $sereno=DB::table('sereno')->where('Estado_trabajo',1)->where('Token','<>','')->get();
            if ($sereno->count()>0) {
              $rsdatossereno=$sereno;
            }


            $data=array('datos' => $rsdatos,'detalles'=>$lista,'serenos'=>$rsdatossereno);
            echo json_encode($data);
        }
    }

    function cargarSerenos(Request $request)
    {
        if ($request->ajax()) {
            $rsdatossereno='';
            $sereno=DB::table('sereno')->where('Estado_trabajo',1)->where('Token','<>','')->get();
            if ($sereno->count()>0) {
              $rsdatossereno=$sereno;
            }
            $data=array('serenos'=>$rsdatossereno);
            echo json_encode($data);
        }
    }


// atenderAlerta

    function atenderAlerta(Request $request)
    {
      $id=$request->IdAlerta;
      $horaAtencion=date('H:i:s a');
       DB::table('alerta_usuario')->where('Id_Alerta', $id)->update(['Estado_Alerta'=>1,'Descripcion_Alerta'=>'Atendido','Hora_Atencion'=>$horaAtencion]);
      return redirect()->route('home');
    }


    function falsaAlerta(Request $request)
    {
      $id=$request->IdAlerta;
      $horaAtencion=date('H:i:s a');
       DB::table('alerta_usuario')->where('Id_Alerta', $id)->update(['Estado_Alerta'=>2,'Descripcion_Alerta'=>'Falsa Alerta','Hora_Atencion'=>$horaAtencion]);
      return redirect()->route('home');
    }

    function buscarUsuario(Request $request)
    {
        if ($request->ajax()) {
            $dni=$request->get('dni');
            $aux='no';
            $nombres='';
            $apellidos='';
            $datos=DB::table('usuario_alerta')->where('Doc_Identidad',$dni)->get();
            if ($datos->count()>0) {
              foreach ($datos as $row) {
                $aux='si';
                $nombres=mb_strtoupper($row->Nombres);
                $apellidos=mb_strtoupper($row->Apellidos);
              }
            }else{
              $aux='no';
            }

            $data=array('existe' => $aux,'txtnombres'=>$nombres,'txtapellidos'=>$apellidos);
            echo json_encode($data);
        }
    }

    function contadorAlertas(Request $request)
    {
      if ($request->ajax()) {
        $Alertas=AlertaUsuario::where('Estado_Alerta',0)->count();
        $data=array('total' => $Alertas);
        echo json_encode($data);
      }
    }

    

    function reporteAlertas(Request $request){
        if ($request->ajax()) {
            $desde=$request->get('desde');
            $hasta=$request->get('hasta');
            $tipo=$request->get('tipo');
            $lista=[];
            if ($desde!='' && $hasta!='') {
              if ($tipo=='') {
                $resul=AlertaUsuario::where('fecha_reporte','>=',$desde)->where('fecha_reporte','<=',$hasta)->get();
              }else{
                $resul=AlertaUsuario::where('fecha_reporte','>=',$desde)->where('fecha_reporte','<=',$hasta)->where('Id_Tipo_Alerta',$tipo)->get();
              }
              if ($resul->count()>0) {
                  foreach ($resul as $alerta) {
                     $dtUsuario=UsuarioAlerta::where('Id_Usuario_Alerta',$alerta->Id_Usuario_Alerta)->first(); // Doc_Identidad,Nombres,Apellidos
                     $dtTipoAlerta=TipoAlerta::where('Id_Tipo_Alerta',$alerta->Id_Tipo_Alerta)->first(); // Descripcion_Tipo_Alerta
                     $nombres=mb_strtoupper('DNI: '.$dtUsuario->Doc_Identidad.' - '.$dtUsuario->Nombres.' '.$dtUsuario->Apellidos);
                     $tipoalerta=mb_strtoupper($dtTipoAlerta->Descripcion_Tipo_Alerta);
                     $fechaalerta=$alerta->Fecha_Alerta.'  '.$alerta->Hora_Alerta;
                     array_push($lista, ['id'=>$alerta->Id_Alerta,'usuario'=>$nombres,'tipo'=>$tipoalerta,'latitud'=>$alerta->Latitud,'longuitud'=>$alerta->Longitud]);
                  }
              }              
            }

            $data=array('alertas' => $lista);
            echo json_encode($data);
        }        

    }


    function alertasUsuario(Request $request){
        if ($request->ajax()) {
            $idUsuario=$request->get('id');
            $listaHtml='';
            $datos=AlertaUsuario::where('Id_Usuario_Alerta',$idUsuario)->get();
            if ($datos->count()>0) {
              $x=0;
              foreach ($datos as $alerta) {
                $x++;
                
                $dtTipoAlerta=TipoAlerta::where('Id_Tipo_Alerta',$alerta->Id_Tipo_Alerta)->first();
                $listaHtml= $listaHtml . '<tr>'.
                '<td>'.$x.'</td>'.
                '<td>'.$dtTipoAlerta->Descripcion_Tipo_Alerta.'</td>'.
                '<td>'.$alerta->Fecha_Alerta.'</td>'.
                '<td>'.$alerta->Hora_Alerta.'</td>'.
                '<td>'.$alerta->Hora_Atencion.'</td>'
                .'</tr>';
              }
            }else{
              $listaHtml=$listaHtml. '<tr><td colspan="5"><span style="color: #D03D3D;font-size:13pt;"> No existe datos... </span></td></tr>';
            }

            $data=array('datos' => $listaHtml);
            echo json_encode($data);
        }        

    }

        public function contador_expedientes($estado)
    {
      $dt_count=Expediente::where('Estado',$estado)->count('id');
      return $dt_count;
    }


    public function enviar_correo()  
    {
            $for='tareacompleto@gmail.com';
            $mensaje = "Mesa de partes";// asunto
            $datos=array('estado'=>'Pendientes');
            Mail::send('mensaje',$datos, function($msj) use($mensaje,$for){
                $msj->from('mspartes.virtual@gmail.com',"Mesa de Partes");
                $msj->subject($mensaje);
                $msj->to($for);
            }); 
    }


}

