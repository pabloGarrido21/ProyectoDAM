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

        h1 {
            text-align: center;
            font-size: 32px;
            margin-bottom: 40px;
        }

        label {
            font-weight: bold;
            font-size: 24px;
            margin-bottom: 5px;
            display: block;
        }

         text,textarea {
            font-size: 20px;
            display: block;
            margin-top: 5px;
        }

         textarea{
             color: #555;
         }

        textarea.input-grande {
            width: 75%;
            height: 200px;
            padding: 10px;
            border-radius: 8px;
            border: 1px solid #ccc;
            resize: none;
            background: #f8f8f8;
        }

        .fila {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
            margin-bottom: 20px;
        }

        .usuario {
            margin-bottom: 25px;
            gap: 10px;
        }

        .boton {

            padding: 12px 20px;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            font-weight: bold;
            font-size: 16px;
            transition: 0.3s;
        }

        .volver { background-color: #6c757d; color: white; }
        .izquierda { background-color: #007BFF; color: white; }
        .derecha { background-color: #28A745; color: white; }

        .boton:hover { opacity: 0.85; }

        .fila-botones {
            display: flex;
            justify-content: space-between;
            margin-top: 30px;
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
                    <br><br>
                    <label> FECHA INICIO: </label>
                    <text>{{$datos->fecha_inicio}}</text>

                    @if($tipo == "TERMINADO")
                        <br><br>
                        <label> FECHA FIN: </label>
                        <text>{{$datos->fecha_fin}}</text>

                    @endif

                </div>
            </div>

        </div>

    </form>

</body>
</html>
