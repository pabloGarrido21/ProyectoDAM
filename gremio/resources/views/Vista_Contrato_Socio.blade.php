@props([

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


<x-layout_Vista_Contrato titulo="Contrato">

    <div class="fila">
        <div>
            <button class="boton volver"  onclick="action='/Devuelve_Modifica';">
                Volver
            </button>
        </div>

    </div>



</x-layout_Vista_Contrato>
