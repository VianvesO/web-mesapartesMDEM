@inject('viewRoles','App\Roles')
@extends('layouts.cliente')
@section('title','Imprimir Cargo')
@section('contenido')

<style type="text/css">
    #imprimir:hover{
        width: 270px;
        box-shadow: 6px 6px 5px 0px rgba(0,0,0,0.75);
        border-radius: 15px;
    }

    #principal:hover{
        width: 89%;
        box-shadow: 6px 6px 5px 0px rgba(0,0,0,0.75);
        border-radius: 15px;
    }

</style>
<div class="row">
    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
        <img src="{{ asset('images/banner.jpg') }}" alt="" width="70%">
    </div>
    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-3" style="text-align: center;">
        <br>
        <img src="{{ asset('images/mesa1.png') }}" alt="" width="85%">
    </div>
    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-3" style="text-align: center;">
        <br>
        <a href="{{ url('/') }}">
            <img src="{{ asset('images/paginaprincipal.png') }}" alt="" width="87%" id="principal">
        </a>
    </div>
</div>
<div class="row" style="background-color: #02B898;padding: 2px;margin-top: -7px;text-align: center;">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <p style="color: #F1F1F1;font-size: 12pt;">
          <i class="fa fa-print" style="margin-right: 5px;"></i> I M P R I M I R   
          <span style="margin-left: 10px;">C A R G O </span>
        </p>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
        <div class="panel panel-success">
          <div class="panel-body">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: center;">
                    <img src="{{ asset('images/cargo.png') }}" width="100"> <br>
                    <p style="font-size: 13pt;color: #02B898;">
                        <b style="font-size: 14pt;">Su documento se ha registrado existosamente!</b> <br>
                        <span style="color: #0392D3;">Ud. puede descargar su <b>cargo</b> en formato PDF, asi también puede hacer la consulta de sus trámites <br> a través de esta plataforma, simplemente ingresando el número de expediente. </span> 
                    </p> 
                    <hr width="90%">
                    <a href="{{ route('cliente.cargodocupdf',$idexpeCrypt) }}" target="_blank">
                        <img src="{{ asset('images/imprimircargo.png') }}" alt="" width="250" id="imprimir">
                    </a>
                    <a href="https://api.whatsapp.com/send?phone=51930623569&text=hola" target="_blank">
                        <img class="img-circle" src="{{ asset('images/whats.png') }}" alt="" width="80">
                    </a>
                </div>
            </div>
          </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function(){
// este sistema de informacion es una aplicacion pensado en mejorar la atencion de los usuarios
//entre ellos estan los cuidadadnos, las entidades pulicas y privadas 
//que desean hacer algun tramite documentario o enviar un expediente de una forma sencilla y facil
//con la ayuda des esta plataforma se ahorra tiempo y dinero, ya que los usuarios pueden realizar desde
//cualquier lugar en donde se encuentren.
});
</script>
@endsection
