<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
