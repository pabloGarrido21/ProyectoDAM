@props([
    'tituloA'=>'Sin Título',
    'tituloB'=>'Sin Título',
    'original'=>session('original'),
    'usuario' => '',
    'passw' => '',
    'ciudades' => session('ciudades'),
    'passw2' => '',
    'nombre' => '',
    'apellido' => '',
    'telefono' => '',
    'direccion' => '',
    'ciu' => '',
    'origen' => '',
    'envia' => ''
])



    <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>{{ $tituloA }}</title>
    <style>
        * {
            box-sizing: border-box;
        }


        .container {
            background: rgba(0, 0, 0, 0.6);
            padding: 30px;
            border-radius: 15px;
            width: 1200px;
        }

        h1 {
            text-align: center;
            margin-bottom: 25px;
            font-weight: 600;
        }

        label {
            display: block;
            margin-top: 15px;
            font-size: 20px;
            opacity: 0.9;
        }

        input, select {
            width: 70%;
            padding: 12px;
            margin-top: 5px;
            border-radius: 8px;
            border: none;
            outline: none;
            font-size: 14px;
        }

        input {
            background: rgba(255,255,255,0.9);
        }

        select {
            background: white;
        }

        input:focus, select:focus {
            box-shadow: 0 0 0 2px #4facfe;
        }

        .btn {
            width: 25%;
            padding: 14px;
            margin-top: 20px;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .socios {
            background: linear-gradient(135deg, #28a745, #5cd65c);
            color: white;
        }

        .socios:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
        }

        .volver {
            background: transparent;
            border: 1px solid white;
            color: white;
        }

        .volver:hover {
            background: white;
            color: #333;
        }


        .fila{
            display: grid;
            grid-template-columns: 1fr 1fr;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>


<form method="POST" >
    @csrf

    <div class="container">
        <h1>{{ $tituloB }}</h1>

        <div class="fila">
            <div>
                <label> USUARIO: </label> <br>
                <input  type="email" name="usuario"  value="<?php echo $original->email;?>">
            </div>
            <div>

            </div>
        </div>

        <div class="fila">
            <div>
                <label> CONTRASEÑA: </label> <br>
                <input  type="password" name="passw"  value="<?php echo $original->password;?>">
            </div>
            <div>
                <label> REPITE CONTRASEÑA </label> <br>
                <input  type="password" name="passw2"  value="<?php echo $original->password;?>">
            </div>
        </div>

        <div class="fila">
            <div>
                <label> NOMBRE: </label> <br>
                <input  type="text" name="nombre"  value="<?php echo $original->nombre;?>">
            </div>
            <div>
                <label> APELLIDOS: </label> <br>
                <input  type="text" name="apellido"  value="<?php echo $original->apellido;?>">
            </div>
        </div>

        <div class="fila">
            <div>
                <label> TELEFONO: </label> <br>
                <input  type="number" name="telefono"  value="<?php echo $original->telefono;?>">
            </div>
            <div>
                <label> DIRECCION: </label> <br>
                <input  type="text" name="direccion"  value="<?php echo $original->direccion;?>">
            </div>
        </div>

        <div class="fila">
            <div>
                <label> CIUDAD: </label> <br>
                <select name="ciu">
                    <option value="{{ $original->id_ciudad }}">
                        {{ $original->ciudad }}
                    </option>

                    @foreach ($ciudades as $ciu)
                        <option value="{{ $ciu->id }}">
                            {{ $ciu->nombre }}
                        </option>
                    @endforeach

                </select>
            </div>
            <div>
                {{$slot}}
            </div>
        </div>

        <input type="hidden" name="origen" value="<?php echo $origen;?>">
        <input  type="hidden" name="original"  value="<?php echo $original->email;?>">


        <!-- Botones -->

        <!-- onclick="location.href='/Login_Socio';"-->
        <button class="btn socios" onclick="action={{ $envia }};">
            Confirmar Cambios
        </button>


        <!-- onclick="location.href='/Login_Socio';" -->
        <button class="btn volver"  onclick="action='/Devuelve_Modifica';">
            Volver
        </button>
    </div>



</form>

</body>
</html>
