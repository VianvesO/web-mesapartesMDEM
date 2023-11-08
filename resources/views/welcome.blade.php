@inject('viewRoles','App\Roles')
@extends('layouts.cliente')
@section('title','Página Principal')
@section('contenido')

<style type="text/css">
    body{
       /* background-image: url("images/fondomp.png");*/ background-color: #FFFFFF; height: auto;background-repeat: no-repeat;min-height: 100vh;background-position: center center;background-size: cover;
    }
</style>

<div class="row">
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
        <img src="{{ asset('images/banner.png') }}" alt="" width="60%">
    </div>
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6" style="text-align: center;">
        <br><br>
        <img src="{{ asset('images/mesa1.png') }}" alt="" width="90%">
    </div>
</div>


<div class="row">
    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12"></div>
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <a href="{{ route('cliente.registrardocu') }}">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: center;">
                    <img src="{{ asset('images/registrardocu.png') }}" width="90%">
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" style="text-align: center;">
        <a href="{{ route('cliente.buscardocu') }}">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <img src="{{ asset('images/buscardocu.png') }}" width="90%">
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





