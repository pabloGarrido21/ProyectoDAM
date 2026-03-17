@props([
    'titulo'=>'Sin Título',
    'titulo2'=>'Sin Título',
    'datos' =>session('datos'),
    'original' => session('original'),
    'tipo' => session('tipo')

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

        <div class="container">

            <h1>
                {{$titulo2}}
            </h1>

            {{$slot}}

            <input type="hidden" name="original" value="<?php echo $original->email;?>">

            <br>

            <div class="usuario">
                <label>USUARIO:</label> <text>{{$datos->email}}</text>
            </div>

            <div class="fila">
                <div> <label> NOMBRE: </label> <text>{{$datos->nombre}}</text> </div>
                <div> <label> APELLIDOS: </label> <text>{{$datos->apellido}}</text> </div>
            </div>

            <div class="fila">
                <div>  <label> TELE: </label> <text>{{$datos->telefono}}</text> </div>
                <div> <label> DIRECCIÓN: </label> <text>{{$datos->direccion}}</text> </div>
            </div>

            <div class="fila">
                <div> <label> CIUDAD: </label> <text>{{$datos->ciudad}}</text> </div>
                <div> <label> COD POSTAL: </label> <text>{{$datos->cod_pos}}</text> </div>
            </div>

            @if($tipo == 'PROFESIONAL')

                <div class="fila">
                    <div> <label> SECTOR: </label> <text>{{$datos->sector}}</text> </div>
                </div>

            @endif



        </div>

    </form>

</body>
</html>
