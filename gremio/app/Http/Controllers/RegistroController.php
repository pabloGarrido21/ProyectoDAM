<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegistroController extends Controller
{
    //parte socio
    public function Registro_Socio()
    {

        return view('Registrarse_Socio');
    }

    public function Comprueba_Socio()
    {
        $query = DB::table("socio")->
        where("email", "=", $_POST['usuario'])->get();

        $ciudades =DB::table("ciudad")->
            orderBy('nombre')->get();

        if($_POST['usuario'] === "")
        {
            return redirect('/Registro_Socio')->
                with('error', 'Falta introducir el usuario')->
                with('ciudades', $ciudades);

        }

        if (count($query) > 0) {
            return redirect('/Registro_Socio')->
                with('error', 'Usuario ya existe')->
                with('ciudades', $ciudades);
        }

        if($_POST['passw'] != $_POST['passw2'] or $_POST['passw'] === "")
        {
            return redirect('/Registro_Socio')->
                with('error', 'Falta Confirmar Contraseña')->
                with('ciudades', $ciudades);
        }

        if($_POST['nombre'] != '' and $_POST['apellido'] != ''
            and $_POST['telefono'] != '' and $_POST['direccion'] != '')
        {

            DB::table("socio")->insert([
                'email' => $_POST['usuario'],
                'password' => $_POST['passw'],
                'nombre' => $_POST['nombre'],
                'apellido' => $_POST['apellido'],
                'telefono' => $_POST['telefono'],
                'direccion' => $_POST['direccion'],
                'ciudad' => $_POST['ciudad']
            ]);

            $query = DB::table("socio")->
            join("ciudad","socio.ciudad","=","ciudad.id")->
            select("socio.*",
                "ciudad.nombre as ciudad",
                "ciudad.codigo_postal as cod_pos")->
            where("email", "=", $_POST['usuario'])->get();


            $datos = DB::table("socio")->
            select('email','nombre','apellido')->get();

            return redirect('/Ini_Socio')->
            with('socio',$query[0])->
            with('tipo','SOCIO')->
            with('datos',$datos);
        }


        return redirect('/Registro_Socio')->
            with('error', 'Datos Personales no Aportados')->
            with('ciudades', $ciudades);
    }


    //Parte Profeisonal

    public function Registro_Profesional()
    {

        return view('Registrarse_Profesional');
    }

    public function Comprueba_Profesional()
    {
        $query = DB::table("profesional")->where(
            "email", "=", $_POST['usuario'])->get();

        $ciudades =DB::table("ciudad")->
        orderBy('nombre')->get();

        $sectores =DB::table("sector")->
        orderBy('nombre')->get();

        if($_POST['usuario'] === "")
        {
            return redirect('/Registro_Profesional')->
            with('error', 'Falta introducir el usuario')->
            with('ciudades', $ciudades)->
            with('sectores', $sectores);

        }

        if (count($query) > 0) {
            return redirect('/Registro_Profesional')->
            with('error', 'Usuario ya existe')->
            with('ciudades', $ciudades)->
            with('sectores', $sectores);
        }

        if($_POST['passw'] != $_POST['passw2'] or $_POST['passw'] === "")
        {
            return redirect('/Registro_Profesional')->
            with('error', 'Falta Confirmar Contraseña')->
            with('ciudades', $ciudades)->
            with('sectores', $sectores);
        }

        if($_POST['nombre'] != '' and $_POST['apellido'] != ''
            and $_POST['telefono'] != '' and $_POST['direccion'] != '')
        {

            DB::table("profesional")->insert([
                'email' => $_POST['usuario'],
                'password' => $_POST['passw'],
                'nombre' => $_POST['nombre'],
                'apellido' => $_POST['apellido'],
                'telefono' => $_POST['telefono'],
                'direccion' => $_POST['direccion'],
                'ciudad' => $_POST['ciudad'],
                'profesion' => $_POST['sector']
            ]);

            $query = DB::table("profesional")->
            join("ciudad","profesional.ciudad","=","ciudad.id")->
            join("sector","profesional.profesion","=","sector.id")->
            select("profesional.*",
                "ciudad.nombre as ciudad",
                "ciudad.codigo_postal as cod_pos",
                "sector.nombre as sector")->
            where("email", "=", $_POST['usuario'])->get();

            $datos = DB::table("profesional")->
            select('email','nombre','apellido')->get();

            return redirect('/Ini_Profesional')->
            with('profesional',$query[0])->
            with('tipo','PROFESIONAL')->
            with('datos',$datos);
        }


        return redirect('/Registro_Profesional')->
        with('error', 'Datos Personales no Aportados')->
        with('ciudades', $ciudades)->
        with('sectores', $sectores);
    }
}
