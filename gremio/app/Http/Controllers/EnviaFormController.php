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

            $datos = DB::table("contrato")->
            join("profesional","contrato.id_profesional","=","profesional.id")->
            join("socio","contrato.id_socio","=","socio.id")->
            join("oferta","contrato.id_oferta","=","oferta.id")->
            select("contrato.*",
                "socio.email as socio",
                "profesional.email as profesional",
                "oferta.titulo as oferta")->
            where("socio.email", "=", $_POST['original'])->
            where("contrato.estado", "=", "activo")->get();

            return redirect('/Ini_Socio')->
            with('socio',$query[0])->
            with('tipo','ACTIVO')->
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

            $datos = DB::table("contrato")->
            join("profesional","contrato.id_profesional","=","profesional.id")->
            join("socio","contrato.id_socio","=","socio.id")->
            join("oferta","contrato.id_oferta","=","oferta.id")->
            select("contrato.*",
                "socio.email as socio",
                "profesional.email as profesional",
                "oferta.titulo as oferta")->
            where("profesional.email", "=", $_POST['original'])->
            where("contrato.estado", "=", "activo")->get();

            return redirect('/Ini_Profesional')->
            with('profesional',$query[0])->
            with('tipo','ACTIVO')->
            with('datos',$datos);
        }

        return redirect('/Login_Socio')->with('error', '¿COMO HAS LLEGADO HASTA AQUI?');
    }




    //OFERTAS
    public function Envia_Oferta()
    {

        if($_POST['origen'] == 'SOCIO')
        {
            $datos = DB::table("oferta")->
            join("profesional","oferta.id_profesional","=","profesional.id")->
            join("sector","oferta.profesion","=","sector.id")->
            join("ciudad","oferta.ciudad","=","ciudad.id")->
            select("oferta.*",
            "profesional.nombre as profesional",
            "ciudad.nombre as ciudad",
            "sector.nombre as sector")->get();

            $ciudades =DB::table("ciudad")->
            orderBy('nombre')->get();

            $sectores =DB::table("sector")->
            orderBy('nombre')->get();

            return redirect('/Oferta_Socio')->
            with('usuario', $_POST['original'])->
            with('datos', $datos)->
            with('ciudades', $ciudades)->
            with('sectores', $sectores)->
            with('tipo','BASE')->
            with('id','');
        }

        if($_POST['origen'] == 'PROFESIONAL')
        {
            $usuario = DB::table("profesional")->
            where("email", "=", $_POST['original'])->get();


            $datos = DB::table("oferta")->
            join("profesional","oferta.id_profesional","=","profesional.id")->
            join("sector","oferta.profesion","=","sector.id")->
            join("ciudad","oferta.ciudad","=","ciudad.id")->
            select("oferta.*",
                "profesional.nombre as profesional",
                "ciudad.nombre as ciudad",
                "sector.nombre as sector")->
            where("profesional.id", "=", $usuario[0]->id)->get();

            return redirect('/Oferta_Profesional')->
            with('usuario', $usuario[0]->email)->
            with('datos', $datos);
        }



        return redirect('/Login_Socio')->with('error', '¿COMO HAS LLEGADO HASTA AQUI?');
    }




    public function Devuelve_Oferta()
    {

        if('SOCIO' === $_POST['origen'])
        {
            $query = DB::table("socio")->
            join("ciudad","socio.ciudad","=","ciudad.id")->
            select("socio.*",
                "ciudad.nombre as ciudad",
                "ciudad.codigo_postal as cod_pos")->
            where("email", "=", $_POST['usuario'])->get();

            $datos = DB::table("contrato")->
            join("profesional","contrato.id_profesional","=","profesional.id")->
            join("socio","contrato.id_socio","=","socio.id")->
            join("oferta","contrato.id_oferta","=","oferta.id")->
            select("contrato.*",
                "socio.email as socio",
                "profesional.email as profesional",
                "oferta.titulo as oferta")->
            where("socio.email", "=", $_POST['usuario'])->
            where("contrato.estado", "=", "activo")->get();

            return redirect('/Ini_Socio')->
            with('socio',$query[0])->
            with('tipo','ACTIVO')->
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
            where("email", "=", $_POST['usuario'])->get();

            $datos = DB::table("contrato")->
            join("profesional","contrato.id_profesional","=","profesional.id")->
            join("socio","contrato.id_socio","=","socio.id")->
            join("oferta","contrato.id_oferta","=","oferta.id")->
            select("contrato.*",
                "socio.email as socio",
                "profesional.email as profesional",
                "oferta.titulo as oferta")->
            where("profesional.email", "=", $_POST['usuario'])->
            where("contrato.estado", "=", "activo")->get();

            return redirect('/Ini_Profesional')->
            with('profesional',$query[0])->
            with('tipo','ACTIVO')->
            with('datos',$datos);
        }

        return redirect('/Login_Socio')->with('error', '¿COMO HAS LLEGADO HASTA AQUI?');
    }

    public function Envia_M_Oferta()
    {
        $datos = DB::table("oferta")->
        join("profesional","oferta.id_profesional","=","profesional.id")->
        join("sector","oferta.profesion","=","sector.id")->
        join("ciudad","oferta.ciudad","=","ciudad.id")->
        select("oferta.*",
            "profesional.nombre as prof_nombre",
            "profesional.apellido as prof_apellido",
            "profesional.email as prof_email",
            "profesional.telefono as prof_telefono",
            "ciudad.nombre as ciudad",
            "sector.nombre as sector")->
        where("oferta.id", "=", $_POST['oferta'])->get();

        return redirect('/Modifica_Oferta')->
        with('usuario', $_POST['usuario'])->
        with('datos', $datos[0]);

    }

    public function Modifica_Oferta()
    {
        return view('Modifica_Oferta');
    }


    public function Envia_Contrato()
    {
        $datos = DB::table("oferta")->
        join("profesional","oferta.id_profesional","=","profesional.id")->
        join("sector","oferta.profesion","=","sector.id")->
        join("ciudad","oferta.ciudad","=","ciudad.id")->
        select("oferta.*",
            "profesional.nombre as prof_nombre",
            "profesional.apellido as prof_apellido",
            "profesional.email as prof_email",
            "profesional.telefono as prof_telefono",
            "ciudad.nombre as ciudad",
            "sector.nombre as sector")->
        where("oferta.id", "=", $_POST['oferta'])->get();

        return redirect('/Crea_Contrato')->
        with('usuario', $_POST['usuario'])->
        with('oferta', $datos[0]);

    }

    public function Crea_Contrato()
    {
        return view('Crea_Contrato');
    }



}
