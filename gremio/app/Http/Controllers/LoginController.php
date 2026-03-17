<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class LoginController extends Controller
{
    //

    public function Login_Socio()
    {
        return view('Login_Socio');
    }

    public function Comprueba_Socio()
    {
        $query = DB::table("socio")->
            join("ciudad","socio.ciudad","=","ciudad.id")->
            select("socio.*",
                "ciudad.nombre as ciudad",
                "ciudad.codigo_postal as cod_pos")->
        where("email", "=", $_POST['usuario'])->
        Where("password","=",$_POST['passw'])->get();

        if (count($query) > 0) {

            $datos = DB::table("socio")->
            select('email','nombre','apellido')->get();

            return redirect('/Ini_Socio')->
            with('socio',$query[0])->
            with('tipo','SOCIO')->
            with('datos',$datos);
        }

        return redirect('/Login_Socio')->with('error', 'Datos incorrectos');
    }

    public function Ini_Socio()
    {

        return view('Inicio_Socio');

    }


    //PARTE DE PROFESIONAL

    public function Login_Profesional()
    {
        return view('Login_Profesional');
    }



    public function Comprueba_Profesional()
    {
        $query = DB::table("profesional")->
        join("ciudad","profesional.ciudad","=","ciudad.id")->
        join("sector","profesional.profesion","=","sector.id")->
        select("profesional.*",
            "ciudad.nombre as ciudad",
            "ciudad.codigo_postal as cod_pos",
            "sector.nombre as sector")->
        where("email", "=", $_POST['usuario'])->Where(
            "password","=",$_POST['passw'])->get();

        if (count($query) > 0) {

            $datos = DB::table("profesional")->
            select('email','nombre','apellido')->get();

            return redirect('/Ini_Profesional')->
            with('profesional',$query[0])->
            with('tipo','PROFESIONAL')->
            with('datos',$datos);
        }

        return redirect('/Login_Profesional')->with('error', 'Datos incorrectos');
    }

    public function Ini_Profesional()
    {

        return view('Inicio_Profesional');

    }
}
