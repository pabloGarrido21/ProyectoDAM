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
        $query = DB::table("socio")->where(
            "email", "=", $_POST['usuario'])->get();

        $ciudades =DB::table("ciudad")->
            orderBy('nombre')->get();

        if (count($query) > 0) {
            return redirect('/Registro_Socio')->
                with('error', 'Usuario ya existe')->
                with('ciudades', $ciudades);
        }

        if($_POST['passw'] != $_POST['passw2'])
        {
            return redirect('/Registro_Socio')->
                with('error', 'Se ha equivocado al repetir la contraseña')->
                with('ciudades', $ciudades);
        }

        if($_POST['nombre'] != '' and $_POST['apellido'] != '')
        {

            DB::table("socio")->insert([
                'email' => $_POST['usuario'],
                'password' => $_POST['passw'],
                'nombre' => $_POST['nombre'],
                'apellido' => $_POST['apellido'],
                'telefono' => $_POST['telefono'],
                'direccion' => $_POST['direccion'],
                'ciudad' => $_POST['ciudad'],
            ]);

            $query = DB::table("socio")->where(
                "email", "=", $_POST['usuario'])->get();

            $ciudad =DB::table("ciudad")->
            where('id', '=', $_POST['ciudad'])->get();

            return redirect('/Ini_Socio')->
            with('socio',$query[0])->
            with('ciudad',$ciudad[0]);
        }


        return redirect('/Registro_Socio')->
            with('error', 'Error Indefinido')->
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

        if (count($query) > 0) {

            $ciudad =DB::table("ciudad")->
            where('id', '=', $query[0]->ciudad)->get();

            $sector =DB::table("sector")->
            where('id', '=', $query[0]->profesion)->get();

            return redirect('/Ini_Profesional')->
            with('email',$query[0]->email)->
            with('nombre',$query[0]->nombre)->
            with('apellido',$query[0]->apellido)->
            with('telefono',$query[0]->telefono)->
            with('direccion',$query[0]->direccion)->
            with('ciudad',$ciudad[0]->nombre)->
            with('cod_pos',$ciudad[0]->codigo_postal)->
            with('sector',$sector[0]->nombre);
        }

        return redirect('/Registro_Socio')->with('error', 'Datos incorrectos');
    }
}
