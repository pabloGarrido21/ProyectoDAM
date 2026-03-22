@props([
'tipo' => session('tipo')
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

    .filas{
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        margin-bottom: 15px;
    }

    .boton {
        display:inline-block;
        gap: 10px;
        width: 75%;
        padding: 15px;
        margin: 10px 0;
        font-size: 16px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: 0.3s;

    }


</style>


<x-layout_Vista_Contrato titulo="Contrato">


    <div class="filas">
        <div>
            <button class="boton volver"  onclick="action='/Devuelve_Modifica';">
                Volver
            </button>
        </div>

        @if($tipo == 'ACTIVO')
            <div class="divi_centro">
                <button class="boton izquierda"  onclick="action='/Contrato_Termina';">
                    Terminar Contrato
                </button>
            </div>

        @elseif($tipo == 'PENDIENTE')
            <div class="divi_centro">
                <button class="boton derecha"  onclick="action='/Contrato_Acepta';">
                    ACEPTAR Contrato
                </button>
            </div>

            <div class="divi_derecha">
                <button class="boton izquierda"  onclick="action='/Contrato_Rechaza';">
                    RECHAZAR Contrato
                </button>
            </div>

        @endif


    </div>


</x-layout_Vista_Contrato>
