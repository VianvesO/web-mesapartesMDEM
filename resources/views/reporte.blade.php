@extends('layouts.templete')
@section('title','Estadística')
@section('cabecera')
      <h1>
       Estadísticas.. <b></b>
        <small>.</small>
      </h1>
@endsection
@section('contenido')
<!-- AIzaSyD4mrR5jJdsszhuYyrFOpn04hF_6lhoAJE -->
<!-- AIzaSyCOequ0eD6gHU56ggoF5BV0Fh0yd4v7aE8 -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD4mrR5jJdsszhuYyrFOpn04hF_6lhoAJE"
    async defer></script>
<style type="text/css">
    #map{
    position: relative;
    width: 101%;
    margin-top: 0px;
    margin-left: -11px;
    margin-right: 0px;
  }
</style>

    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-circle" style="color: #7fbc41;margin-right: 3px;"></i>
                    <small style="font-size: 12pt;">
                       Reporte Estadístico
                    </small>
                </div>
                <div class="panel-body">
   <div class="row">
    {!! Form::open(['route'=>'reporte.alerta','method'=>'GET']) !!}

    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
        <input type="date" name="Desde" required="" class="form-control" value="{{ $f1 }}" id="desde">
    </div>
    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
        <input type="date" name="Hasta" required="" class="form-control" value="{{ $f2 }}" id="hasta">
    </div>  
    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
        {!! Form::select('Tipo',$vTipos,$valTipo,
                        ['class'=>'form-control','placeholder'=>'TODOS...','style'=>'border-radius:5px;','id'=>'tipoalerta']) !!}
    </div>        
    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
        <button class="btn btn-warning" style="margin-left: -3px;"> <i class="fa fa-search"></i> Buscar </button>
        <a href="{{ route('reporte.alerta') }}" class="btn btn-link"><i class="fa fa-refresh"></i> Limpiar</a>
    </div>  

    {!! Form::close() !!}
  </div>
  <br>




                  <div class="row">
                      <div class="col-md-12">
                        <!-- Bar chart -->
                        <div class="box box-primary">
                          <div class="box-header with-border">
                            <i class="fa fa-line-chart"></i>
                            <h3 class="box-title">
                              <span style="font-weight: bold;margin-left: 20px;margin-right: 5px;">% Estadísticos </span></h3>
                            <div class="box-tools pull-right">
                              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                              </button>
                            </div>
                          </div>
                          <div class="box-body">
                            <div class="row">
                              <div class="col-lg-6 col-md-6" style="text-align: center;">
                                <i class="fa fa-map-marker" aria-hidden="true" style="color: #454A48;font-size: 14pt;"></i> Total de Alertas:  <b> <span style="font-size: 13pt;">{{ $vtotal }}</span> </b> <hr>
                                <i class="fa fa-square" aria-hidden="true" style="color: #00a65a;font-size: 14pt;"></i> ATENDIDOS:  <b><span style="margin-left: 5px;font-size: 12pt;">{{ $tote2 }}</span></b> <hr>
                                <i class="fa fa-square" aria-hidden="true" style="color: #DC143C;font-size: 14pt;"></i> SIN ATENDER:  <b><span style="margin-left: 5px;font-size: 12pt;">{{ $tote1 }}</span></b> <hr>
                                <i class="fa fa-square" aria-hidden="true" style="color: #dd4b39;font-size: 14pt;"></i> ALERTAS FALSAS: <b><span style="margin-left: 5px;font-size: 12pt;">{{ $tote3 }}</span></b>  
                              </div>
                              <div class="col-lg-6" style="text-align: center;"> 
                                <div id="donut-chart" style="height: 250px;"></div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                  </div>


                  <div class="row">
                      <div class="col-md-12">
                        <!-- Bar chart -->
                        <div class="box box-primary">
                          <div class="box-header with-border">
                            <i class="fa fa-bar-chart-o"></i>

                            <h3 class="box-title">
                              <span style="font-weight: bold;margin-left: 20px;margin-right: 5px;">{{ $vtotal }} Alertas </span></h3>

                            <div class="box-tools pull-right">
                              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                              </button>
                            </div>
                          </div>
                          <div class="box-body">
                            <div id="bar-chart" style="height: 300px;"></div>
                          </div>
                          <!-- /.box-body-->
                        </div>
                        <!-- /.box -->
                      </div>
                  </div>

                  <div class="row">
                      <div class="col-md-12">
                        <!-- Bar chart -->
                        <div class="box box-primary">
                          <div class="box-header with-border">
                            <i class="fa fa-map-marker"></i>
                            <h3 class="box-title">
                              <span style="font-weight: bold;margin-left: 20px;margin-right: 5px;">{{ $vtotal }} Alertas </span>
                            </h3>
                            <div class="box-tools pull-right">
                              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                              </button>
                            </div>
                          </div>
                          <div class="box-body">
                            <div id="map"> </div>
                          </div>
                        </div>
                      </div>
                  </div>





                </div>
            </div>
        </div>
    </div>


