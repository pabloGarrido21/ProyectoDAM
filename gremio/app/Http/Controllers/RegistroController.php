<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegistroController extends Controller
{
    //
    public function Registro_Socio()
    {

        return view('Registrarse_Socio');
    }

    public function Comprueba_Socio()
    {
        $query = DB::table("socio")->where(
            "email", "=", $_POST['usuario'])->get();

        if (count($query) > 0) {

            $ciudad =DB::table("ciudad")->
            where('id', '=', $query[0]->ciudad)->get();

            return redirect('/Ini_Socio')->
            with('email',$query[0]->email)->
            with('nombre',$query[0]->nombre)->
            with('apellido',$query[0]->apellido)->
            with('telefono',$query[0]->telefono)->
            with('direccion',$query[0]->direccion)->
            with('ciudad',$ciudad[0]->nombre)->
            with('cod_pos',$ciudad[0]->codigo_postal);
        }

        return redirect('/Registro_Socio')->with('error', 'Datos incorrectos');
    }
}
