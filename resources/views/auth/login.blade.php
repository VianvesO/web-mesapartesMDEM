@extends('layouts.app')
@section('title','Acceder al Sistema')
@section('contenido')
<style type="text/css">
  #caja{
    min-height: 410px;
    background-color: #FFFFFF;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.15), 0 0 1px 1px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    padding: 10px 0;
  }
</style>
<br>
<div class="row" style="padding: 30px;">
  <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12"></div>
  <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12" id="caja">
    <div class="row" style="text-align: center;">

    <img src="{{ asset('images/mesa.png') }}" width="50%">
    </div>
    <div class="row" style="padding: 15px;">
      <div class="col-lg-12" style="background-color: #0967F7;color: #F1EFEF;padding: 7px;text-align: center;font-size: 12pt;">
         MESA DE PARTES VIRTUAL - EL MILAGRO
      </div>
    </div>
    <div class="row">
      <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" style="text-align: center;padding: 10px;">
        <img src="{{ asset('images/office.png') }}" width="90%" style="border-radius: 5px;">
      </div>
      <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
        <br>
        <form method="POST" action="{{ route('login') }}" class="form-horizontal">
          @csrf
          <div class="form-group" style="padding: 5px;">
              <label class="col-lg-3 control-label" style="color:#51504E;">Usuario :</label>
              <div class="col-lg-8">
                <input id="login" type="login" class="form-control @error('login') is-invalid @enderror" name="login" value="{{ old('login') }}" required autocomplete="login" autofocus placeholder="Usuario">
                  @if ($errors->has('login'))
                      <span class="invalid-feedback">
                          <small style="color: #DC3545;font-size: 11pt;font-style: italic;">
                              {{ $errors->first('login') }}</small>
                      </span>
                  @endif  
              </div>
          </div>


          <div class="form-group" style="padding: 5px;">
              <label class="col-lg-3 control-label" style="color:#51504E;">Contraseña :</label>
              <div class="col-lg-8">
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Contraseña">
                  @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror 
              </div>
          </div>

        <!--
          <div class="form-group" style="padding: 2px;">
              <label class="col-lg-3 control-label" style="color:#51504E;"></label>
              <div class="col-lg-8">
                <span>{!! captcha_img() !!}</span>
                <button type="button" class="btn btn-link">
                  <i class="fa fa-refresh"></i> Actualizar
                </button>
              </div>
          </div>

          <div class="form-group" style="padding: 2px;">
              <label class="col-lg-3 control-label" style="color:#51504E;">Código :</label>
              <div class="col-lg-6">
                <input type="text" name="Captcha" class="form-control" placeholder="Código Captcha">
              </div>
          </div>
        -->


          <div class="form-group" style="padding: 2px;">
              <div class="col-lg-3"></div>
              <div class="col-lg-8">
                <button class="btn btn-success" id="btningresar"> I N G R E S A R </button>
            <a href="{{ url('/') }}" class="btn btn-link"> <i class="fa fa-reply-all"></i> Cancelar</a>
              </div>
          </div>

        </form>
      </div>
    </div>

  <hr>
<p style="text-align: center;font-size: 11pt;color: #46433C;">
  <i class="fa fa-map-marker" style="color: #007EFF;"></i> <small style="margin-right: 10px;">Municipalidad Distrital El Milagro</small>
<i class="fa fa-phone" style="color: #007EFF;"></i> 953 936 058<small></small>

</p>

  </div>
</div>


@endsection


