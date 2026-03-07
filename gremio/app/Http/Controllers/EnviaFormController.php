<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EnviaFormController extends Controller
{
    public function Envia_Registro()
    {
        if('SOCIO' === $_POST['origen'])
        {
            return redirect('/Registro_Socio')->
            with('usuario',$_POST['usuario'])->
            with('passw',$_POST['passw'])->
            with('origen',$_POST['origen']);
        }

        if($_POST['origen'] === 'PROFESIONAL')
        {
            return redirect('/Registro_Profesional')->
            with('usuario',$_POST['usuario'])->
            with('passw',$_POST['passw'])->
            with('origen',$_POST['origen']);
        }

        return redirect('/Login_Socio')->with('error', '¿COMO HAS LLEGADO HASTA AQUI?');
    }
    //
}
