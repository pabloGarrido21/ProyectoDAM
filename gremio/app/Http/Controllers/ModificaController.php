<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ModificaController extends Controller
{
    //


    public function Modifica_Socio()
    {
        return view('Modifica_Socio');
    }


    public function Confirma_Socio()
    {
        $query = DB::table("socio")->
        where("email", "=", $_POST['usuario'])->get();

        $original = DB::table("socio")->
        join("ciudad","socio.ciudad","=","ciudad.id")->
        select("socio.*",
            "ciudad.id as id_ciudad",
            "ciudad.nombre as ciudad",
            "ciudad.codigo_postal as cod_pos")->
        where("email", "=", $_POST['original'])->get();

        $ciudades =DB::table("ciudad")->
        orderBy('nombre')->get();


        if($_POST['usuario'] === "")
        {
            return redirect('/Modificar_Socio')->
            with('error', 'Falta introducir el usuario')->
            with('ciudades', $ciudades)->
            with('original', $original[0])->
            with('origen', $_POST['origen']);

        }


        if (count($query) > 0 and $_POST['usuario'] != $_POST['original']) {
            return redirect('/Modificar_Socio')->
            with('error', 'Usuario no Válido')->
            with('ciudades', $ciudades)->
            with('original', $original[0])->
            with('origen', $_POST['origen']);
        }

        if($_POST['passw'] != $_POST['passw2'] or $_POST['passw'] === "")
        {
            return redirect('/Modificar_Socio')->
            with('error', 'Falta Confirmar Contraseña')->
            with('ciudades', $ciudades)->
            with('original', $original[0])->
            with('origen', $_POST['origen']);
        }

        if($_POST['nombre'] != '' and $_POST['apellido'] != ''
            and $_POST['telefono'] != '' and $_POST['direccion'] != '')
        {

            DB::table("socio")->
            where("email", "=", $_POST['original'])->
            update([
                'email' => $_POST['usuario'],
                'password' => $_POST['passw'],
                'nombre' => $_POST['nombre'],
                'apellido' => $_POST['apellido'],
                'telefono' => $_POST['telefono'],
                'direccion' => $_POST['direccion'],
                'ciudad' => $_POST['ciu']
            ]);

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


        return redirect('/Modificar_Socio')->
        with('error', 'Datos Personales no Aportados')->
        with('ciudades', $ciudades)->
        with('original', $original[0])->
        with('origen', $_POST['origen']);
    }


    public function Modifica_Profesional()
    {
        return view('Modifica_Profesional');
    }



    public function Confirma_Profesional()
    {
        $query = DB::table("profesional")->
        where("email", "=", $_POST['usuario'])->get();

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

        $ciudades =DB::table("ciudad")->
        orderBy('nombre')->get();

        $sectores = DB::table("sector")->
            orderBy('nombre')->get();


        if($_POST['usuario'] === "")
        {
            return redirect('/Modificar_Porfesional')->
            with('error', 'Falta introducir el usuario')->
            with('ciudades', $ciudades)->
            with('sectores', $sectores)->
            with('original', $original[0])->
            with('origen', $_POST['origen']);

        }


        if (count($query) > 0 and $_POST['usuario'] != $_POST['original']) {
            return redirect('/Modificar_Porfesional')->
            with('error', 'Usuario no Válido')->
            with('ciudades', $ciudades)->
            with('sectores', $sectores)->
            with('original', $original[0])->
            with('origen', $_POST['origen']);
        }

        if($_POST['passw'] != $_POST['passw2'] or $_POST['passw'] === "")
        {
            return redirect('/Modificar_Porfesional')->
            with('error', 'Falta Confirmar Contraseña')->
            with('ciudades', $ciudades)->
            with('sectores', $sectores)->
            with('original', $original[0])->
            with('origen', $_POST['origen']);
        }

        if($_POST['nombre'] != '' and $_POST['apellido'] != ''
            and $_POST['telefono'] != '' and $_POST['direccion'] != '')
        {

            DB::table("profesional")->
            where("email", "=", $_POST['original'])->
            update([
                'email' => $_POST['usuario'],
                'password' => $_POST['passw'],
                'nombre' => $_POST['nombre'],
                'apellido' => $_POST['apellido'],
                'telefono' => $_POST['telefono'],
                'direccion' => $_POST['direccion'],
                'ciudad' => $_POST['ciu'],
                'profesion' => $_POST['sec']
            ]);

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


        return redirect('/Modificar_Profesional')->
        with('error', 'Datos Personales no Aportados')->
        with('ciudades', $ciudades)->
        with('sectores', $sectores)->
        with('original', $original[0])->
        with('origen', $_POST['origen']);
    }
}
