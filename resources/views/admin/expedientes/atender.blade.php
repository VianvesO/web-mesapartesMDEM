@inject('viewTramites', 'App\Tramite')
@inject('viewWebs', 'App\WebMaster')
@extends('layouts.templete')
@section('title', 'Atender Expediente')
@section('cabecera')
    <h1> Expedientes <small> Atender </small> </h1>
@endsection
@section('contenido')

    <div class="row">
        <div class="modal fade" id="confirmar">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"><i class="fa fa-comment"></i> Registrar Seguimiento</h4>
                    </div>
                    {!! Form::open(['route' => 'tramites.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                    <input type="hidden" name="Usuario" value="{{ Auth::user()->Nombres }}">

                    <div class="modal-body">
                        <input type="hidden" name="IdExpediente" id="idexpe">
                        <div class="row">
                            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12" style="text-align: center;">
                                <img width="70" src="{{ asset('images/ayuda.png') }}">
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Descripcion</label>
                                            <textarea name="Descripcion" class="form-control" placeholder="Escriba aquí..." required=""
                                                style="border-radius: 5px;"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Adjunto PDF <small
                                                    style="color: #59A805;font-size: 11pt;"><i>(Opcional)</i></small></label>
                                            <input type="file" name="Archivo" accept=".pdf" class="form-control"
                                                id="archivo" size="20000" style="border-radius: 5px;">
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="display: none" id="msjarchivo1">
                                    <p style="text-align: center;">
                                        <span style="color: #E41E1E;font-size: 11pt;">
                                            <i class="fa fa-file"></i> El tamaño del archivo debe ser menor 20 MB..</span>
                                    </p>
                                </div>

                                            <div class="row">
                 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Estado </label>
                        {!! Form::select('Estado',['Pendiente'=>'PENDIENTE','En Tramite'=>'EN TRÁMITE','Atendido'=>'ATENDIDO','Denegado'=>'DENEGADO'],$viewDatos->Estado,
                        ['class'=>'form-control','placeholder'=>'Seleccione...','style'=>'border-radius:5px;','id'=>'cmbestado','required']) !!}
                    </div>
                 </div>
                 
             </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" name="btnAceptar" id="btnaceptar">
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
        <div class="modal fade" id="correo">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"><i class="fa fa-comment"></i> Enviar Correo</h4>
                    </div>
                    <div class="modal-body">
                      <form id="store-form" action="{{ route('mesapartes.store') }}" method="post"
                      enctype="multipart/form-data">
                      @csrf
                      @php
                          $datos = json_encode($viewDatos);
                          
                      @endphp
                      <input type="hidden" name="lista" value="{{ $datos }}">
                      <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12" style="text-align: center;">
                            <img width="70" src="{{ asset('images/ayuda.png') }}">
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nombre</label>
                                        <input type="text" name="nombre" class="form-control"
                                            placeholder="Escriba aquí..." required="" style="border-radius: 5px;">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Correo electronico</label>
                                        <input type="email" name="correo" class="form-control"
                                            placeholder="Escriba aquí..." required="" style="border-radius: 5px;">
                                    </div>
                                </div>
                            </div>
 
                            <div class="row" style="display: none" id="msjarchivo1">
                                <p style="text-align: center;">
                                    <span style="color: #E41E1E;font-size: 11pt;">
                                        <i class="fa fa-file"></i> El tamaño del archivo debe ser menor 20 MB..</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-success" name="btnAceptar" id="btnaceptar">
                          <i class="fa fa-check"></i> Enviar</button>
                      <button type="button" class="btn bg-navy" data-dismiss="modal">
                          <i class="fa fa-remove"></i> Cancelar</button>
                  </div>
      
                  </form>
                    </div>
                    
                   


                </div>
            </div>
        </div>
    </div>

<div class="row">
  <div class="modal fade" id="cambiar">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class="fa fa-refresh"></i> Cambiar Estado</h4>
        </div>
        {!! Form::open(['route'=>['mesapartes.update',$viewDatos->id],'method'=>'PUT']) !!}
                
        <div class="modal-body">
          <input type="hidden" name="IdExpediente" id="idexpe">
        <div class="row">
          <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12" style="text-align: center;">
            <img width="70" src="{{ asset('images/ayuda.png') }}">
          </div>
          <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
            <div class="row">
                 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Estado </label>
                        {!! Form::select('Estado',['Pendiente'=>'PENDIENTE','En Tramite'=>'EN TRÁMITE','Atendido'=>'ATENDIDO','Denegado'=>'DENEGADO'],$viewDatos->Estado,
                        ['class'=>'form-control','placeholder'=>'Seleccione...','style'=>'border-radius:5px;','id'=>'cmbestado','required']) !!}
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


    <hr style="margin-top: 5px;">

    <div class="row" style="margin-top: -15px;">
        <div class="col-lg-6 col-md-6 com-sm-12 col-xs-12">
            <table class="table table-striped">
                <?php
                $f = date_create($viewDatos->Fecha);
                $fecha = date_format($f, 'd/m/Y');
                ?>
                <tr>
                    <td style="text-align: right;width: 25%;color: #1695AF;">Fecha Hora:</td>
                    <td>{{ $fecha }} {{ $viewDatos->Hora }}</td>
                </tr>
                <tr>
                    <td style="text-align: right;color: #1695AF;">N° Expediente:</td>
                    <td style="color: #6F716F;">

                        <a href='{{ url("docus/mesapartes/$viewDatos->Archivo") }}' target="_blank" class="btn btn-link">
                            <b>{{ $viewDatos->NroExpedientetxt }}</b>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: right;color: #1695AF;">Nombres:</td>
                    <td>
                        @if ($viewDatos->TipoPersona == 'Juridica')
                            RUC <b>{{ $viewDatos->NumDocumento }}</b> - {{ $viewDatos->Remitente }}
                        @endif
                        @if ($viewDatos->TipoPersona == 'Natural')
                            DNI <b>{{ $viewDatos->NumDocumento }}</b> - {{ $viewDatos->Remitente }}
                        @endif
                    </td>
                </tr>
                <tr>
                    <td style="text-align: right;color: #1695AF;">Contacto:</td>
                    <td>{{ $viewDatos->Correo }} - {{ $viewDatos->Telefono }}</td>
                </tr>
            </table>
        </div>
        <div class="col-lg-6 col-md-6 com-sm-12 col-xs-12">
            <table class="table table-striped">
                <tr>
                    <td style="text-align: right;width: 25%;color: #1695AF;">Tipo Documento:</td>
                    <td>{{ $viewDatos->Tipo }}</td>
                </tr>
                <tr>
                    <td style="text-align: right;color: #1695AF;">Asunto:</td>
                    <td>{{ $viewDatos->Asunto }}</td>
                </tr>
                <tr>
                    <td style="text-align: right;color: #1695AF;">Folios:</td>
                    <td>{{ $viewDatos->Folios }}</td>
                </tr>
                <tr>
                    <td style="text-align: right;color: #1695AF;">Estado:</td>
<td>
            

            @if($viewDatos->Estado=='Pendiente') 
            <span style="color: #fff;background-color: #C41818;font-size: 10pt;padding: 3px;border-radius: 10px;">{{ $viewDatos->Estado }}</span> 
            @endif
            @if($viewDatos->Estado=='En Tramite') 
            <small style="color: #fff;background-color: #B59F0B;font-size: 10pt;padding: 3px;border-radius: 10px;">{{ $viewDatos->Estado }}</small> 
            @endif
            @if($viewDatos->Estado=='Atendido') 
            <span style="color: #fff;background-color: #068A35;font-size: 10pt;padding: 3px;border-radius: 10px;">{{ $viewDatos->Estado }}</span> 
            @endif
            @if($viewDatos->Estado=='Denegado')  
            <span style="color: #fff;background-color: #6A6464;font-size: 10pt;padding: 3px;border-radius: 10px;">{{ $viewDatos->Estado }}</span> 
            @endif





            </td>
                </tr>
            </table>
        </div>
    </div>

    <hr style="margin-top: 5px;">
    <div class="row" style="margin-top: -15px;">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: center;">
            <a href="{{ route('mesapartes.index') }}" class="btn btn-link">
                <i class="fa fa-reply-all"></i> Volver
            </a>
            <button type="button" class="btn btn-info" style="margin-right: 10px;" data-toggle="modal"
                data-target="#confirmar" data-id="{{ $viewDatos->id }}">
                <i class="fa fa-plus"></i> Registrar Seguimiento
            </button>
            <!--   <button type="button" class="btn btn-danger" style="margin-right: 10px;" data-toggle="modal" data-target="#correo" data-id="{{ $viewDatos->id }}">
              <i class="fa fa-plus"></i>Enviar correo
          </button> -->
  

            
       <!--    <button data-toggle="modal" data-target="#correo" onclick="event.preventDefault();
           document.getElementById('store-form').submit();" class="btn btn-danger" style="margin-right: 10px;">
              <i class="fa fa-plus"></i>Enviar email
          </button> -->
                <button data-toggle="modal" data-target="#correo" class="btn btn-danger" style="margin-right: 10px;">
              <i class="fa fa-plus"></i>Derivar
          </button> 

            <a href="" class="btn btn-link">
                <i class="fa fa-refresh"></i> Actualizar..
            </a>
        </div>

    </div>
    <br>

    <div class="row" style="margin-top: -5px;">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-primary">
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
                            <?php $x = 0; ?>
                            @foreach ($viewTramites::where('Expediente', $viewDatos->id)->get() as $tramite)
                                <?php
                                $x++;
                                $ft = date_create($tramite->created_at);
                                $txtft = date_format($ft, 'd/m/Y H:i:s');
                                ?>
                                <tr>
                                    <td>{{ $x }}</td>
                                    <td>{{ $txtft }}</td>
                                    <td>{{ $tramite->Comentario }}</td>
                                    <td>
                                        @if ($tramite->Adjunto != 'Ninguna')
                                            <a href='{{ url("docus/mesapartes/adjuntos/$tramite->Adjunto") }}'
                                                target="_blank" class="btn btn-link">
                                                <i class="fa fa-file-pdf-o"></i> Ver Adjunto
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

        </div>
    </div>



    <script type="text/javascript">
        $(document).ready(function() {

            $('#confirmar').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var id = button.data('id');

                var modal = $(this);
                modal.find('.modal-body #idexpe').val(id);
            });

            $('#cambiar').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var id = button.data('id');
                var estado = button.data('estado');

                var modal = $(this);
                modal.find('.modal-body #idexpe').val(id);
                modal.find('.modal-body #cmbestado').val(estado);
            });


            $('#archivo').change(function() {
                var sizeByte = this.files[0].size;
                var siezekiloByte = parseInt(sizeByte / 1024);
                if (siezekiloByte >= $(this).attr('size')) {
                    $('#msjarchivo1').show();
                    $('#msjarchivo1').delay(3000).hide(500);
                    $(this).val('');
                } else {
                    var megas = siezekiloByte / 1000;
                }
            });

        });
    </script>


@endsection
