@inject('viewWebs','App\WebMaster')
@extends('layouts.templete')
@section('title','Horarios')
@section('cabecera')
    <h1> Horarios <small> Lista </small> </h1>
@endsection
@section('contenido') 

<div class="row">
  <div class="modal fade" id="confirmar">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class="fa fa-calendar"></i> Registrar Horario</h4>
        </div>
        {!! Form::open(['route'=>'horarios.store','method'=>'POST']) !!}
        <!--<input type="hidden" name="Usuario" value="{{ Auth::user()->id }}"> -->
        <div class="modal-body">
        <div class="row">
          <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12" style="text-align: center;">
            <img width="70" src="{{ asset('images/nuevohorario.png') }}">
          </div>
          <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
             <div class="row">
                 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Descripcion</label>
                        <input type="text" name="Descripcion" class="form-control" placeholder="Descripcion" required="">
                    </div>
                 </div>
             </div>
            <div class="row">
                 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Hora de Inicio</label>
                        <input type="time" name="HoraInicio" class="form-control" placeholder="Hora de Inicio" required="">
                    </div>
                 </div>
             </div>
            <div class="row">
                 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Hora de Finalización</label>
                        <input type="time" name="HoraFin" class="form-control" placeholder="Hora de Finalizacion" required="">
                    </div>
                 </div>
             </div>


          </div>
        </div>
        </div>
        <div class="modal-footer">
           <button type="submit" class="btn btn-warning" name="btnAceptar" id="btnaceptar">
           <i class="fa fa-check"></i> Aceptar</button>
          <button type="button" class="btn bg-navy" data-dismiss="modal">
          <i class="fa fa-remove"></i> Cancelar</button>
        </div>
    </form>


      </div>
    </div>
  </div>
</div>


<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <button type="button" class="btn btn-warning" style="margin-right: 10px;" data-toggle="modal" data-target="#confirmar">
            <i class="fa fa-plus"></i> Nuevo Horario
        </button>
        <a href="{{route('horarios.index')}}" class="btn btn-link"> 
            <i class="fa fa-refresh"></i> Actualizar..
        </a>      
    </div>
    {!! Form::open(['route'=>'horarios.index','method'=>'GET']) !!}
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" style="margin-right: -10px;">   
        <div class="input-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <input type="text" name="buscar" class="form-control" placeholder="Buscar Horario..." aria-describedby="search" value="{{ $valbuscar }}" style="border-radius: 5px;">
        </div>     
    </div>
    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
        <button class="btn btn-default col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
            <i class="fa fa-search"></i> Buscar
        </button>
    </div>
    {!! Form::close() !!} 
</div>
<hr style="margin-top: 5px;">
<div class="row" style="margin-top: -5px;">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <table class="table table-striped" style="border-width: 1px;border-style: dashed;border-color: #003366;">
  <thead style="background-color: #D6E8F9;color: #003366;">
      <th style="text-align: center;">#</th>
      <th>Descripcion</th>
      <th>Hora Inicio</th>
      <th>Hora Final</th>
      <th>Opciones</th>
  </thead>
  <tbody>
      @foreach($viewDatos as $dato)
      <tr>
          <td style="text-align: center;color: #2270D1;"><i class="fa fa-clock-o"></i></td>
          <td>{{ $dato->Descripcion}}</td>

          <td>{{ $dato->HoraInicio }}</td>
          <td>{{ $dato->HoraFin }}</td>
          <td>
              <a href="{{route('horarios.edit',$dato->id)}}" class="btn btn-primary btn-sm">
                  <i class="fa fa-wrench"></i> Editar
              </a>
          <?php
          $cantHW=$viewWebs::where('IdHorario',$dato->id)->count();
          ?>
          @if($cantHW==0)
              <form style="display: inline;" method="POST" action="{{route('horarios.destroy',$dato->id)}}">
                {!! csrf_field() !!}
                {!! method_field('DELETE') !!}
                <button type="submit" onclick="return confirm('¿Seguro que desea ELIMINAR. ?')" class="btn btn-success btn-sm">
                  <i class="fa fa-remove"></i> Eliminar
                </button>
              </form>
          @endif
          </td>
      </tr>
      @endforeach
  </tbody>
</table>
    <div class="text-center">
        {!! $viewDatos->render()!!}
    </div>

</div>
</div>

<script type="text/javascript">
$(document).ready(function(){

}); 
</script>


@endsection
