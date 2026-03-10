@props([
    'tituloA'=>'Sin Título',
    'tituloB'=>'Sin Título',
    'usuario' => session('usuario'),
    'passw' => session('passw'),
    'ciudades' => session('ciudades'),
    'passw2' => '',
    'nombre' => '',
    'apellido' => '',
    'telefono' => '',
    'direccion' => '',
    'ciudad' => '',
    'origen' => '',
    'envia' => ''
])



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>{{ $tituloA }}</title>
    <style>

        .container {
            background: rgba(0, 0, 0, 0.6);
            padding: 40px;
            border-radius: 15px;
            width: 400px;
        }

        img {
            width: 100%;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        h1 {
            margin-bottom: 30px;
        }

        .btn {
            display: block;
            width: 100%;
            padding: 15px;
            margin: 10px 0;
            font-size: 16px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s;
        }

        .volver {
            display: block;
            width: 25%;
            justify-self: center;
            padding: 15px;
            margin: 10px 0;
            font-size: 16px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s;
        }

        .profesionales {
            background-color: #007BFF;
            color: white;
        }

        .socios {
            background-color: #28A745;
            color: white;
        }

        .btn:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>


    <form method="POST" >
        @csrf

        <div class="container">
            <h1>{{ $tituloB }}</h1>

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


            {{ $slot }}


            <input type="hidden" name="origen" value="<?php echo $origen;?>">

            <!-- Botones -->

            <!-- onclick="location.href='/Login_Socio';"-->
            <button class="btn socios" onclick="action={{ $envia }};">
                Registrarse
            </button>


            <!-- onclick="location.href='/Login_Socio';" -->
            <button class="volver"  onclick="action='/Devuelve_Registro';">
                Volver
            </button>
        </div>



    </form>

</body>
</html>
