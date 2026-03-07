@props([
    'usuario' => session('usuario'),
    'passw' => session('passw'),
    'origenes' => session('origenes')
])

@if(session('error'))
    <script>
        alert("{{ session('error') }}");
    </script>
@endif


<x-layout_login titulo="LOGIN Socio">


    <form method="POST" >
        @csrf

        <div class="container">
            <h1>Registro Socios</h1>

            <text>USUARIO</text>
            <input  type="text" name="usuario"  value="<?php echo $usuario;?>">
            <br></br>CONTRASEÑA
            <input  type="text" name="passw"  value="<?php echo $passw;?>">
            <br></br>

            <!-- Botones -->

            <!-- onclick="location.href='/Login_Socio';"-->
            <button class="btn socios" onclick="action='/Ini_Socio';">
                Registrarse
            </button>


            <!-- onclick="location.href='/Login_Socio';" -->
            <button class="volver"  onclick="action='/Login_Socio';">
                Volver
            </button>
        </div>



    </form>

</x-layout_login>
