<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\EnviaFormController;
use App\Http\Controllers\ModificaController;





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



//Parte de Profesional
Route::get('/Login_Profesional', [LoginController::class, 'Login_Profesional']);
Route::post('/Login_Profesional', [LoginController::class, 'Comprueba_Profesional']);

Route::get('/Registro_Profesional', [RegistroController::class, 'Registro_Profesional']);
Route::post('/Registro_Profesional', [RegistroController::class, 'Comprueba_Profesional']);

Route::get('/Modificar_Profesional', [ModificaController::class, 'Modifica_Profesional']);
Route::post('/Modificar_Profesional', [ModificaController::class, 'Confirma_Profesional']);

Route::get('/Ini_Profesional', [LoginController::class, 'Ini_Profesional']);



Route::post('/Envia_Registro', [EnviaFormController::class, 'Envia_Registro']);
Route::post('/Devuelve_Registro', [EnviaFormController::class, 'Devuelve_Registro']);


Route::post('/Envia_Modifica', [EnviaFormController::class, 'Envia_Modificar']);
Route::post('/Devuelve_Modifica', [EnviaFormController::class, 'Devuelve_Modificar']);
