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

    .fila{
        display: grid;
        grid-template-columns: 1fr 1fr;
        margin-bottom: 15px;
    }

</style>


<x-layout_Ofertas titulo="Ofertas Socio" titulo2="Ofertas Disponibles" origen="SOCIO">

    <input type="hidden" name="tipo" value="<?php echo $tipo;?>">
    <input type="hidden" name="id" value="<?php echo $id;?>">

    <div class="fila">
        <div>
            <button class="btn volver"  onclick="action='/Devuelve_Oferta';">
                Volver
            </button>

            <input type="image" src="https://w7.pngwing.com/pngs/12/646/png-transparent-transfer-flexible-miscellaneous-angle-trademark.png"
                   alt="Submit" width="48" height="48" onclick="action='/Oferta_Socio/BASE';"
                   title="Resetea Filtros">

        </div>
        <div>
            <input type="image" src="https://e7.pngegg.com/pngimages/634/28/png-clipart-computer-icons-alphabetical-order-sorting-symbol-alphabetical-order-angle-text.png"
                   alt="Submit" width="48" height="48" onclick="action='/Oferta_Socio/ALFA';"
                   title="Ordenado Alfabético">


            <input type="image" src="https://e7.pngegg.com/pngimages/738/342/png-clipart-computer-icons-cost-price-others-miscellaneous-text.png"
                   alt="Submit" width="48" height="48" onclick="action='/Oferta_Socio/PRECIO';"
                   title="Ordenado Precio">


            <select name="ciudad">

                @foreach ($ciudades as $ciudad)
                    <option value="{{ $ciudad->id }}">
                        {{ $ciudad->nombre }}
                    </option>
                @endforeach

            </select>

            <input type="image" src="https://png.pngtree.com/png-vector/20240710/ourlarge/pngtree-city-icon-style-in-black-and-white-vector-png-image_7046804.png"
                   alt="Submit" width="48" height="48" onclick="action='/Oferta_Socio/CIUDAD';"
                   title="Filtra Ciudades">


            <select name="sector">

                @foreach ($sectores as $sector)
                    <option value="{{ $sector->id }}">
                        {{ $sector->nombre }}
                    </option>
                @endforeach

            </select>
            <input type="image" src="https://w7.pngwing.com/pngs/151/284/png-transparent-computer-icons-job-profession-author-others-photography-author-black.png"
                   alt="Submit" width="48" height="48" onclick="action='/Oferta_Socio/SECTOR';"
                   title="Filtra Sector">

        </div>


    </div>





</x-layout_Ofertas>
