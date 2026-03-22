@props([
    'titulo'=>'Sin Título',
    'titulo2'=>'Sin Título',
    'origen'=>session('origen'),
    'usuario' =>session('usuario'),
    'datos' =>session('datos'),
    'tipo' => session('tipo'),
    "contrato"

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

        .divi_centro{
            text-align: center;
        }

        .divi_derecha{
            text-align: right;
        }

        .izquierda {
            background-color: #007BFF;
            color: white;

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
        <input type="hidden" name="contrato" value="<?php echo $datos->id;?>">

        <div class="container">
            <h1>
                CONTRATO SELECCIONADO
            </h1>

            {{$slot}}

            <div class="usuario">
                <label>SOCIO:</label> <text>{{$datos->socio_email}}</text>
            </div>

            <div class="fila">
                <div> <label> NOMBRE: </label> <text>{{$datos->socio_nombre}}</text> </div>
                <div> <label> APELLIDO: </label> <text>{{$datos->socio_apellido}}</text> </div>
            </div>

            <br>
            <br>

            <div class="usuario">
                <label>PROFESIONAL:</label> <text>{{$datos->prof_email}}</text>
            </div>

            <div class="fila">
                <div> <label> NOMBRE: </label> <text>{{$datos->prof_nombre}}</text> </div>
                <div> <label> APELLIDO: </label> <text>{{$datos->prof_apellido}}</text> </div>
            </div>

            <br>
            <br>

            <div class="usuario">
                <label>OFERTA:</label> <text>{{$datos->oferta}}</text>
            </div>

            <div class="fila">
                <div>
                    <label> DESCRIPCIÓN: </label><br>
                    <textarea name="descripcion" readonly
                              class="input-grande">{{$datos->comentario}}</textarea>
                </div>
                <div>
                    <label> DURACION: </label>
                    <text>{{$datos->duracion}}</text>
                    <br>
                    <label> FECHA INICIO: </label>
                    <text>{{$datos->fecha_inicio}}</text>

                    @if($tipo == "TERMINADO")
                        <br>
                        <label> FECHA FIN: </label>
                        <text>{{$datos->fecha_fin}}</text>

                    @endif

                </div>
            </div>

        </div>

    </form>

</body>
</html>
