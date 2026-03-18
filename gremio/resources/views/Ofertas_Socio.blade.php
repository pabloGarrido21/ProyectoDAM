@props([
'ciudades' => session('ciudades'),
'sectores' => session('sectores'),
'tipo' => session('tipo'),
'id' => session('id')

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


<x-layout_Ofertas titulo="Ofertas Socio" titulo2="Ofertas Disponibles" origen="SOCIO">

    <input type="hidden" name="tipo" value="<?php echo $tipo;?>">
    <input type="hidden" name="id" value="<?php echo $id;?>">

    <div>
        <div>
            <button class="btn volver"  onclick="action='/Devuelve_Oferta';">
                Volver
            </button>

            <input type="image" src="https://illustoon.com/photo/3127.png"
                   alt="Submit" width="48" height="48" onclick="action='/Oferta_Socio/BASE';">

        </div>
        <div>
            <input type="image" src="https://illustoon.com/photo/3127.png"
                   alt="Submit" width="48" height="48" onclick="action='/Oferta_Socio/ALFA';">

            <input type="image" src="https://illustoon.com/photo/3127.png"
                   alt="Submit" width="48" height="48" onclick="action='/Oferta_Socio/PRECIO';">


            <select name="ciudad">

                @foreach ($ciudades as $ciudad)
                    <option value="{{ $ciudad->id }}">
                        {{ $ciudad->nombre }}
                    </option>
                @endforeach

            </select>

            <input type="image" src="https://illustoon.com/photo/3127.png"
                   alt="Submit" width="48" height="48" onclick="action='/Oferta_Socio/CIUDAD';">


            <select name="sector">

                @foreach ($sectores as $sector)
                    <option value="{{ $sector->id }}">
                        {{ $sector->nombre }}
                    </option>
                @endforeach

            </select>
            <input type="image" src="https://illustoon.com/photo/3127.png"
                   alt="Submit" width="48" height="48" onclick="action='/Oferta_Socio/SECTOR';">
        </div>


    </div>





</x-layout_Ofertas>
