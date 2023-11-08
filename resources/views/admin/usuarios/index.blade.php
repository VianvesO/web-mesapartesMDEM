@inject('viewHorarios','App\Horario')
@extends('layouts.templete')
@section('title','Usuarios')
@section('cabecera')
    <h1> Usuarios <small> Lista </small> </h1>
@endsection
@section('contenido') 




<div class="row">
  <div class="modal fade" id="confirmar">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class="fa fa-map-marker"></i> Alertas del Usuario</h4>
        </div>
        <form method="POST" action="https://alerta.biomedictec.com/web/public/serenos" accept-charset="UTF-8"><input name="_token" type="hidden" value="wfo2UskCVlCI8VNVlhKWefAdExmdBkhqnSklX7aR">
        <!--<input type="hidden" name="Usuario" value="1"> -->
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="font-size: 13pt;color: #003366;">
              <i class="fa fa-user"></i> <b>Usuario: </b> <b> <i>DNI </i> </b> <span id="txtdni"></span> - <span id="txtnombres"></span>
            </div>
          </div>
          <hr>
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <table class="table table-striped" style="border-width: 1px;border-style: dashed;border-color: #003366;">
              <thead style="background-color: #D6E8F9;color: #003366;">
                  <th style="text-align: center;">#</th>
                  <th>Tipo</th>
                  <th>Fecha</th>
                  <th>Hora</th>
                  <th>Atención</th>
              </thead>
              <tbody id="lstdatos">

              </tbody>
            </table>
          </div>
        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">
          <i class="fa fa-remove"></i> Cerrar</button>
        </div>
    </form>

      </div>
    </div>
  </div>
</div>

<div class="row">
    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
        <a href="{{route('usuarios.index')}}" class="btn btn-link"> 
            <i class="fa fa-refresh"></i> Actualizar..
        </a>      
    </div>
    {!! Form::open(['route'=>'usuarios.index','method'=>'GET']) !!}
    <div class="col-lg-1 col-md-1 col-sm-12 col-xs-12" style="padding-top: 5px;">
      Filtrar:
    </div>
     <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="margin-right: -10px;">
      <select class="form-control" name="filtro" style="border-radius: 5px;">
        <option value="">TODOS...</option>
        <option value="1">HABILITADO</option>
        <option value="0">DESACTIVADO</option>
      </select>
     </div>    
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" style="margin-right: -10px;">   
        <div class="input-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <input type="text" name="buscar" class="form-control" placeholder="Buscar Usuario..." aria-describedby="search" value="{{ $valbuscar }}" style="border-radius: 5px;">
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
      <th>Documento</th>
      <th>Email</th>
      <th>Telf. Movil</th>
      <th>Estado</th>
      <th>Opciones</th>
  </thead>
  <tbody>
      @foreach($viewDatos as $dato)
      <tr>
          <td style="text-align: center;color: #2270D1;">
            <img src="{{ asset('images/ayuda.png') }}" width="25">
          </td>
          <td>
            <button type="button" class="btn btn-link" data-toggle="modal" data-target="#confirmar" data-dni="{{ $dato->Doc_Identidad }}" data-nombres="{{ $dato->Nombres}} {{ $dato->Apellidos}}" data-id="{{ $dato->Id_Usuario_Alerta }}">
              {{ $dato->Nombres}} {{ $dato->Apellidos}} 
            </button>
          </td>
          <td><b>{{ $dato->Tipo_Documento }}</b> {{ $dato->Doc_Identidad }}</td>
          <td>{{ $dato->Email }}</td>
          <td>{{ $dato->Tel_Movil }}</td>        
          <td>
            @if($dato->Validado==1)
                <img src="{{ asset('images/si.png') }}" width="15"> <span style="color: #003366;">Habilitado</span>
            @endif
            @if($dato->Validado==0)
                <img src="{{ asset('images/no.png') }}" width="15"> <span style="color: #D75E0D;">Desactivado</span>
            @endif            
          </td>         
          <td>
            @if($dato->Validado==1)
              <form style="display: inline;" method="POST" action="{{route('usuarios.destroy',$dato->Id_Usuario_Alerta)}}">
                {!! csrf_field() !!}
                {!! method_field('DELETE') !!}
                <button type="submit" onclick="return confirm('¿Seguro que desea ELIMINAR. ?')" class="btn btn-success btn-xs">
                  <i class="fa fa-remove"></i> Desactivar
                </button>
              </form>
            @endif
              @if($dato->Validado==0)
                  <a class="btn btn-link btn-sm" href="{{route('usuarios.activar',$dato->Id_Usuario_Alerta)}}" onclick="return confirm('¿Seguro que desea HABILITAR el Usuario. ?')">
                    <i class="fa fa-check"></i> Activar
                  </a>
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

    $('#confirmar').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); 
        var dni=button.data('dni');
        var nombres=button.data('nombres');
        var id=button.data('id');


        var modal = $(this);
        modal.find('.modal-body #txtdni').text(dni);
        modal.find('.modal-body #txtnombres').text(nombres);
          $.ajax({
              url:"{{ route('alertas.usuario') }}",
              method:'GET',
              data:{id:id},
              dataType:'json',
              success:function(data){
                $('#lstdatos').html(data.datos);
            }
          });

    });


}); 
</script>


@endsection
