@props([
    'titulo'=>'Sin Título',
    'titulo2'=>'Sin Título',
    'origen'=>session('origen'),
    'usuario' =>session('usuario'),
    'datos' =>session('datos')

])

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>{{ $titulo }}</title>
    <style>

        .container {
            background: rgba(0, 0, 0, 0.6);
            padding: 30px;
            border-radius: 15px;
            width: 1200px;
        }

        .container2 {
            background: rgba(0, 0, 0, 0.6);
            padding: 30px;
            border-radius: 15px;
            width: 1200px;
            text-align: center;
        }


        img {
            width: 100%;
            border-radius: 10px;
            margin-bottom: 20px;
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

        table {
            border-collapse: collapse;
            display:inline-block;

        }

        th, td {
            border: 1px solid black;
            padding: 8px;
        }

        th {
            background-color: lightgray;
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

        <div class="container">
            <h1>
                OFERTA SELECCIONADA
            </h1>

            <div class="usuario">
                <label>TITULO:</label> <text>{{$datos->titulo}}</text>
            </div>

            <div class="fila">
                <div> <label> SECTOR: </label> <text>{{$datos->sector}}</text> </div>
                <div> <label> PRECIO: </label> <text>{{$datos->precio}}€</text> </div>
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

            {{$slot}}

        </div>

    </form>

</body>
</html>
