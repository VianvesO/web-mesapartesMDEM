
@extends('layouts.templete')
@section('title','Editar Horario')
@section('cabecera')
    <h1> Horarios <small> Editar... </small> </h1>
@endsection
@section('contenido')
 
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"> <i class="fa fa-edit"></i> Editar</div>
                <div class="panel-body">
{!! Form::open(['route'=>['horarios.update',$viewDatos->id],'method'=>'PUT']) !!}
<input type="hidden" name="Usuario" value="{{ Auth::user()->id }}">
        <div class="row">
          <div class="col-lg-1 col-md-1 col-sm-12 col-xs-12" style="text-align: center;">
            <img width="80" src="{{ asset('images/editarhorario.png') }}">
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
             
            <div class="row">
                 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Descripcion</label>
                        <input type="text" name="Descripcion" class="form-control" placeholder="Descripcion"  required="" value="{{ $viewDatos->Descripcion }}">
                    </div>
                 </div>
             </div>
             <div class="row">
                 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Hora de Inicio</label>
                        <input type="time" name="HoraInicio" class="form-control" placeholder="Hora de Inicio" required="" value="{{ $viewDatos->HoraInicio }}">
                    </div>
                 </div>
             </div>
            <div class="row">
                 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Hora de Finalización</label>
                        <input type="time" name="HoraFin" class="form-control" placeholder="Hora de Finalizacion" required="" value="{{ $viewDatos->HoraFin }}">
                    </div>
                 </div>
             </div>
          </div>
        </div>
  <hr>
  <p style="text-align: center;">
      <button type="submit" class="btn btn-warning" name="btnAceptar" id="btnaceptar">
        <i class="fa fa-check"></i> Aceptar
      </button>
      <a href="{{ route('horarios.index') }}" class="btn btn-primary" >
            <i class="fa fa-remove"></i> Cancelar
      </a>
  </p>
</form>

                </div>
            </div>
        </div>
    </div>


<script type="text/javascript">
$(document).ready(function(){



});
    
</script>

@endsection
