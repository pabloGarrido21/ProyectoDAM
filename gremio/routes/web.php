<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\EnviaFormController;
use App\Http\Controllers\ModificaController;
use App\Http\Controllers\ManejoTablaController;
use App\Http\Controllers\OfertaController;
use App\Http\Controllers\ContratoController;





Route::get('/', function () {
    return view('Login');
});

Route::post('/', function () {
    return view('Login');
});

//Parte de SOCIO
Route::get('/Login_Socio', [LoginController::class, 'Login_Socio']);
Route::post('/Login_Socio', [LoginController::class, 'Comprueba_Socio']);

Route::get('/Registro_Socio', [RegistroController::class, 'Registro_Socio']);
Route::post('/Registro_Socio', [RegistroController::class, 'Comprueba_Socio']);

Route::get('/Modificar_Socio', [ModificaController::class, 'Modifica_Socio']);
Route::post('/Modificar_Socio', [ModificaController::class, 'Confirma_Socio']);

Route::get('/Ini_Socio', [LoginController::class, 'Ini_Socio']);
Route::post('/Ini_Socio/{tipo}', [ManejoTablaController::class, 'Contrato_Socio']);

Route::get('/Oferta_Socio', [OfertaController::class, 'Oferta_Socio']);
Route::post('/Oferta_Socio/{tipo}', [ManejoTablaController::class, 'Filtro_Oferta']);

Route::get('/Vista_Contr_Socio', [ContratoController::class, 'Contrato_Socio']);


//Parte de Profesional
Route::get('/Login_Profesional', [LoginController::class, 'Login_Profesional']);
Route::post('/Login_Profesional', [LoginController::class, 'Comprueba_Profesional']);

Route::get('/Registro_Profesional', [RegistroController::class, 'Registro_Profesional']);
Route::post('/Registro_Profesional', [RegistroController::class, 'Comprueba_Profesional']);

Route::get('/Modificar_Profesional', [ModificaController::class, 'Modifica_Profesional']);
Route::post('/Modificar_Profesional', [ModificaController::class, 'Confirma_Profesional']);

Route::get('/Ini_Profesional', [LoginController::class, 'Ini_Profesional']);
Route::post('/Ini_Profesional/{tipo}', [ManejoTablaController::class, 'Contrato_Prof']);

Route::get('/Oferta_Profesional', [OfertaController::class, 'Oferta_Profesional']);
Route::post('/Oferta_Profesional', [OfertaController::class, 'Crear_Oferta']);

Route::get('/Vista_Contr_Profesional', [ContratoController::class, 'Contrato_Profesional']);


//Reenvios
Route::post('/Envia_Registro', [EnviaFormController::class, 'Envia_Registro']);
Route::post('/Devuelve_Registro', [EnviaFormController::class, 'Devuelve_Registro']);


Route::post('/Envia_Modifica', [EnviaFormController::class, 'Envia_Modificar']);
Route::post('/Devuelve_Modifica', [EnviaFormController::class, 'Devuelve_Modificar']);


Route::post('/Envia_Oferta', [EnviaFormController::class, 'Envia_Oferta']);
Route::post('/Devuelve_Oferta', [EnviaFormController::class, 'Devuelve_Oferta']);


Route::post('/Envia_M_Oferta', [EnviaFormController::class, 'Envia_M_Oferta']);
Route::get('/Modifica_Oferta', [EnviaFormController::class, 'Modifica_Oferta']);
Route::post('/Modifica_Oferta', [OfertaController::class, 'Modifica_Oferta']);

Route::post('/Envia_Contrato', [EnviaFormController::class, 'Envia_Contrato']);
Route::get('/Crea_Contrato', [EnviaFormController::class, 'Crea_Contrato']);
Route::post('/Crea_Contrato', [ContratoController::class, 'Crea_Contrato']);


Route::get('/Vista_Oferta_Socio', [OfertaController::class, 'Vista_Oferta_Socio']);
Route::get('/Vista_Oferta_Profesional', [OfertaController::class, 'Vista_Oferta_Profesional']);
Route::get('/Vista_Oferta/{datos}', [ManejoTablaController::class, 'Click_Ofertas'])->
name('oferta.show');


Route::get('/Vista_Contrato/{id}', [ManejoTablaController::class, 'Click_Contrato'])->
name('items.show');

Route::post('/Contrato_Termina', [ContratoController::class, 'Termina_Contrato']);
Route::post('/Contrato_Acepta', [ContratoController::class, 'Acepta_Contrato']);
Route::post('/Contrato_Rechaza', [ContratoController::class, 'Rechaza_Contrato']);

