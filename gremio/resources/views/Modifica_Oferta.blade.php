@props([
    'titulo'=>'Modifica Oferta',
    'origen'=>'PROFESIONAL',
    'usuario' =>session('usuario'),
    'datos' =>session('datos'),
    'oferta' => session('oferta'),
    "titulo_orgin",
    "titulo",
    "precio",
    'duracion'


])


@if(session('error'))
    <script>
        alert("{{ session('error') }}");
    </script>
@endif

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>{{ $titulo }}</title>
    <style>

        body {
            margin: 70px;
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #1f3740 , #9bd3ff);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: white;
        }

        .container {
            background: rgba(0, 0, 0, 0.6);
            padding: 30px;
            border-radius: 15px;
            width: 1200px;
        }

        input {
            width: 70%;
            padding: 12px;
            margin-top: 5px;
            border-radius: 8px;
            border: none;
            outline: none;
            font-size: 14px;
        }

        h1 {
            margin-bottom: 30px;
            font-size: 30px;
            text-align: center;
        }

        text{
            font-size: 25px;

        }


        label{
            font-weight: bold;
            font-size: 25px;
        }

        .usuario{
            margin-bottom: 30px;
        }

        .fila{
            display: grid;
            grid-template-columns: 1fr 1fr;
            margin-bottom: 15px;
        }

        .btn {
            display:inline-block;
            gap: 10px;
            width: 25%;
            padding: 15px;
            margin: 10px 0;
            font-size: 16px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s;

        }

        .divi{
            text-align: right;
        }

        .izquierda {
            background-color: #007BFF;
            color: white;
            text-align: left;

        }

        .derecha {
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


    <input type="hidden" name="usuario" value="<?php echo $usuario;?>">
    <input type="hidden" name="origen" value="<?php echo $origen;?>">
    <input type="hidden" name="original" value="<?php echo $usuario;?>">
    <input type="hidden" name="titulo_orgin" value="<?php echo $datos->titulo;?>">
    <input type="hidden" name="oferta" value="<?php echo $datos->id;?>">

    <div class="container">
        <h1>
            OFERTA A MODIFICAR
        </h1>

        <div class="usuario">
            <label>TITULO:</label>
            <input  type="text" name="titulo"  value="<?php echo $datos->titulo;?>">
        </div>

        <div class="fila">
            <div> <label> SECTOR: </label> <text>{{$datos->sector}}</text> </div>
            <div>
                <label> PRECIO:</label>
                <input  type="text" name="precio"  value="<?php echo $datos->precio;?>"> €
                <br>
                <label> DURACION:</label>
                <input  type="text" name="duracion"  value="<?php echo $datos->duracion;?>">
                <label>Días</label>
            </div>
        </div>

        <br>
        <br>

        <div class="usuario">
            <label>PROFESIONAL:</label> <text>{{$datos->prof_email}}</text>
        </div>

        <div class="fila">
            <div>  <label> NOMBRE: </label> <text>{{$datos->prof_nombre}}</text> </div>
            <div> <label> APELLIDO: </label> <text>{{$datos->prof_apellido}}</text> </div>
        </div>

        <div class="fila">
            <div> <label> TELE: </label> <text>{{$datos->prof_telefono}}</text> </div>
            <div> <label> CIUDAD: </label> <text>{{$datos->ciudad}}</text> </div>
        </div>

        <br>

        <div class="fila">
            <div>
                <button class="btn volver"  onclick="action='/Envia_Oferta';">
                    Volver
                </button>
            </div>

            <div class="divi">
                <button class="btn derecha"  onclick="action='/Modifica_Oferta';">
                    Confirmar
                </button>
            </div>
        </div>


    </div>

</form>

</body>
</html>
