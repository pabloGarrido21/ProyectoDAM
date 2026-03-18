<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManejoTablaController extends Controller
{

    public function Datos_Ejemplo_Socio($tipo)
    {
        $query = DB::table("socio")->
        join("ciudad","socio.ciudad","=","ciudad.id")->
        select("socio.*",
            "ciudad.nombre as ciudad",
            "ciudad.codigo_postal as cod_pos")->
        where("email", "=", $_POST['original'])->get();

        if ($tipo == 'SOCIO')
        {

            $datos = DB::table("profesional")->
            select('email','nombre','apellido')->get();

            return redirect('/Ini_Socio')->
            with('socio',$query[0])->
            with('tipo','PROFESIONAL')->
            with('datos',$datos);
        }
        else
        {

            $datos = DB::table("socio")->
            select('email','nombre','apellido')->get();

            return redirect('/Ini_Socio')->
            with('socio',$query[0])->
            with('tipo','SOCIO')->
            with('datos',$datos);
        }
    }



    public function Datos_Ejemplo_Prof($tipo)
    {
        $query = DB::table("profesional")->
        join("ciudad","profesional.ciudad","=","ciudad.id")->
        join("sector","profesional.profesion","=","sector.id")->
        select("profesional.*",
            "ciudad.nombre as ciudad",
            "ciudad.codigo_postal as cod_pos",
            "sector.nombre as sector")->
        where("email", "=", $_POST['original'])->get();


        if ($tipo == 'SOCIO')
        {

            $datos = DB::table("profesional")->
            select('email','nombre','apellido')->get();

            return redirect('/Ini_Profesional')->
            with('profesional',$query[0])->
            with('tipo','PROFESIONAL')->
            with('datos',$datos);
        }
        else
        {

            $datos = DB::table("socio")->
            select('email','nombre','apellido')->get();

            return redirect('/Ini_Profesional')->
            with('profesional',$query[0])->
            with('tipo','SOCIO')->
            with('datos',$datos);
        }

    }

    public function Click_Ofertas_Socio(Request $request)
    {

        $original = $request->query('original');
        $tipo = $request->query('tipo');
        $id = $request->query('email');

        $query = DB::table("socio")->
        join("ciudad","socio.ciudad","=","ciudad.id")->
        select("socio.*",
            "ciudad.nombre as ciudad",
            "ciudad.codigo_postal as cod_pos")->
        where("email", "=", $original)->get();

        if ($tipo == 'SOCIO')
        {
            $datos = DB::table("socio")->
            join("ciudad","socio.ciudad","=","ciudad.id")->
            select("socio.*",
                "ciudad.nombre as ciudad",
                "ciudad.codigo_postal as cod_pos")->
            where("email", "=", $id)->get();
        }
        else
        {

            $datos = DB::table("profesional")->
            join("ciudad","profesional.ciudad","=","ciudad.id")->
            join("sector","profesional.profesion","=","sector.id")->
            select("profesional.*",
                "ciudad.nombre as ciudad",
                "ciudad.codigo_postal as cod_pos",
                "sector.nombre as sector")->
            where("email", "=", $id)->get();
        }

        return redirect('/Ofer_Socio')->
        with('original',$query[0])->
        with('datos',$datos[0])->
        with('tipo',$tipo);


    }


    public function Filtro_Oferta($tipo)
    {
        $id = '';
        $altera = 'BASE';
        $ciudades = DB::table("ciudad")->get();
        $sectores = DB::table("sector")->get();

        $usuario = DB::table("socio")->
            where("email", "=", $_POST['usuario'])->get();

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
        with('usuario', $usuario[0])->
        with('datos', $datos)->
        with('ciudades', $ciudades)->
        with('sectores', $sectores)->
        with('tipo', $altera)->
        with('id', $id);

    }

    public function Oferta_Socio()
    {
        return view('Ofertas_Socio');
    }


}
