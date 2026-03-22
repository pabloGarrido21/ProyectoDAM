@props([
    'usuario' => '',
    'passw' => '',
    'origen' => 'PROFESIONAL'
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


<x-layout_login titulo="LOGIN Profesional">


    <form method="POST" >
        @csrf

        <div class="container">
            <h1>LOGIN Profesionales</h1>

            <label>USUARIO</label>
            <input  type="text" name="usuario"  value="<?php echo $usuario;?>">
            <br></br>
            <label>CONTRASEÑA</label>
            <input  type="password" name="passw"  value="<?php echo $passw;?>">
            <br></br>
            <input type="hidden" name="origen" value="<?php echo $origen;?>">

            <!-- Botones -->

            <!-- onclick="location.href='/Login_Profesional';" -->
            <button class="btn btn-primary" onclick="action='/Login_Profesional';">
                Iniciar Sesion
            </button>

            <!-- onclick="location.href='/Login_Socio';"-->
            <button class="btn btn-success" onclick="action='/Envia_Registro';">
                Registrarse
            </button>


            <!-- onclick="location.href='/Login_Socio';" -->
            <button class="btn btn-secondary"  onclick="action='/';">
                Volver
            </button>
        </div>



    </form>

</x-layout_login>
