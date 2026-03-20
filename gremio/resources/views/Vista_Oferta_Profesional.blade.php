@props([

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


<x-layout_Vista_Oferta titulo="Oferta Profesional">


    <div class="fila">
        <div>
            <button class="btn volver"  onclick="action='/Envia_Oferta';">
                Volver
            </button>
        </div>

        <div class="divi">
            <button class="btn derecha"  onclick="action='/Envia_M_Oferta';">
                Modificar Oferta
            </button>
        </div>
    </div>


</x-layout_Vista_Oferta>
