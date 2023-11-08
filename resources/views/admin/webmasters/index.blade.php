@inject('viewHorarios','App\Horario')
@extends('layouts.templete')
@section('title','Web Masters')
@section('cabecera')
    <h1> Lista de usuarios <small></small> </h1>
@endsection
@section('contenido') 

<div class="row">
  <div class="modal fade" id="confirmar">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class="fa fa-user-plus"></i> Registrar Usuario</h4>
        </div> 
        {!! Form::open(['route'=>'webmasters.store','method'=>'POST']) !!}
        <!--<input type="hidden" name="Usuario" value="{{ Auth::user()->id }}"> -->
        <div class="modal-body">
        <div class="row">
          <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12" style="text-align: center;">
            <img width="70" src="{{ asset('images/webmaster.png') }}">
          </div>
          <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
            <div class="row">
                 <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">DNI</label>
                        <input type="text" name="Dni" class="form-control" placeholder="DNI" required="" maxlength="8" minlength="8">
                    </div>
                 </div>
                 <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Sexo / Genero</label>
                        <select name="Sexo" class="form-control" required="" style="border-radius: 5px;">
                          <option value="">Seleccione...</option>
                          <option value="F">FEMENINO</option>
                          <option value="M">MASCULINO</option>
                        </select>
                    </div>
                 </div>                 
             </div>
             <div class="row">
                 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nombres y Apellidos</label>
                        <input type="text" name="Nombres" class="form-control" placeholder="Nombres y Apellidos" required="">
                    </div>
                 </div>
             </div>
             <div class="row">
                 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Correo Electrónico</label>
                        <input type="email" name="Email" class="form-control" placeholder="Correo Electrónico" required="">
                    </div>
                 </div>
             </div>
            <div class="row">
                 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Horario de Trabajo</label>
                        <select class="form-control" name="IdHorario" required="" style="border-radius: 5px;">
                          <option value="">Seleccione...</option>
                          @foreach($viewHorarios::OrderBy('Descripcion','ASC')->get() as $horario)
                            <option value="{{ $horario->id }}"> {{ $horario->Descripcion }}: {{ $horario->HoraInicio }} - {{ $horario->HoraFin }} </option>
                          @endforeach
                        </select>
                    </div>
                 </div>
             </div>


          </div>
        </div>
        </div>
        <div class="modal-footer">
           <button type="submit" class="btn btn-warning" name="btnAceptar" id="btnaceptar">
           <i class="fa fa-check"></i> Aceptar</button>
          <button type="button" class="btn btn-primary" data-dismiss="modal">
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
            <i class="fa fa-plus"></i> Nuevo Usuario
        </button>
        <a href="{{route('webmasters.index')}}" class="btn btn-link"> 
            <i class="fa fa-refresh"></i> Actualizar..
        </a>      
    </div>
    {!! Form::open(['route'=>'webmasters.index','method'=>'GET']) !!}
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" style="margin-right: -10px;">   
        <div class="input-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <input type="text" name="buscar" class="form-control" placeholder="Buscar Web Master..." aria-describedby="search" value="{{ $valbuscar }}" style="border-radius: 5px;">
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
      <th>Nombres y Apellidos</th>
      <th>DNI</th>
      <th>Email</th>
      <th>Horario</th>
      <th>Estado</th>
      <th>Opciones</th>
  </thead>
  <tbody>
      @foreach($viewDatos as $dato)
      <tr>
          <td style="text-align: center;color: #2270D1;">
            <img src="{{ asset('images/webmaster.png') }}" width="30">
          </td>
          <td>{{ $dato->Nombres}}  </td>
          <td>{{ $dato->Dni }}</td>
          <td>{{ $dato->email }}</td>
          <td>
            @foreach($viewHorarios::where('id',$dato->IdHorario)->get() as $horario)
              <i class="fa fa-clock-o" style="color: #1770DE;"></i> {{ $horario->HoraInicio }} - {{ $horario->HoraFin }}
            @endforeach
          </td>
          <td>
            @if($dato->Estado==0)
              <span style="color: #CC2C37;"> <i class="fa fa-remove"></i> Desactivado</span> 
            @endif
            @if($dato->Estado==1)
              <span style="color: #003366;"> <i class="fa fa-check"></i> Activo</span> 
            @endif
          </td>       
          <td>
              <a href="{{route('webmasters.edit',$dato->id)}}" class="btn btn-primary btn-sm">
                  <i class="fa fa-wrench"></i> Editar
              </a>
              <form style="display: inline;" method="POST" action="{{route('webmasters.destroy',$dato->id)}}">
                {!! csrf_field() !!}
                {!! method_field('DELETE') !!}
                <button type="submit" onclick="return confirm('¿Seguro que desea ELIMINAR. ?')" class="btn btn-success btn-sm">
                  <i class="fa fa-remove"></i> Eliminar
                </button>
              </form>
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
