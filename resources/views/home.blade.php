@inject('viewRoles','App\Roles')
@inject('ajax_fun','App\Http\Controllers\AjaxController')
@extends('layouts.templete')
@section('title','Inicio')
@section('cabecera')
      <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i> Inicio</a></li>
        <li class="active">Principal</li>
      </ol>
@endsection
@section('contenido')

<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12"></div>
    <div class="col-lg-6 col-md-6 col-sm-4 col-xs-4" style="text-align: center;">
        <br><img src="{{ asset('images/mesa1.png') }}" alt="" width="70%">
    </div>
</div>

<hr>

<div class="row">
    <div class="col-lg-3">
        <a href="{{ route('mesapartes.index') }}">
        <div style="background-color: #CB2828;color: #fff;padding: 10px;border-radius: 10px;">
            <div style="display: flex;justify-content: center;font-size: 20pt;">
                <i class="fa fa-folder-open"></i>
            </div>
            <div style="display: flex;justify-content: center;">
                <small style="font-size: 13pt;">Pendientes</small>
            </div>

            <div style="display: flex;justify-content: center;">
                <small style="font-size: 15pt;">{{ $ajax_fun->contador_expedientes('Pendiente') }}</small>
            </div> 
        </div>          
        </a>
    </div>
    <div class="col-lg-3">
        <a href="{{ route('mesapartes.index') }}">
        <div style="background-color: #068A35;color: #fff;padding: 10px;border-radius: 10px;">
            <div style="display: flex;justify-content: center;font-size: 20pt;">
                <i class="fa fa-file"></i>
            </div>
            <div style="display: flex;justify-content: center;">
                <small style="font-size: 13pt;"> Atendidos</small>
            </div>

            <div style="display: flex;justify-content: center;">
                <small style="font-size: 15pt;">{{ $ajax_fun->contador_expedientes('Atendido') }}</small>
            </div> 
        </div>          
        </a>
    </div>
    <div class="col-lg-3">
        <a href="{{ route('mesapartes.index') }}">
        <div style="background-color: #B59F0B;color: #fff;padding: 10px;border-radius: 10px;">
            <div style="display: flex;justify-content: center;font-size: 20pt;">
                <i class="fa fa-file"></i>
            </div>
            <div style="display: flex;justify-content: center;">
                <small style="font-size: 13pt;"> En Trámite</small>
            </div>

            <div style="display: flex;justify-content: center;">
                <small style="font-size: 15pt;">{{ $ajax_fun->contador_expedientes('En Tramite') }}</small>
            </div> 
        </div>          
        </a>
    </div>
    <div class="col-lg-3">
        <a href="{{ route('mesapartes.index') }}">
        <div style="background-color: #6A6464;color: #fff;padding: 10px;border-radius: 10px;">
            <div style="display: flex;justify-content: center;font-size: 20pt;">
                <i class="fa fa-file"></i>
            </div>
            <div style="display: flex;justify-content: center;">
                <small style="font-size: 13pt;"> Denegados</small>
            </div>

            <div style="display: flex;justify-content: center;">
                <small style="font-size: 15pt;">{{ $ajax_fun->contador_expedientes('Denegado') }}</small>
            </div> 
        </div>          
        </a>
    </div>
</div>


<script type="text/javascript">
$(document).ready(function(){


});
</script>


@endsection


