@props([
    'sectores' => session('sectores'),
    'sec' => '',
    'original'=>session('original')
])


@if(session('error'))
    <script>
        alert("{{ session('error') }}");
    </script>
@endif


<style>
    body {
        margin: 0;
        font-family: Arial, sans-serif;
        background: linear-gradient(to right, #1f3740 , #9bd3ff);
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        text-align: center;
        color: white;
    }
</style>

<x-layout_Modifica_Datos tituloA="MODIFICAR Prof" tituloB="Modificar Profesional"
                      origen="PROFESIONAL" envia="/Modificar_Profesional">


    <text>SECTOR</text>
    <select name="sec">

            <option value="{{ $original->id_sector }}">
                {{ $original->sector }}
            </option>

        @foreach ($sectores as $sec)
            <option value="{{ $sec->id }}">
                {{ $sec->nombre }}
            </option>
        @endforeach

    </select>
    <br></br>


</x-layout_Modifica_Datos>
