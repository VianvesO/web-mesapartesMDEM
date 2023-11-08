@inject('viewHorarios','App\Horario')
@extends('layouts.templete')
@section('title','Editar Web Master')
@section('cabecera')
    <h1> Usuarios <small> Editar </small> </h1>
@endsection
@section('contenido') 

<div class="row">
  <div class="col-lg-1 col-md-1 col-sm-12 col-xs-12"></div>
  <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">

{!! Form::open(['route'=>['webmasters.update',$dato->id],'method'=>'PUT']) !!}
        <!--<input type="hidden" name="Usuario" value="{{ Auth::user()->id }}"> -->

        <div class="row">
          <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12" style="text-align: center;">
            <img width="70" src="{{ asset('images/webmaster.png') }}">
          </div>
          <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
            <div class="row">
                 <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">DNI</label>
                        <input type="text" name="Dni" class="form-control" placeholder="DNI"  maxlength="8" minlength="8" value="{{ $dato->Dni }}" disabled="">
                    </div>
                 </div>
                 <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Sexo / Genero</label>
                        {!! Form::select('Genero',['F'=>'FEMENINO','M'=>'MASCULINO'],$dato->Genero,
                        ['class'=>'form-control','placeholder'=>'Seleccione...','disabled','style'=>'border-radius:5px;']) !!}
                    </div>
                 </div>                 
             </div>
             <div class="row">
                 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nombres y Apellidos</label>
                        <input type="text" name="Nombres" class="form-control" placeholder="Nombres y Apellidos" required="" value="{{ $dato->Nombres }}">
                    </div>
                 </div>
             </div>
             <div class="row">
                 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Correo Electrónico</label>
                        <input type="email" name="Email" class="form-control" placeholder="Correo Electrónico" required="" value="{{ $dato->email }}">
                    </div>
                 </div>
             </div>
            <div class="row">
                 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
                    <div class="form-group">
                        <label for="exampleInputEmail1">Horario de Trabajo</label>
                        {!! Form::select('IdHorario',$viewhorario,$dato->IdHorario,
                        ['class'=>'form-control','placeholder'=>'Seleccione Horario...','required','estyle'=>'border-radius: 5px;']) !!}
                    </div>
                 </div>
             </div>
             
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="form-group">
                    <label for="exampleInputEmail1">Estado de Trabajo</label>
                    {!! Form::select('Estado',['0'=>'DESACTIVADO','1'=>'ACTIVO'],$dato->Estado,
                    ['class'=>'form-control','placeholder'=>'Seleccione...','required','style'=>'border-radius:5px;']) !!}
                </div>
                </div>  
            </div>

            <div class="row">
                 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                   <button type="submit" class="btn btn-warning" name="btnAceptar" id="btnaceptar">
                   <i class="fa fa-check"></i> Aceptar</button>
                  <a href="{{ route('webmasters.index') }}" class="btn btn-primary" >
                  <i class="fa fa-remove"></i> Cancelar</a>
                 </div>
            </div>
          </div>
        </div>
    </form>

  </div>
</div>





<script type="text/javascript">
$(document).ready(function(){

}); 
</script>


@endsection
