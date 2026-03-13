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
            with('usuario',$_POST['socio'])->
            with('passw',$_POST['passw'])->
            with('ciudades', $ciudades);
        }

        if($_POST['origen'] == 'PROFESIONAL')
        {
            return redirect('/Registro_Profesional')->
            with('usuario',$_POST['profesional'])->
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


    //MODIFICAR
    public function Envia_Modificar()
    {
        $ciudades =DB::table("ciudad")->
        orderBy('nombre')->get();

        $ciudad  = DB::table("ciudad")->
        where('nombre', '=', $_POST['ciudad'])->get();

        if($_POST['origen'] == 'SOCIO')
        {
            $original = DB::table("socio")->
                where("email", "=", $_POST['original'])->get();

            return redirect('/Modificar_Socio')->
            with('original', $original[0])->
            with('ciudades', $ciudades)->
            with('ciudad', $ciudad[0]);
        }

        if($_POST['origen'] == 'PROFESIONAL')
        {
            $original = DB::table("profesional")->
            where("email", "=", $_POST['original'])->get();

            $sectores =DB::table("sector")->
            orderBy('nombre')->get();

            $sector  = DB::table("sector")->
            where('nombre', '=', $_POST['sector'])->get();

            return redirect('/Modificar_Profesional')->
            with('original', $original[0])->
            with('ciudades', $ciudades)->
            with('sectores', $sectores)->
            with('ciudad', $ciudad[0])->
            with('sector', $sector[0]);
        }



        return redirect('/Login_Socio')->with('error', '¿COMO HAS LLEGADO HASTA AQUI?');
    }


    public function Devuelve_Modificar()
    {

        if('SOCIO' === $_POST['origen'])
        {
            $query = DB::table("socio")->where(
                "email", "=", $_POST['original'])->get();

            $ciudad =DB::table("ciudad")->
            where('nombre', '=', $_POST['ciudad'])->get();

            $datos = DB::table("socio")->
            select('email','nombre','apellido')->get();

            return redirect('/Ini_Socio')->
            with('socio',$query[0])->
            with('ciudad',$ciudad[0])->
            with('tipo','SOCIO')->
            with('datos',$datos);
        }

        if($_POST['origen'] === 'PROFESIONAL')
        {
            $query = DB::table("profesional")->where(
                "email", "=", $_POST['original'])->get();

            $ciudad =DB::table("ciudad")->
            where('nombre', '=', $_POST['ciudad'])->get();

            $sector =DB::table("sector")->
            where('nombre', '=', $_POST['sector'])->get();

            $datos = DB::table("profesional")->
            select('email','nombre','apellido')->get();

            return redirect('/Ini_Profesional')->
            with('profesional',$query[0])->
            with('ciudad',$ciudad[0])->
            with('sector',$sector[0])->
            with('tipo','PROFESIONAL')->
            with('datos',$datos);
        }

        return redirect('/Login_Socio')->with('error', '¿COMO HAS LLEGADO HASTA AQUI?');
    }
}
