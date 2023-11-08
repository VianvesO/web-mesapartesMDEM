<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	
	<title>Imprimir Cargo...</title>

		<style type="text/css">
		body {
		width: 90%;
		height: 100%;
		margin-left:0;
		margin-right:0;
		margin-top:-10;
		margin-botton:0;
		border-top-width:0;
		border-width: 0;
		border-color: #4B4848;
		border-radius: 5;
		padding-top:30;
		padding-left:25;
		padding-right:25;
		border-style: solid;
}
	</style>
</head>
<body>
<div style="width: 100%;height: auto;background-color: white;margin-top: -25px;">
	<table border="0" width="100%" >
		<tr>
			<td style="width: 30%;border-top: none;border-bottom: none;border-left: none;border-right: none;text-align: left;">
				<img src="images/banner.png" style="height: 100px;">
			</td>
			<td style="width: 30%;background-color: white;text-align: left;border-right: none;border-top: none;border-bottom: none;border-color: #C9C2C2;" >
				<img src="images/mesa.png" style="height: 60px;">
			</td>
			<td style="width: 30%;background-color: white;text-align: left;border-right: none;border-top: none;border-bottom: none;border-color: #C9C2C2;" >
				<p style="font-size: 13pt;font-weight: bold;border-color: #1695AF;border-width: 2px;border-style: solid;border-radius: 10px;padding: 10px;text-align: center;color: #BC1313;"> 
				<span style="color: #037901;">CARGO</span> <br>
				<span style="font-size: 12pt;color: #1695AF;">Epx. N° <b>V{{ $viewDatos->NroExpedientetxt }}</b> </span>
				</p>
			</td>			
		</tr>
	</table>
</div>

<hr style="border-top: 2px solid #808487; 
   border-bottom: 1px dashed #808487; 
   border-left:none; 
   border-right:none; 
   height: 6px;
   width:100%; margin-top: 3px; ">



	<?php 
	$f=date_create($viewDatos->Fecha);
	$fecha=date_format($f,'d/m/Y');
	$tipo=mb_strtoupper($viewDatos->Tipo);
	?>

	<table style="width: 100%;" cellpadding="2">
		<tr>
			<td style="font-family: Arial, sans-serif;font-size: 13pt;color: #3D3C3C;width: 22%;">
				Expediente N° 
			</td>
			<td style="text-align: center;width: 5%;">
				:
			</td>
			<td style="font-family: Arial, sans-serif;font-size: 13pt;color: #3D3C3C;">
				<b>V{{ $viewDatos->NroExpedientetxt }}</b>
			</td>
		</tr>
		<tr>
			<td style="font-family: Arial, sans-serif;font-size: 12pt;color: #3D3C3C;">
				Fecha y Hora
			</td>
			<td style="text-align: center;">
				:
			</td>
			<td style="font-family: Arial, sans-serif;font-size: 12pt;color: #3D3C3C;">
				{{ $fecha }} {{ $viewDatos->Hora }}
			</td>
		</tr>
		<tr>
			<td style="font-family: Arial, sans-serif;font-size: 12pt;color: #3D3C3C;">
				Tipo Documento
			</td>
			<td style="text-align: center;">
				:
			</td>
			<td style="font-family: Arial, sans-serif;font-size: 12pt;color: #3D3C3C;">
				{{ $tipo }}
			</td>
		</tr>
		<tr>
			<td style="font-family: Arial, sans-serif;font-size: 12pt;color: #3D3C3C;">
				Asunto
			</td>
			<td style="text-align: center;">
				:
			</td>
			<td style="font-family: Arial, sans-serif;font-size: 12pt;color: #3D3C3C;">
				{{ $viewDatos->Asunto }}
			</td>
		</tr>
		<tr>
			<td style="font-family: Arial, sans-serif;font-size: 12pt;color: #3D3C3C;">
				Folios
			</td>
			<td style="text-align: center;">
				:
			</td>
			<td style="font-family: Arial, sans-serif;font-size: 12pt;color: #3D3C3C;">
				{{ $viewDatos->Folios }}
			</td>
		</tr>
		<tr>
			<td style="font-family: Arial, sans-serif;font-size: 12pt;color: #3D3C3C;">
				Remitente
			</td>
			<td style="text-align: center;">
				:
			</td>
			<td style="font-family: Arial, sans-serif;font-size: 12pt;color: #3D3C3C;">
				@if($viewDatos->TipoPersona=='Juridica')
				RUC <b>{{ $viewDatos->NumDocumento }}</b>  - {{ $viewDatos->Remitente }}
				@endif
				@if($viewDatos->TipoPersona=='Natural')
				DNI <b>{{ $viewDatos->NumDocumento }}</b>  - {{ $viewDatos->Remitente }}
				@endif

			</td>
		</tr>
		<tr>
			<td style="font-family: Arial, sans-serif;font-size: 12pt;color: #3D3C3C;">
				Correo
			</td>
			<td style="text-align: center;">
				:
			</td>
			<td style="font-family: Arial, sans-serif;font-size: 12pt;color: #3D3C3C;">
				{{ $viewDatos->Correo }}
			</td>
		</tr>
		<tr>
			<td style="font-family: Arial, sans-serif;font-size: 12pt;color: #3D3C3C;">
				Telefono
			</td>
			<td style="text-align: center;">
				:
			</td>
			<td style="font-family: Arial, sans-serif;font-size: 12pt;color: #3D3C3C;">
				{{ $viewDatos->Telefono }}
			</td>
		</tr>		
	</table>


<hr style="border-top: 0px none #808487; 
   border-bottom: 1px dashed #808487; 
   border-left:none; 
   border-right:none; 
   height: 6px;
   width:100%; margin-top: 3px; ">

<p style="font-size: 10pt;font-family: Arial, sans-serif;color: #1695AF;">
	Estimado(a) usuario, recuerda que con el <b>N° de Expediente</b>, puede realizar el seguimiento de su trámite documentario. Ingresando a <a href=""></a>
	<br>
	<br>
	<span style="font-size: 12pt;color:#6F6D6D;">Código de Seguridad: <b>{{ $viewDatos->CodSeguridad }}</b> </span>
</p>
</body>
</html>



