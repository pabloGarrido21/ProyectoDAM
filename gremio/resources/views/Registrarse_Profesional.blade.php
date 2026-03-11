@props([
    'sectores' => session('sectores'),
    'sector' => ''
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


<x-layout_Modifica_Datos tituloA="REGISTRO prof" tituloB="Registro Profesional"
                      origen="PROFESIONAL" envia="/Registro_Profesional">


    <text>SECTOR</text>
    <select name="sector">

        @foreach ($sectores as $sector)
            <option value="{{ $sector->id }}">
                {{ $sector->nombre }}
            </option>
        @endforeach

    </select>
    <br></br>


</x-layout_Modifica_Datos>

