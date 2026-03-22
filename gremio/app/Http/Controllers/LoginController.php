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

        return redirect('/Login_Profesional')->with('error', 'Datos incorrectos');
    }

    public function Ini_Profesional()
    {

        return view('Inicio_Profesional');

    }
}
