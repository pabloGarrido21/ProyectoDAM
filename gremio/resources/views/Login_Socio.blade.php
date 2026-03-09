@props([
    'usuario' => '',
    'passw' => '',
    'origen' => 'SOCIO'
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
        background: linear-gradient(to right, #1f4037, #99f2c8);
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        text-align: center;
        color: white;
    }
</style>

<x-layout_login titulo="LOGIN Socio">


    <form method="POST" >
        @csrf

        <div class="container">
            <h1>LOGIN Socios</h1>

            <text>USUARIO</text>
            <input  type="text" name="usuario"  value="<?php echo $usuario;?>">
            <br></br>CONTRASEÑA
            <input  type="password" name="passw"  value="<?php echo $passw;?>">
            <br></br>
            <input type="hidden" name="origen" value="<?php echo $origen;?>">

            <!-- Botones -->

            <!-- onclick="location.href='/Login_Profesional';" -->
            <button class="btn profesionales" onclick="action='/Login_Socio';">
                Iniciar Sesion
            </button>

            <!-- onclick="location.href='/Login_Socio';"-->
            <button class="btn socios" onclick="action='/Envia_Registro';">
                Registrarse
            </button>


            <!-- onclick="location.href='/Login_Socio';" -->
            <button class="volver"  onclick="action='/';">
                Volver
            </button>
        </div>



    </form>

</x-layout_login>
