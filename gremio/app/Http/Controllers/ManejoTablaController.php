<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManejoTablaController extends Controller
{
    public function Datos_Contrato($estado)
    {
        $datos = DB::table('contrato')->
            where('estado', '=', $estado)->get();


        return response()->json($datos);
    }

    public function Datos_Ejemplo_Socio($tipo)
    {
        $query = DB::table("socio")->where(
            "email", "=", $_POST['original'])->get();

        $ciudad =DB::table("ciudad")->
        where('nombre', '=', $_POST['ciudad'])->get();

        if ($tipo == 'SOCIO')
        {

            $datos = DB::table("profesional")->
            select('email','nombre','apellido')->get();

            return redirect('/Ini_Socio')->
            with('socio',$query[0])->
            with('ciudad',$ciudad[0])->
            with('tipo','PROFESIONAL')->
            with('datos',$datos);
        }
        else
        {

            $datos = DB::table("socio")->
            select('email','nombre','apellido')->get();

            return redirect('/Ini_Socio')->
            with('socio',$query[0])->
            with('ciudad',$ciudad[0])->
            with('tipo','SOCIO')->
            with('datos',$datos);
        }

    }



    public function Datos_Ejemplo_Prof($tipo)
    {
        $query = DB::table("profesional")->where(
            "email", "=", $_POST['original'])->get();

        $ciudad =DB::table("ciudad")->
        where('nombre', '=', $_POST['ciudad'])->get();

        $sector =DB::table("sector")->
        where('nombre', '=', $_POST['sector'])->get();


        if ($tipo == 'SOCIO')
        {

            $datos = DB::table("profesional")->
            select('email','nombre','apellido')->get();

            return redirect('/Ini_Profesional')->
            with('profesional',$query[0])->
            with('ciudad',$ciudad[0])->
            with('sector',$sector[0])->
            with('tipo','PROFESIONAL')->
            with('datos',$datos);
        }
        else
        {

            $datos = DB::table("socio")->
            select('email','nombre','apellido')->get();

            return redirect('/Ini_Profesional')->
            with('profesional',$query[0])->
            with('ciudad',$ciudad[0])->
            with('sector',$sector[0])->
            with('tipo','SOCIO')->
            with('datos',$datos);
        }

    }
}
