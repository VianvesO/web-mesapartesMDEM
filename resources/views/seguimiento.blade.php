@inject('viewRoles','App\Roles')
@inject('viewTramites','App\Tramite')
@extends('layouts.cliente')
@section('title','Buscar Expediente')
@section('contenido')
<div class="row">
    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
        <img src="{{ asset('images/banner.png') }}" alt="" width="70%">
    </div>
    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-3" style="text-align: center;">
        <br>
        <img src="{{ asset('images/mesa1.png') }}" alt="" width="85%">
    </div>

    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-3" style="text-align: center;">
        <br>
        <a href="{{ url('/') }}">
            <img src="{{ asset('images/paginaprincipal.png') }}" alt="" width="87%">
        </a>
    </div>
</div>
<br>
<div class="row" style="background-color: #0967F7;padding: 5px;margin-top: -7px;text-align: center;">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <p style="color: #F1F1F1;font-size: 12pt;">
          <i class="fa fa-search" style="margin-right: 5px;"></i> B U S C A R   
          <span style="margin-left: 10px;">D O C U M E N T O </span>
        </p>
    </div>
</div>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
        <div class="panel panel-default">
          <div class="panel-body">
            <di class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
                       {!! Form::open(['route'=>'cliente.buscardocu','method'=>'GET','class'=>'form-horizontal']) !!}
                      <div class="form-group" style="padding: 0px;">
                          <label class="col-lg-2 control-label" style="color:#1695AF;font-size: 13pt;">N° Expediente:</label>
                          <div class="col-lg-2">
                            <input type="text" name="buscar"  class="form-control" placeholder="N° Expediente..." maxlength="9" value="{{ $valbuscar }}" required="">
                          </div>
                          <label class="col-lg-2 control-label" style="color:#1695AF;font-size: 13pt;">Cod. Seguridad:</label>
                          <div class="col-lg-2">
                            <input type="text" name="codigo"  class="form-control" placeholder="Codigo" value="{{ $valcodigo }}" required="" maxlength="7">
                          </div>
                          <div class="col-lg-1 col-md-2 col-sm-6 col-xs-6">
                            <button class="btn btn-success" id="btningresar"> 
                              <i class="fa fa-search"></i>  Buscar 
                            </button>
                          </div>

                          <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
                            <a href="{{ route('cliente.buscardocu') }}" class="btn btn-link">
                              <i class="fa fa-refresh"></i>  Limpiar... 
                            </a>
                          </div>

                      </div>
                    </form>
                </div>
            </di>

<br>
            <hr style="margin-top: -16px;">
            @foreach($viewDatos as $dato)
            <div class="row" style="margin-top: -15px;">
              <div class="col-lg-6 col-md-6 com-sm-12 col-xs-12">
                <table class="table table-striped">
                  <?php 
                  $f=date_create($dato->Fecha);
                  $fecha=date_format($f,'d/m/Y');
                  ?>
                  <tr>
                    <td style="text-align: right;width: 20%;color: #1695AF;">Fecha Hora:</td>
                    <td>{{ $fecha }} {{ $dato->Hora }}</td>
                  </tr>                  
                  <tr>
                    <td style="text-align: right;width: 20%;color: #1695AF;">N° Expediente:</td>
                    <td style="color: #6F716F;"> <b>V{{ $dato->NroExpedientetxt }}</b> </td>
                  </tr>
                  <tr>
                    <td style="text-align: right;color: #1695AF;">Nombres:</td>
                    <td>
                        @if($dato->TipoPersona=='Juridica')
                        RUC <b>{{ $dato->NumDocumento }}</b>  - {{ $dato->Remitente }}
                        @endif
                        @if($dato->TipoPersona=='Natural')
                        DNI <b>{{ $dato->NumDocumento }}</b>  - {{ $dato->Remitente }}
                        @endif
                    </td>
                  </tr>
                 
                  <tr>
                    <td style="text-align: right;color: #1695AF;">Estado:</td>
                    <td>{{ $dato->Estado }}</td>
                  </tr>                  
                </table>
              </div>
              <div class="col-lg-6 col-md-6 com-sm-12 col-xs-12">
                <table class="table table-striped">
                  <tr>
                    <td style="text-align: right;width: 20%;color: #1695AF;">Tipo Documento:</td>
                    <td>{{ $dato->Tipo }}</td>
                  </tr>
                  <tr>
                    <td style="text-align: right;color: #1695AF;">Asunto:</td>
                    <td>{{ $dato->Asunto }}</td>
                  </tr>
                  <tr>
                    <td style="text-align: right;color: #1695AF;">Folios:</td>
                    <td>{{ $dato->Folios }}</td>
                  </tr>                  
                </table>                
              </div>
            </div>

            <div class="panel panel-info">
              <div class="panel-heading" style="text-align: center;font-size: 12pt;">Seguimiento del Expediente</div>
              <div class="panel-body">
                <table class="table table-striped">
                <thead style="color: #1695AF;">
                  <th>#</th>
                  <th>Fecha Hora</th>
                  <th>Descripción</th>
                  <th>Adjunto</th>
                  <th>Usuario</th>
                </thead>
                <tbody>
                  <?php $x=0; ?>
                  @foreach($viewTramites::where('Expediente',$dato->id)->get() as $tramite)
                  <?php 
                  $x++; 
                  $ft=date_create($tramite->created_at);
                  $txtft=date_format($ft,'d/m/Y H:i:s');
                  ?>
                  <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $txtft }}</td>
                    <td>{{ $tramite->Comentario }}</td>
                    <td>
                      @if($tramite->Adjunto!='Ninguna')
                      <a href='{{ url("docus/mesapartes/adjuntos/$tramite->Adjunto") }}' target="_blank" class="btn btn-link">
                        <i class="fa fa-file-pdf-o"></i>  Ver Adjunto
                      </a>
                      @endif
                    </td>
                    <td><i class="fa fa-user" style="color:#1695AF; "></i> {{ $tramite->Usuario }}</td>
                  </tr>
                  @endforeach
                </tbody>               
                </table> 
              </div>
            </div>

            @endforeach

          </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function(){

   $('#archivo').change(function (){
     var sizeByte = this.files[0].size;
     var siezekiloByte = parseInt(sizeByte / 1024);
     if(siezekiloByte >= $(this).attr('size')){
        $('#msjarchivo1').show();
<div class="row">
        $('#msjarchivo1').delay(3000).hide(500);
         $(this).val('');
     }else{
        var megas=siezekiloByte/1000;

     }
   });


});
</script>
@endsection
