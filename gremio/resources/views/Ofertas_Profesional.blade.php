@props([

    'origen' => 'PROFESIONAL'

])

<style>
    body {
        margin: 70px;
        font-family: Arial, sans-serif;
        background: linear-gradient(to right, #1f3740 , #9bd3ff);
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        color: white;
    }


</style>


<x-layout_Ofertas titulo="Ofertas Profesional" titulo2="Mis Ofertas" origen="PROFESIONAL">

    <button class="btn volver"  onclick="action='/Devuelve_Oferta';">
        Volver
    </button>

</x-layout_Ofertas>
