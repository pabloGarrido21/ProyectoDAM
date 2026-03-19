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


<x-layout_Vista_Oferta titulo="Inicio Profesional" titulo2="CONTRATOS ACTIVOS">



    <input type="hidden" name="origen" value="<?php echo $origen;?>">


</x-layout_Vista_Oferta>