<script>
  $(function () {

  var height = $(window).height();
  $('#map').height(height);

  var desde=$('#desde').val();
  var hasta=$('#hasta').val();
  var tipoalerta=$('#tipoalerta').val();
    $.ajax({
        url:"{{ route('reporte.alertas') }}",
        method:'GET',
        data:{desde:desde,hasta:hasta,tipo:tipoalerta},
        dataType:'json',
        success:function(data){
          var alertas=data.alertas;
          function initialize() {
            var myOptions = {
              center: new google.maps.LatLng(-12.0484232, -75.2376588),
              zoom: 12,
              mapTypeId: google.maps.MapTypeId.ROADMAP
            };
           var map = new google.maps.Map(document.getElementById("map"),myOptions);
           setMarkers(map,alertas);
          }
          function setMarkers(map,alertas){
           var marker, i;
            for (i = 0; i < alertas.length; i++){  
              var lat = alertas[i]['latitud']*1;
              var long = alertas[i]['longuitud']*1;
              var usu=alertas[i]['usuario'];
              var tipo=alertas[i]['tipo'];

              latlngset = new google.maps.LatLng(lat, long);
              if (tipo=='ROBO / ASALTO') {
                var marker = new google.maps.Marker({ map: map, title: tipo ,position: latlngset,icon:'images/pin_robo.png'}); 
              }else if(tipo=='VANDALISMO'){
                var marker = new google.maps.Marker({ map: map, title: tipo ,position: latlngset,icon:'images/pin_vandalismo.png'});
              }else if(tipo=='AGRESIÓN / PELEA'){
                var marker = new google.maps.Marker({ map: map, title: tipo ,position: latlngset,icon:'images/pin_pelea.png'});
              }else if(tipo=='ACOSO SEXUAL'){
                var marker = new google.maps.Marker({ map: map, title: tipo ,position: latlngset,icon:'images/pin_acoso.png'});
              }else if(tipo=='VIOLENCIA DE GÉNERO'){
                var marker = new google.maps.Marker({ map: map, title: tipo ,position: latlngset,icon:'images/pin_genero.png'});
              }else if(tipo=='BULLYING'){
                var marker = new google.maps.Marker({ map: map, title: tipo ,position: latlngset,icon:'images/pin_bulling.png'});
              }else if(tipo=='ACCIDENTES'){
                var marker = new google.maps.Marker({ map: map, title: tipo ,position: latlngset,icon:'images/pin_accidente.png'});
              }else if(tipo=='EXTRAVIADOS'){
                var marker = new google.maps.Marker({ map: map, title: tipo ,position: latlngset,icon:'images/pin_extraviados.png'});
              }else if(tipo=='OTROS DESASTRES'){
                var marker = new google.maps.Marker({ map: map, title: tipo ,position: latlngset,icon:'images/pin_desastres.png'});
              }else if(tipo=='BASURA ACUMULADA'){
                var marker = new google.maps.Marker({ map: map, title: tipo ,position: latlngset,icon:'images/basura.png'});
              }else{
                var marker = new google.maps.Marker({ map: map, title: tipo ,position: latlngset}); 
              }
              

                map.setCenter(marker.getPosition());
                var content = "<h3>" + tipo +  '</h3>';    
                var infowindow = new google.maps.InfoWindow();
              google.maps.event.addListener(marker,'click', (function(marker,content,infowindow){ 
                    return function() {
                       infowindow.setContent(content);
                       infowindow.open(map,marker);
                    };
                })(marker,content,infowindow)); 
            }
          }

          initialize();
        }
    });




var data = [], totalPoints = 100
//BAR CHART 
    var bar_data = { 
      data : [
      ['<span style="color:#5900B2;font-weight:bold;">Robo / Asalto <br>' + "{{ $v1 }}" + '</span>', "{{ $v1 }}"], 
      ['<span style="color:#FFBF00;font-weight:bold;">Vandalismo <br> '+ "{{ $v2 }}" + '</span>', "{{ $v2 }}"], 
      ['<span style="color:#00698C;font-weight:bold;">Agresión / Pelea <br> '+ "{{ $v3 }}" + '</span>', "{{ $v3 }}"],
      ['<span style="color:#DC143C;font-weight:bold;">Violencia de Género <br> '+ "{{ $v5 }}" + '</span>', "{{ $v5 }}"], 
      ['<span style="color:#006666;font-weight:bold;">Acoso Sexual <br> '+ "{{ $v4 }}" + '</span>', "{{ $v4 }}"], 
      ['<span style="color:#8C4600;font-weight:bold;">Bullying <br> '+ "{{ $v6 }}" + '</span>', "{{ $v6 }}"],
      ['<span style="color:#D96D00;font-weight:bold;">Accidentes <br> '+ "{{ $v7 }}" + '</span>', "{{ $v7 }}"],
      ['<span style="color:#00B259;font-weight:bold;">Extraviados <br> '+ "{{ $v8 }}" + '</span>', "{{ $v8 }}"], 
      ['<span style="color:#FF4000;font-weight:bold;">Otros Desastres <br> '+ "{{ $v9 }}" + '</span>', "{{ $v9 }}"], 
      ['<span style="color:#C30B0B;font-weight:bold;">SoS <br> '+ "{{ $v10 }}" + '</span>', "{{ $v10 }}"], 
      ['<span style="color:#282423;font-weight:bold;">Basura Acumulada <br> ' + "{{ $v11 }}" + '</span>', "{{ $v11 }}"],
      ],
      color: '#003366'
    }
    $.plot('#bar-chart', [bar_data], {
      grid  : {
        borderWidth: 1,
        borderColor: '#f3f3f3',
        tickColor  : '#f3f3f3'
      },
      series: {
        bars: {
          show    : true,
          barWidth: 0.5,
          align   : 'center'
        }
      },
      xaxis : {
        mode      : 'categories',
        tickLength: 0
      }
    });
    /* END BAR CHART */


    var donutData = [
      { label: '', data: "{{ $porcen2 }}", color: '#00a65a' },
      { label: '', data: "{{ $porcen1 }}", color: '#DC143C' },
      { label: '', data: "{{ $porcen3 }}", color: '#dd4b39' }
    ]
    $.plot('#donut-chart', donutData, {
      series: {
        pie: {
          show       : true,
          radius     : 1,
          innerRadius: 0.5,
          label      : {
            show     : true,
            radius   : 2 / 3,
            formatter: labelFormatter,
            threshold: 0.1
          }

        }
      },
      legend: {
        show: false
      }
    })
    /*
     * END DONUT CHART
     */


  })

  /*
   * Custom Label formatter
   * ----------------------
   */
  function labelFormatter(label, series) {
    return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">'
      + label
      + '<br>'
      + Math.round(series.percent) + '%</div>'
  }
</script>

@endsection

