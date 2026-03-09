@props([
    'usuario' => session('usuario'),
    'passw' => session('passw'),
    'ciudades' => session('ciudades'),
    'passw2' => '',
    'nombre' => '',
    'apellido' => '',
    'telefono' => '',
    'direccion' => '',
    'ciudad' => '',
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

<x-layout_Registrarse titulo="REGISTRO Socio">


    <form method="POST" >
        @csrf

        <div class="container">
            <h1>Registro Socios</h1>

            <text>USUARIO</text>
            <input  type="email" name="usuario"  value="<?php echo $usuario;?>">
            <br></br>
            <text>CONTRASEÑA</text>
            <input  type="password" name="passw"  value="<?php echo $passw;?>">
            <br></br>
            <text>REPITE CONTRASEÑA</text>
            <input  type="password" name="passw2"  value="<?php echo $passw2;?>">
            <br></br>
            <text>NOMBRE</text>
            <input  type="text" name="nombre"  value="<?php echo $nombre;?>">
            <br></br>
            <text>APELLIDOS</text>
            <input  type="text" name="apellido"  value="<?php echo $apellido;?>">
            <br></br>
            <text>TELEFONO</text>
            <input  type="number" name="telefono"  value="<?php echo $telefono;?>">
            <br></br>
            <text>DIRECCION</text>
            <input  type="text" name="direccion"  value="<?php echo $direccion;?>">
            <br></br>
            <text>CIUDAD</text>
            <select name="ciudad">

                @foreach ($ciudades as $ciudad)
                    <option value="{{ $ciudad->id }}">
                        {{ $ciudad->nombre }}
                    </option>
                @endforeach

            </select>
            <br></br>
            <input type="hidden" name="origen" value="<?php echo $origen;?>">

            <!-- Botones -->

            <!-- onclick="location.href='/Login_Socio';"-->
            <button class="btn socios" onclick="action='/Registro_Socio';">
                Registrarse
            </button>


            <!-- onclick="location.href='/Login_Socio';" -->
            <button class="volver"  onclick="action='/Devuelve_Registro';">
                Volver
            </button>
        </div>



    </form>

</x-layout_Registrarse>
