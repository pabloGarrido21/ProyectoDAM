<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EnviaFormController extends Controller
{
    public function Envia_Registro()
    {
        $ciudades =DB::table("ciudad")->
            orderBy('nombre')->get();

        $sectores =DB::table("sector")->
            orderBy('nombre')->get();

        if($_POST['origen'] == 'SOCIO')
        {
            return redirect('/Registro_Socio')->
            with('usuario',$_POST['usuario'])->
            with('passw',$_POST['passw'])->
            with('ciudades', $ciudades);
        }

        if($_POST['origen'] == 'PROFESIONAL')
        {
            return redirect('/Registro_Profesional')->
            with('usuario',$_POST['usuario'])->
            with('passw',$_POST['passw'])->
            with('ciudades', $ciudades)->
            with('sectores', $sectores);
        }

        return redirect('/Login_Socio')->with('error', '¿COMO HAS LLEGADO HASTA AQUI?');
    }

    public function Devuelve_Registro()
    {
        if('SOCIO' === $_POST['origen'])
        {
            return redirect('/Login_Socio');
        }

        if($_POST['origen'] === 'PROFESIONAL')
        {
            return redirect('/Login_Profesional');
        }

        return redirect('/Login_Socio')->with('error', '¿COMO HAS LLEGADO HASTA AQUI?');
    }
    //
}
