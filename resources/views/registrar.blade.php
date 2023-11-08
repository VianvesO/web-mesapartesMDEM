@inject('viewRoles', 'App\Roles')
@extends('layouts.cliente')
@section('title', 'Registrar')
@section('contenido')
    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
            <img src="{{ asset('images/banner.png') }}" alt="" width="40%">
        </div>
        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-3" style="text-align: center;">
            <br>
            <img src="{{ asset('images/mesa1.png') }}" alt="" width="85%">
        </div>

        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-3" style="text-align: center;">
            <br>
            <a href="{{ url('/') }}">
                <img src="{{ asset('images/paginaprincipal.png') }}" alt="" width="87%">
            </a>
        </div>
    </div>
    <br>
    <div class="row" style="background-color: #0967F7;padding: 5px;margin-top: -7px;text-align: center;">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <p style="color: #F1F1F1;font-size: 12pt;">
                <i class="fa fa-file" style="margin-right: 5px;"></i> R E G I S T R A R
                <span style="margin-left: 10px;">D O C U M E N T O </span>
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">

                            <?php
                            $txtdia = date('l');
                            $txtHora = date('H:i:s');
                            $HoraInicio = '08:00:00';
                            $HoraFin = '17:30:00';
                            ?>


                            <form method="POST" action="{{ route('cliente.guardardocu') }}" class="form-horizontal"
                                id="frmregistrar" enctype="multipart/form-data">
                                @csrf

                                <div class="panel panel-primary">
                                    <div class="panel-heading" style="text-align: left;font-size: 12pt;">
                                        1.- DOCUMENTO
                                    </div>
                                    <div class="panel-body">

                                        <div class="form-group" style="padding: 5px;">
                                            <label class="col-lg-3 control-label" style="color:#1695AF;">Tipo Documento
                                                :</label>
                                            <div class="col-lg-4">
                                                <select class="form-control" name="Tipo" required=""
                                                    style="border-radius: 5px;" id="select">
                                                    <option value="">Seleccione...</option>
                                                    <option value="Solicitud">SOLICITUD</option>
                                                    <option value="Carta">CARTA</option>
                                                    <option value="Oficio">OFICIO</option>
                                                    <option value="Oficio Multiple">OFICIO MULTIPLE</option>
                                                    <option value="Otros">OTROS</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group" style="padding: 5px;" id="otros">
                                            <label class="col-lg-3 control-label" style="color:#1695AF;">Ingresa
                                                otro:</label>
                                            <div class="col-lg-4">
                                                <input type="text" name="OtroTipo" class="form-control"
                                                    placeholder="tipo documento">
                                            </div>
                                        </div>

                                        <div class="form-group" style="padding: 5px;">
                                            <label class="col-lg-3 control-label" style="color:#1695AF;">Folios :</label>
                                            <div class="col-lg-4">
                                                <input type="number" name="Folios" class="form-control"
                                                    placeholder="Folios" min="1" max="1000">
                                            </div>
                                        </div>

                                        <div class="form-group" style="padding: 5px;">
                                            <label class="col-lg-3 control-label" style="color:#1695AF;">Asunto :</label>
                                            <div class="col-lg-8">
                                                <textarea name="Asunto" required="" class="form-control" rows="2" placeholder="Escriba el asunto aquí.."
                                                    style="border-radius: 5px;"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group" style="padding: 5px;">
                                          <label class="col-lg-3 control-label" style="color:#1695AF;">Archivo <b>.PDF</b>  <small style="color: #59A805;font-size: 11pt;"><i>(Max 20MB)</i></small> :</label>
                                          <div class="col-lg-8">
                                            <input type="file" name="Archivo" accept=".pdf" class="form-control" id="archivo"  size="20000">
                                          </div>
                                      </div>

                                        <div class="row" style="display: none" id="msjarchivo1">
                                            <p style="text-align: center;">
                                                <span style="color: #E41E1E;font-size: 11pt;">
                                                    <i class="fa fa-file"></i> El tamaño del archivo debe ser menor 20
                                                    MB..</span>
                                            </p>
                                        </div>
                                        <div class="row" style="display: none" id="msjarchivo2">
                                            <p style="text-align: center;">
                                                <span style="color: #E41E1E;font-size: 11pt;">
                                                    <i class="fa fa-file"></i> Sólo es permitido Archivos PDF...</span>
                                            </p>
                                        </div>

                                    </div>
                                </div>


                                <div class="panel panel-primary">
                                    <div class="panel-heading" style="text-align: left;font-size: 12pt;">
                                        2.- REMITENTE
                                    </div>
                                    <div class="panel-body">

                                        <div class="form-group" style="padding: 5px;">
                                            <label class="col-lg-3 control-label" style="color:#1695AF;">Tipo Persona
                                                :</label>
                                            <div class="col-lg-4">
                                                <select class="form-control" name="TipoPersona" required=""
                                                    style="border-radius: 5px;" id="cmbtipopersona">
                                                    <option value="">Seleccione...</option>
                                                    <option value="Natural">NATURAL</option>
                                                    <option value="Juridica">JURÍDICA</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group" style="padding: 5px;">
                                            <label class="col-lg-3 control-label" style="color:#1695AF;">N° <span
                                                    id="txtdocu">Documento</span> :</label>
                                            <div class="col-lg-4">
                                                <input type="text" name="NumDocumento" class="form-control"
                                                    placeholder="N° Documento" required="" id="numdocumento">
                                            </div>
                                        </div>

                                        <div class="form-group" style="padding: 5px;">
                                            <label class="col-lg-3 control-label" style="color:#1695AF;">Nombres / Razón
                                                Social :</label>
                                            <div class="col-lg-8">
                                                <input type="text" name="Remitente" class="form-control"
                                                    placeholder="Nombres / Razón Social" required="">
                                            </div>
                                        </div>

                                        <div class="form-group" style="padding: 5px;">
                                            <label class="col-lg-3 control-label" style="color:#1695AF;">Correo
                                                Electrónico <small
                                                    style="color: #59A805;font-size: 11pt;"><i></i></small>
                                                :</label>
                                            <div class="col-lg-8">
                                                <input type="email" name="Correo" class="form-control"
                                                    placeholder="Correo Electrónico" required>
                                            </div>
                                        </div>
                                        <div class="form-group" style="padding: 5px;">
                                            <label class="col-lg-3 control-label" style="color:#1695AF;">Telf. Celular
                                                <small style="color: #59A805;font-size: 11pt;"><i>(Opcional)</i></small>
                                                :</label>
                                            <div class="col-lg-4">
                                                <input type="text" name="Telefono" class="form-control"
                                                    placeholder="Telf. Celular" maxlength="9">
                                            </div>
                                        </div>

                                    </div>
                                </div>






                                <div class="form-group" style="padding: 2px;">
                                    <div class="col-lg-3"></div>
                                    <div class="col-lg-8">
                                        <button class="btn btn-success" id="btningresar"> <i class="fa fa-check"></i> R E
                                            G I S T R A R</button>
                                        <a href="{{ url('/') }}" class="btn btn-link"> <i
                                                class="fa fa-reply-all"></i> Cancelar</a>
                                    </div>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {

            $('#archivo').change(function() {
                var tipo = this.files[0].type;
                var sizeByte = this.files[0].size;
                var siezekiloByte = parseInt(sizeByte / 1024);
                if (siezekiloByte >= $(this).attr('size')) {
                    $('#msjarchivo1').show();
                    $('#msjarchivo1').delay(3000).hide(500);
                    $(this).val('');
                } else {
                    var megas = siezekiloByte / 1000;
                    if (tipo != 'application/pdf') {
                        $('#msjarchivo2').show();
                        $('#msjarchivo2').delay(3000).hide(500);
                        $(this).val('');
                    }
                }
            });


            $('#cmbtipopersona').change(function() {
                var tipop = $('#cmbtipopersona').val();
                if (tipop == 'Juridica') {
                    $('#numdocumento').val('');
                    $('#numdocumento').attr('maxlength', '11');
                    $('#txtdocu').text('RUC');
                } else if (tipop == 'Natural') {
                    $('#numdocumento').val('');
                    $('#numdocumento').attr('maxlength', '8');
                    $('#txtdocu').text('DNI');
                } else {
                    $('#numdocumento').val('');
                    $('#txtdocu').text('Documento');
                }
            });

        });

        $(document).ready(function() {
  $("#otros").hide();

  $("#select").change(function() {
    if ($(this).val() === "Otros") {
      $("#otros").show();
    } else {
      $("#otros").hide();
    }
  });
});
    </script>
@endsection
