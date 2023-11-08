@inject('viewWebs', 'App\WebMaster')
@extends('layouts.templete')
@section('title', 'Expedientes')
@section('cabecera')
    <h1> Expedientes <small> Lista </small> </h1>
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
                    {!! Form::open(['route' => 'horarios.store', 'method' => 'POST']) !!}
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
                                            <input type="text" name="Descripcion" class="form-control"
                                                placeholder="Descripcion" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Hora de Inicio</label>
                                            <input type="time" name="HoraInicio" class="form-control"
                                                placeholder="Hora de Inicio" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Hora de Finalización</label>
                                            <input type="time" name="HoraFin" class="form-control"
                                                placeholder="Hora de Finalizacion" required="">
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

    <form action="{{ route('mesapartes.filtrar')}}" method="get">
        @csrf

    <div class="row">

        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
            <label for="fecha_inicio">Fecha de inicio:</label>
            <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" value="{{ $request->input('fecha_inicio') ?? '' }}">
        </div>
        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
            <label for="fecha_fin">Fecha de fin:</label>
            <input type="date" class="form-control" id="fecha_fin" name="fecha_fin"
            value="{{ $request->input('fecha_fin') ?? '' }}">
        </div>
        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
            <br>
            <button type="submit" class="btn btn-primary">filtrar</button>
            <button type="submit" class="btn btn-warning" formaction="{{ route('mesapartes.excel') }}">excel</button>
        </div>

    </form>
        {!! Form::open(['route' => 'mesapartes.index', 'method' => 'GET']) !!}
        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12" style="margin-right: -10px;">
            <div class="input-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <input type="text" name="buscar" class="form-control" placeholder="Buscar Expediente..."
                    aria-describedby="search" value="{{ $valbuscar }}" style="border-radius: 5px;">
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
                    <th>Fecha</th>
                    <th>N°</th>
                    <th>Tipo</th>
                    <th>Asunto</th>
                    <th>Remitente</th>
                    <th>Estado</th>
                    <th>Cod.</th>
                    <th>Archivo</th>
                    <th>Opciones</th>
                </thead>
                <tbody>
                    @foreach ($viewDatos as $dato)
                        <?php
                        $f = date_create($dato->Fecha);
                        $fecha = date_format($f, 'd/m/Y');
                        
                        ?>
                        <tr>
                            <td style="text-align: center;color: #2270D1;"><i class="fa fa-folder-open"></i></td>
                            <td>{{ $fecha }} {{ $dato->Hora }}</td>
                            <td>{{ $dato->NroExpediente }}</td>
                            <td>{{ $dato->Tipo }}</td>
                            <td style="width: 25%;">{{ $dato->Asunto }}</td>
                            <td style="width: 25%;">{{ $dato->Remitente }}</td>
                           <td>
                                @if($dato->Estado=='Pendiente') 
                    <span style="color: #fff;background-color: #C41818;font-size: 10pt;padding: 3px;border-radius: 10px;">{{ $dato->Estado }}</span> 
                                @endif
                                @if($dato->Estado=='En Tramite') 
                    <small style="color: #fff;background-color: #B59F0B;font-size: 10pt;padding: 3px;border-radius: 10px;">{{ $dato->Estado }}</small> 
                                @endif
                                @if($dato->Estado=='Atendido') 
                                <span style="color: #fff;background-color: #068A35;font-size: 10pt;padding: 3px;border-radius: 10px;">{{ $dato->Estado }}</span> 
                                @endif
                                @if($dato->Estado=='Denegado')  
                                <span style="color: #fff;background-color: #6A6464;font-size: 10pt;padding: 3px;border-radius: 10px;">{{ $dato->Estado }}</span> 
                                @endif

                              </td> 
                            <td>{{ $dato->CodSeguridad }}</td>
                            <td>
                                <a href='{{ url("docus/mesapartes/$dato->Archivo") }}' target="_blank"
                                    class="btn btn-link">
                                    <i class="fa fa-file-pdf-o"></i> V{{ $dato->NroExpedientetxt }}
                                </a>
                            </td>

                            <td>
                                <a href="{{ route('mesapartes.show', $dato->id) }}" class="btn btn-primary btn-sm">
                                    <i class="fa fa-folder-open"></i> Atender
                                </a>
                                <form action="{{ route('mesapartes.destroy', $dato->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('DELETE')
                                     <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fa fa-folder-open"></i> Eliminar
                                     </button>
                                    </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="text-center">
                {!! $viewDatos->render() !!}
            </div>

        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {

        });
    </script>


@endsection
