<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

use App\Expediente;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\MesaPartesController;

Auth::routes();
Route::get('/', function () {
	if (Auth::user()) {
		return redirect("/login");
	}else{
		return view('welcome');
	}  
});

Route::get('mesapartes/excel', [ClienteController::class, 'excel'])->name('mesapartes.excel');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/ajax/cargarAlertas', 'AjaxController@cargarAlertas')->name('cargar.alertas');
Route::get('/ajax/cargarSerenos', 'AjaxController@cargarSerenos')->name('cargar.serenos');
Route::post('/atenderAlerta', 'AjaxController@atenderAlerta')->name('atender.alerta');
Route::post('/falsaAlerta', 'AjaxController@falsaAlerta')->name('falsa.alerta');
Route::get('/buscarusuario', 'AjaxController@buscarUsuario')->name('buscar.usuario');
Route::get('/contadorAlertas', 'AjaxController@contadorAlertas')->name('contar.alertas');
Route::get('/reporteAlertas', 'AjaxController@reporteAlertas')->name('reporte.alertas');
Route::get('/alertasUsuario', 'AjaxController@alertasUsuario')->name('alertas.usuario');


Route::get('/correo', 'AjaxController@enviar_correo');

Route::resource('horarios','HorariosController');
Route::resource('webmasters','WebMastersController');



//------------------------ MP Virtual ----------------------------------------------
Route::resource('cliente','ClienteController');
Route::get('/mdp/registrardocu', 'ClienteController@registrar')->name('cliente.registrardocu');
Route::post('/mdp/guardardocu', 'ClienteController@guardardocu')->name('cliente.guardardocu');
Route::get('/mdp/cargodocu/{dato}', 'ClienteController@cargodocu')->name('cliente.cargodocu');
Route::get('/mdp/buscardocu', 'ClienteController@buscar')->name('cliente.buscardocu');

Route::get('/mdp/cargodocupdf/{dato}', function($dato) { 
   $idExpe=\Illuminate\Support\Facades\Crypt::decrypt($dato);
   $dtDatos=Expediente::find($idExpe);
   if ($dtDatos->count()>0) {
        $pdf=PDF::loadView('cargopdfdocu',['viewDatos'=>$dtDatos])->setPaper('a4', 'vertical');
        return $pdf->stream('Cargo_'.$dtDatos->NroExpedientetxt.'.pdf');
   }else{
    return redirect("/");
   }
})->name('cliente.cargodocupdf');


Route::get('mesapartes/filtrar', [MesaPartesController::class, 'filtrar'])->name('mesapartes.filtrar');
Route::resource('mesapartes','MesaPartesController');
Route::resource('tramites','TramiteController');
Route::get('/mdp/clave', 'WebMastersController@clave')->name('cambiar.clave');
Route::post('/mdp/Cambiarclave', 'WebMastersController@CambiarClave')->name('cambiar.nuevaclave');

