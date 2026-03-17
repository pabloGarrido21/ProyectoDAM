@props([
    'origen' => 'SOCIO'

])

<style>
    body {
        margin: 50px;
        font-family: Arial, sans-serif;
        background: linear-gradient(to right, #1f4037, #99f2c8);
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        color: white;
    }

</style>


<x-layout_Ofertas titulo="Ofertas Socio" titulo2="Usario Seleccionado">



    <button class="btn volver"  onclick="action='/Ini_Socio';">
        Volver
    </button>

    <input type="hidden" name="origen" value="<?php echo $origen;?>">



</x-layout_Ofertas>
