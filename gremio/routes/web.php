<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\EnviaFormController;
use App\Http\Controllers\ModificaController;
use App\Http\Controllers\ManejoTablaController;





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
Route::post('/Ini_Socio/{tipo}', [ManejoTablaController::class, 'Datos_Ejemplo_Socio']);

Route::get('/Ini_Socio/{id}', [ManejoTablaController::class, 'Click_Ofertas_Socio'])->
        name('items.show');

Route::get('/Ofer_Socio', [ManejoTablaController::class, 'Oferta_Socio']);



//Parte de Profesional
Route::get('/Login_Profesional', [LoginController::class, 'Login_Profesional']);
Route::post('/Login_Profesional', [LoginController::class, 'Comprueba_Profesional']);

Route::get('/Registro_Profesional', [RegistroController::class, 'Registro_Profesional']);
Route::post('/Registro_Profesional', [RegistroController::class, 'Comprueba_Profesional']);

Route::get('/Modificar_Profesional', [ModificaController::class, 'Modifica_Profesional']);
Route::post('/Modificar_Profesional', [ModificaController::class, 'Confirma_Profesional']);

Route::get('/Ini_Profesional', [LoginController::class, 'Ini_Profesional']);
Route::post('/Ini_Profesional/{tipo}', [ManejoTablaController::class, 'Datos_Ejemplo_Prof']);


//Reenvios
Route::post('/Envia_Registro', [EnviaFormController::class, 'Envia_Registro']);
Route::post('/Devuelve_Registro', [EnviaFormController::class, 'Devuelve_Registro']);


Route::post('/Envia_Modifica', [EnviaFormController::class, 'Envia_Modificar']);
Route::post('/Devuelve_Modifica', [EnviaFormController::class, 'Devuelve_Modificar']);

