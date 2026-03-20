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


        $query = DB::table("contrato")->
        where("id_oferta", "=", $datos[0]->id)->
        where("id_profesional", "=", $datos[0]->id_profesional)->
        where("id_socio", "=", $usuario[0]->id)->get();

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
            "sector.nombre as sector")->
        where("oferta.id_profesional", "=", $usuario[0]->id)->get();

        return redirect('/Oferta_Socio')->
        with('error', 'Contrato Realizado' )->
        with('usuario', $_POST['usuario'])->
        with('datos', $datos);
    }
}
