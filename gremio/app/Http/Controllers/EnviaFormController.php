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
            with('ciudades', $ciudades);
        }

        if($_POST['origen'] == 'PROFESIONAL')
        {
            return redirect('/Registro_Profesional')->
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


        if($_POST['origen'] == 'SOCIO')
        {
            $original = DB::table("socio")->
            join("ciudad","socio.ciudad","=","ciudad.id")->
            select("socio.*",
                "ciudad.id as id_ciudad",
                "ciudad.nombre as ciudad",
                "ciudad.codigo_postal as cod_pos")->
                where("email", "=", $_POST['original'])->get();

            return redirect('/Modificar_Socio')->
            with('original', $original[0])->
            with('ciudades', $ciudades);
        }

        if($_POST['origen'] == 'PROFESIONAL')
        {
            $original = DB::table("profesional")->
            join("ciudad","profesional.ciudad","=","ciudad.id")->
            join("sector","profesional.profesion","=","sector.id")->
            select("profesional.*",
                "ciudad.id as id_ciudad",
                "ciudad.nombre as ciudad",
                "ciudad.codigo_postal as cod_pos",
                "sector.id as id_sector",
                "sector.nombre as sector")->
            where("email", "=", $_POST['original'])->get();

            $sectores =DB::table("sector")->
            orderBy('nombre')->get();


            return redirect('/Modificar_Profesional')->
            with('original', $original[0])->
            with('ciudades', $ciudades)->
            with('sectores', $sectores);
        }



        return redirect('/Login_Socio')->with('error', '¿COMO HAS LLEGADO HASTA AQUI?');
    }


    public function Devuelve_Modificar()
    {

        if('SOCIO' === $_POST['origen'])
        {
            $query = DB::table("socio")->
            join("ciudad","socio.ciudad","=","ciudad.id")->
            select("socio.*",
                "ciudad.nombre as ciudad",
                "ciudad.codigo_postal as cod_pos")->
            where("email", "=", $_POST['original'])->get();

            $datos = DB::table("socio")->
            select('email','nombre','apellido')->get();

            return redirect('/Ini_Socio')->
            with('socio',$query[0])->
            with('tipo','SOCIO')->
            with('datos',$datos);
        }

        if($_POST['origen'] === 'PROFESIONAL')
        {
            $query = DB::table("profesional")->
            join("ciudad","profesional.ciudad","=","ciudad.id")->
            join("sector","profesional.profesion","=","sector.id")->
            select("profesional.*",
                "ciudad.nombre as ciudad",
                "ciudad.codigo_postal as cod_pos",
                "sector.nombre as sector")->
            where("email", "=", $_POST['original'])->get();

            $datos = DB::table("profesional")->
            select('email','nombre','apellido')->get();

            return redirect('/Ini_Profesional')->
            with('profesional',$query[0])->
            with('tipo','PROFESIONAL')->
            with('datos',$datos);
        }

        return redirect('/Login_Socio')->with('error', '¿COMO HAS LLEGADO HASTA AQUI?');
    }
}
