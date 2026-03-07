@props([
    'usuario' => '',
    'passw' => ''
])

@if(session('error'))
    <script>
        alert("{{ session('error') }}");
    </script>
@endif


<x-layout_login titulo="LOGIN Profesional">


    <form method="POST" >
        @csrf

        <div class="container">
            <h1>LOGIN Profesionales</h1>

            <text>USUARIO</text>
            <input  type="text" name="usuario"  value="<?php echo $usuario;?>">
            <br></br>CONTRASEÑA
            <input  type="text" name="passw"  value="<?php echo $passw;?>">
            <br></br>

            <!-- Botones -->

            <!-- onclick="location.href='/Login_Profesional';" -->
            <button class="btn profesionales" onclick="action='/Login_Profesional';">
                Iniciar Sesion
            </button>

            <!-- onclick="location.href='/Login_Socio';"-->
            <button class="btn socios">
                Registrarse
            </button>


            <!-- onclick="location.href='/Login_Socio';" -->
            <button class="volver"  onclick="action='/';">
                Volver
            </button>
        </div>



    </form>

</x-layout_login>
