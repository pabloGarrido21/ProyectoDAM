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
        $query = DB::table("socio")->where(
            "email", "=", $_POST['usuario'])->get();

        $original = DB::table("socio")->
        where("email", "=", $_POST['original'])->get();

        $ciudades =DB::table("ciudad")->
        orderBy('nombre')->get();

        $ciudad  = DB::table("ciudad")->
        where('nombre', '=', $_POST['ciudad'])->get();


        if($_POST['usuario'] === "")
        {
            return redirect('/Modificar_Socio')->
            with('error', 'Falta introducir el usuario')->
            with('ciudades', $ciudades)->
            with('original', $original[0])->
            with('origen', $_POST['origen'])->
            with('ciudad', $ciudad[0]);

        }


        if (count($query) > 0 and $_POST['usuario'] != $_POST['original']) {
            return redirect('/Modificar_Socio')->
            with('error', 'Usuario no Válido')->
            with('ciudades', $ciudades)->
            with('original', $original[0])->
            with('origen', $_POST['origen'])->
            with('ciudad', $ciudad[0]);
        }

        if($_POST['passw'] != $_POST['passw2'] or $_POST['passw'] === "")
        {
            return redirect('/Modificar_Socio')->
            with('error', 'Falta Confirmar Contraseña')->
            with('ciudades', $ciudades)->
            with('original', $original[0])->
            with('origen', $_POST['origen'])->
            with('ciudad', $ciudad[0]);
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

            $query = DB::table("socio")->where(
                "email", "=", $_POST['usuario'])->get();

            $ciudad =DB::table("ciudad")->
            where('id', '=', $query[0]->ciudad)->get();

            return redirect('/Ini_Socio')->
            with('socio',$query[0])->
            with('ciudad',$ciudad[0]);
        }


        return redirect('/Modificar_Socio')->
        with('error', 'Datos Personales no Aportados')->
        with('ciudades', $ciudades)->
        with('original', $original[0])->
        with('origen', $_POST['origen'])->
        with('ciudad', $ciudad[0]);
    }


    public function Modifica_Profesional()
    {
        return view('Modifica_Profesional');
    }



    public function Confirma_Profesional()
    {
        $query = DB::table("profesional")->where(
            "email", "=", $_POST['usuario'])->get();

        $original = DB::table("profesional")->
        where("email", "=", $_POST['original'])->get();

        $ciudades =DB::table("ciudad")->
        orderBy('nombre')->get();

        $ciudad  = DB::table("ciudad")->
            where('nombre', '=', $_POST['ciudad'])->get();

        $sector  = DB::table("sector")->
        where('nombre', '=', $_POST['sector'])->get();


        if($_POST['usuario'] === "")
        {
            return redirect('/Modificar_Porfesional')->
            with('error', 'Falta introducir el usuario')->
            with('ciudades', $ciudades)->
            with('original', $original[0])->
            with('origen', $_POST['origen'])->
            with('ciudad', $ciudad[0])->
            with('sector', $sector[0]);

        }


        if (count($query) > 0 and $_POST['usuario'] != $_POST['original']) {
            return redirect('/Modificar_Porfesional')->
            with('error', 'Usuario no Válido')->
            with('ciudades', $ciudades)->
            with('original', $original[0])->
            with('origen', $_POST['origen'])->
            with('ciudad', $ciudad[0])->
            with('sector', $sector[0]);
        }

        if($_POST['passw'] != $_POST['passw2'] or $_POST['passw'] === "")
        {
            return redirect('/Modificar_Porfesional')->
            with('error', 'Falta Confirmar Contraseña')->
            with('ciudades', $ciudades)->
            with('original', $original[0])->
            with('origen', $_POST['origen'])->
            with('ciudad', $ciudad[0])->
            with('sector', $sector[0]);
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

            $query = DB::table("profesional")->where(
                "email", "=", $_POST['usuario'])->get();

            $ciudad =DB::table("ciudad")->
            where('id', '=', $query[0]->ciudad)->get();

            $sector =DB::table("sector")->
            where('id', '=', $query[0]->profesion)->get();

            return redirect('/Ini_Profesional')->
            with('profesional',$query[0])->
            with('ciudad',$ciudad[0])->
            with('sector', $sector[0]);
        }


        return redirect('/Modificar_Profesional')->
        with('error', 'Datos Personales no Aportados')->
        with('ciudades', $ciudades)->
        with('original', $original[0])->
        with('origen', $_POST['origen'])->
        with('ciudad', $ciudad[0])->
        with('sector', $sector[0]);
    }
}
