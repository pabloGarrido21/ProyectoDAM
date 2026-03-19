<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OfertaController extends Controller
{
    //


    public function Oferta_Socio()
    {
        return view('Ofertas_Socio');
    }


    public function Oferta_Profesional()
    {
        return view('Ofertas_Profesional');
    }


    public function Vista_Oferta_Socio()
    {
        return view('Vista_Oferta_Socio');
    }


    public function Vista_Oferta_Profesional()
    {
        return view('Vista_Oferta_Profesional');
    }

    public function Crear_Oferta()
    {
        $usuario = DB::table("profesional")->where(
            "email", "=", $_POST['usuario'])->get();

        $datos = DB::table("oferta")->
        join("profesional","oferta.id_profesional","=","profesional.id")->
        join("sector","oferta.profesion","=","sector.id")->
        join("ciudad","oferta.ciudad","=","ciudad.id")->
        select("oferta.*",
            "profesional.nombre as profesional",
            "ciudad.nombre as ciudad",
            "sector.nombre as sector")->
        where("oferta.id_profesional", "=", $usuario[0]->id)->get();

        if($_POST['titulo'] === "")
        {
            return redirect('/Oferta_Profesional')->
            with('error', 'Falta introducir el titulo')->
            with('usuario', $_POST['usuario'])->
            with('datos', $datos);

        }

        if ($_POST['precio'] === "" or $_POST['precio'] <= 0) {
            return redirect('/Oferta_Profesional')->
            with('error', 'Falta introducir un Precio Valido')->
            with('usuario', $_POST['usuario'])->
            with('datos', $datos);
        }

        $query = DB::table("oferta")->
        where("id_profesional", "=", $usuario[0]->id)->
        where("titulo", "=",$_POST['titulo'] )->get();

        if(count($query) > 0)
        {
            return redirect('/Oferta_Profesional')->
            with('error', 'Ya Tienes una Oferta Con este Titulo')->
            with('usuario', $_POST['usuario'])->
            with('datos', $datos);
        }

        DB::table("oferta")->insert([
            'titulo' => $_POST['titulo'],
            'profesion' => $usuario[0]->profesion,
            'id_profesional' => $usuario[0]->id,
            'ciudad' => $usuario[0]->ciudad,
            'precio' => $_POST['precio']
        ]);


        $datos = DB::table("oferta")->
        join("profesional","oferta.id_profesional","=","profesional.id")->
        join("sector","oferta.profesion","=","sector.id")->
        join("ciudad","oferta.ciudad","=","ciudad.id")->
        select("oferta.*",
            "profesional.nombre as profesional",
            "ciudad.nombre as ciudad",
            "sector.nombre as sector")->
        where("oferta.id_profesional", "=", $usuario[0]->id)->get();

        return redirect('/Oferta_Profesional')->
        with('error', 'Oferta con titulo '.$_POST['titulo'].' Creada' )->
        with('usuario', $_POST['usuario'])->
        with('datos', $datos);
    }


}
