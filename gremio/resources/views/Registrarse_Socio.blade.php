@if(session('error'))
    <script>
        alert("{{ session('error') }}");
    </script>
@endif


<style>
    body {
        margin: 50px;
        font-family: Arial, sans-serif;
        background: linear-gradient(to right, #1f4037, #99f2c8);
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        text-align: center;
        color: white;
    }
</style>

<x-layout_Registrarse tituloA="REGISTRO Socio" tituloB="Registro Socio"
                      origen="SOCIO" envia="/Registro_Socio">


</x-layout_Registrarse>
