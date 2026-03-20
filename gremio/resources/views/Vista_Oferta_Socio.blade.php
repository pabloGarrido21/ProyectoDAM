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


<x-layout_Vista_Oferta titulo="Oferta Socio">

    <div class="fila">
        <div>
            <button class="btn volver"  onclick="action='/Envia_Oferta';">
                Volver
            </button>
        </div>

        <div class="divi">
            <button class="btn derecha"  onclick="action='/Envia_Contrato';">
                Aceptar Oferta
            </button>
        </div>
    </div>



</x-layout_Vista_Oferta>
