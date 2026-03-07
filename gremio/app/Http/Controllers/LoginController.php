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
        $query = DB::table("socio")->where(
            "email", "=", $_POST['usuario'])->Where(
            "password","=",$_POST['passw'])->get();

        if (count($query) > 0) {

            $ciudad =DB::table("ciudad")->
            where('id', '=', $query[0]->ciudad)->get();

            return redirect('/Ini_Socio')->
            with('email',$query[0]->email)->
            with('nombre',$query[0]->nombre)->
            with('apellido',$query[0]->apellido)->
            with('telefono',$query[0]->telefono)->
            with('direccion',$query[0]->direccion)->
            with('ciudad',$ciudad[0]->nombre)->
            with('cod_pos',$ciudad[0]->codigo_postal);
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
        $query = DB::table("profesional")->where(
            "email", "=", $_POST['usuario'])->Where(
            "password","=",$_POST['passw'])->get();

        if (count($query) > 0) {

            $ciudad =DB::table("ciudad")->
            where('id', '=', $query[0]->ciudad)->get();

            $prof =DB::table("sector")->
            where('id', '=', $query[0]->profesion)->get();

            return redirect('/Ini_Profesional')->
            with('email',$query[0]->email)->
            with('nombre',$query[0]->nombre)->
            with('apellido',$query[0]->apellido)->
            with('telefono',$query[0]->telefono)->
            with('direccion',$query[0]->direccion)->
            with('ciudad',$ciudad[0]->nombre)->
            with('cod_pos',$ciudad[0]->codigo_postal)->
            with('profesion',$prof[0]->nombre);
        }

        return redirect('/Login_Profesional')->with('error', 'Datos incorrectos');
    }

    public function Ini_Profesional()
    {

        return view('Inicio_Profesional');

    }
}
