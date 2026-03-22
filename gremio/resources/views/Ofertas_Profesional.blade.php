@props([

    'origen' => 'PROFESIONAL',
    'titulo' => '',
    'precio' => '',
    'duracion' => ''

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

        .fila{
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
    }


</style>


<x-layout_Ofertas titulo="Ofertas Profesional" titulo2="Mis Ofertas" origen="PROFESIONAL">

    <div class="fila">
        <div>
            <button class="boton derecha"  onclick="action='/Oferta_Profesional';">
                Crear Oferta
            </button>
        </div>

        <div>
            <text>Titulo:</text>
            <input  type="text" name="titulo"  value="<?php echo $titulo;?>">
        </div>
        <div>
            <text>Precio:</text>
            <input  type="number" name="precio"  value="<?php echo $precio;?>">
            <text>€</text><br>

            <text>Duracion:</text>
            <input  type="number" name="duracion"  value="<?php echo $duracion;?>">
            <text>días</text>
        </div>

    </div>

    <button class="btn volver"  onclick="action='/Devuelve_Oferta';">
        Volver
    </button>

</x-layout_Ofertas>
