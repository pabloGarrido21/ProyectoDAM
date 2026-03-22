<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContratoController extends Controller
{
    //

    public function Crea_Contrato()
    {
        $fecha = \Carbon\Carbon::parse($_POST["fecha"]);

        $usuario = DB::table("socio")->where(
            "email", "=", $_POST['usuario'])->get();

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

        if($_POST['descripcion'] === "")
        {
            return redirect('/Crea_Contrato')->
            with('error', 'Falta introducir la Descripción')->
            with('usuario', $_POST['usuario'])->
            with('oferta', $datos[0]);

        }

        if ($fecha->isBefore(\Carbon\Carbon::today())) {
            return redirect('/Crea_Contrato')->
            with('error', 'Falta introducir una Fecha Valida')->
            with('usuario', $_POST['usuario'])->
            with('oferta', $datos[0]);
        }


        $contratos = DB::table("contrato")->
        join("oferta","contrato.id_oferta","=","oferta.id")->
        select("contrato.*",
        "oferta.duracion as duracion")->
        where("contrato.id_profesional", "=", $datos[0]->id_profesional)->
        where("estado", "=" , "activo")->
        whereDate('fecha_inicio', '=', $fecha)->get();


        if(count($contratos) > 0)
        {
            return redirect('/Crea_Contrato')->
            with('error', 'La fecha ingresada ya está ocupada por otro Socio')->
            with('usuario', $_POST['usuario'])->
            with('oferta', $datos[0]);
        }


        $query = DB::table("contrato")->
        where("id_oferta", "=", $datos[0]->id)->
        where("id_profesional", "=", $datos[0]->id_profesional)->
        where("id_socio", "=", $usuario[0]->id)->
        where("estado", "!=" , "cancelado")->
        where("estado", "!=" , "terminado")->get();

        if(count($query) > 0)
        {
            return redirect('/Crea_Contrato')->
            with('error', 'Ya tienes un Contrato utilizando esta Oferta')->
            with('usuario', $_POST['usuario'])->
            with('oferta', $datos[0]);
        }



        DB::table("contrato")->
        insert([
            "id_profesional" => $datos[0]->id_profesional,
            "id_socio" => $usuario[0]->id,
            "id_oferta" => $datos[0]->id,
            "comentario" => $_POST['descripcion'],
            "precio" => $datos[0]->precio,
            "fecha_inicio" => $fecha
        ]);


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
        with('error', 'Contrato Realizado' )->
        with('usuario', $_POST['usuario'])->
        with('datos', $datos)->
        with('ciudades', $ciudades)->
        with('sectores', $sectores)->
        with('tipo','BASE')->
        with('id','');

    }


    public function Contrato_Socio()
    {
        return view('Vista_Contrato_Socio');
    }

    public function Contrato_Profesional()
    {
        return view('Vista_Contrato_Profesional');
    }



    public function Termina_Contrato()
    {
        $contrato = DB::table("contrato")->
            where("id", "=", $_POST["contrato"])->get();


        $fecha_ini = \Carbon\Carbon::parse($contrato[0]->fecha_inicio);
        $fecha_fin = \Carbon\Carbon::today();

        DB::table("contrato")->
        where("id", "=", $_POST['contrato'])->
        update([
            'id_profesional' => $contrato[0]->id_profesional,
            'id_socio' => $contrato[0]->id_socio,
            'id_oferta' => $contrato[0]->id_oferta,
            'comentario' => $contrato[0]->comentario,
            'precio' => $contrato[0]->precio,
            'fecha_inicio' => $fecha_ini,
            'fecha_fin' => $fecha_fin,
            'estado' => "terminado"
        ]);

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

    public function Acepta_Contrato()
    {
        $contrato = DB::table("contrato")->
        where("id", "=", $_POST["contrato"])->get();


        $fecha_ini = \Carbon\Carbon::parse($contrato[0]->fecha_inicio);

        DB::table("contrato")->
        where("id", "=", $_POST['contrato'])->
        update([
            'id_profesional' => $contrato[0]->id_profesional,
            'id_socio' => $contrato[0]->id_socio,
            'id_oferta' => $contrato[0]->id_oferta,
            'comentario' => $contrato[0]->comentario,
            'precio' => $contrato[0]->precio,
            'fecha_inicio' => $fecha_ini,
            'estado' => "activo"
        ]);

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

    public function Rechaza_Contrato()
    {
        $contrato = DB::table("contrato")->
        where("id", "=", $_POST["contrato"])->get();


        $fecha_ini = \Carbon\Carbon::parse($contrato[0]->fecha_inicio);

        DB::table("contrato")->
        where("id", "=", $_POST['contrato'])->
        update([
            'id_profesional' => $contrato[0]->id_profesional,
            'id_socio' => $contrato[0]->id_socio,
            'id_oferta' => $contrato[0]->id_oferta,
            'comentario' => $contrato[0]->comentario,
            'precio' => $contrato[0]->precio,
            'fecha_inicio' => $fecha_ini,
            'estado' => "cancelado"
        ]);

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

}
