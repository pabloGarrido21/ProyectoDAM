<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManejoTablaController extends Controller
{

    public function Contrato_Socio($tipo)
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
        where("socio.email", "=", $_POST['original']);

        $envia = "";

        if ($tipo == 'ACTIVO')
        {

            $datos = $datos->
            where("contrato.estado", "=", "pendiente")->get();

            $envia = "PENDIENTE";
        }

        if ($tipo == "PENDIENTE")
        {

            $datos = $datos->
            where("contrato.estado", "=", "terminado")->get();

            $envia = "TERMINADO";
        }

        if ($tipo == "TERMINADO")
        {

            $datos = $datos->
            where("contrato.estado", "=", "activo")->get();

            $envia = 'ACTIVO';
        }


        return redirect('/Ini_Socio')->
        with('socio',$query[0])->
        with('tipo',$envia)->
        with('datos',$datos);
    }



    public function Contrato_Prof($tipo)
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
        where("profesional.email", "=", $_POST['original']);

        $envia = "";

        if ($tipo == 'ACTIVO')
        {

            $datos = $datos->
            where("contrato.estado", "=", "pendiente")->get();

            $envia = "PENDIENTE";
        }

        if ($tipo == "PENDIENTE")
        {

            $datos = $datos->
            where("contrato.estado", "=", "terminado")->get();

            $envia = "TERMINADO";
        }

        if ($tipo == "TERMINADO")
        {

            $datos = $datos->
            where("contrato.estado", "=", "activo")->get();

            $envia = 'ACTIVO';
        }


        return redirect('/Ini_Profesional')->
        with('profesional',$query[0])->
        with('tipo',$envia)->
        with('datos',$datos);

    }

    public function Click_Contrato(Request $request)
    {

        $original = $request->query('original');
        $tipo = $request->query('tipo');
        $contrato = $request->query('contrato');
        $origen = $request->query('origen');


        $datos = DB::table("contrato")->
        join("profesional","contrato.id_profesional","=","profesional.id")->
        join("socio","contrato.id_socio","=","socio.id")->
        join("oferta","contrato.id_oferta","=","oferta.id")->
        select("contrato.*",
            "socio.email as socio_email",
            "socio.nombre as socio_nombre",
            "socio.apellido as socio_apellido",
            "profesional.email as prof_email",
            "profesional.nombre as prof_nombre",
            "profesional.apellido as prof_apellido",
            "oferta.titulo as oferta",
            "oferta.duracion as duracion")->
        where("contrato.id", "=", $contrato)->get();


        if ($origen == 'SOCIO')
        {
            return redirect('/Vista_Contr_Socio')->
            with('usuario',$original)->
            with('datos',$datos[0])->
            with('tipo',$tipo)->
            with('origen',$origen);

        }
        else
        {
            return redirect('/Vista_Contr_Profesional')->
            with('usuario',$original)->
            with('datos',$datos[0])->
            with('tipo',$tipo)->
            with('origen',$origen);
        }

    }


    public function Filtro_Oferta($tipo)
    {
        $id = '';
        $altera = 'BASE';
        $ciudades = DB::table("ciudad")->get();
        $sectores = DB::table("sector")->get();

        $datos = DB::table("oferta")->
        join("profesional","oferta.id_profesional","=","profesional.id")->
        join("sector","oferta.profesion","=","sector.id")->
        join("ciudad","oferta.ciudad","=","ciudad.id")->
        select("oferta.*",
            "profesional.nombre as profesional",
            "ciudad.nombre as ciudad",
            "sector.nombre as sector");


        if($tipo == 'CIUDAD')
        {
            $datos = $datos->
            where("oferta.ciudad", "=", $_POST['ciudad'])->get();

            $altera = 'CIUDAD';

            $id = $_POST['ciudad'];

        }

        elseif($tipo == 'SECTOR')
        {
            $datos = $datos->
            where("oferta.profesion", "=", $_POST['sector'])->get();

            $altera = 'SECTOR';

            $id = $_POST['sector'];

        }

        elseif($_POST['tipo'] == 'CIUDAD')
        {
            $datos = $datos->
            where("oferta.ciudad", "=", $_POST['id']);

            $altera = 'CIUDAD';

            $id = $_POST['id'];
        }

        elseif($_POST['tipo'] == 'SECTOR')
        {
            $datos = $datos->
            where("oferta.profesion", "=", $_POST['id']);

            $altera = 'SECTOR';

            $id = $_POST['id'];
        }



        if($tipo == 'BASE')
        {
            $datos = DB::table("oferta")->
            join("profesional","oferta.id_profesional","=","profesional.id")->
            join("sector","oferta.profesion","=","sector.id")->
            join("ciudad","oferta.ciudad","=","ciudad.id")->
            select("oferta.*",
                "profesional.nombre as profesional",
                "ciudad.nombre as ciudad",
                "sector.nombre as sector")->get();
        }

        if($tipo == 'ALFA')
        {
            $datos = $datos->
                orderBy("titulo")->get();
        }

        if($tipo == 'PRECIO')
        {
            $datos = $datos->
            orderBy("precio")->get();
        }

        return redirect('/Oferta_Socio')->
        with('usuario', $_POST['usuario'])->
        with('datos', $datos)->
        with('ciudades', $ciudades)->
        with('sectores', $sectores)->
        with('tipo', $altera)->
        with('id', $id);

    }




    public function Click_Ofertas(Request $request)
    {
        $origen = $request->query('origen');
        $usuario = $request->query('usuario');
        $id = $request->query('id');

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
        where("oferta.id", "=", $id)->get();

        if($origen == 'SOCIO')
        {
            return redirect('/Vista_Oferta_Socio')->
            with('usuario',$usuario)->
            with('datos',$datos[0])->
            with('origen',$origen)->
            with('oferta',$id);
        }

        return redirect('/Vista_Oferta_Profesional')->
        with('usuario',$usuario)->
        with('datos',$datos[0])->
        with('origen',$origen)->
        with('oferta',$id);


    }




}
