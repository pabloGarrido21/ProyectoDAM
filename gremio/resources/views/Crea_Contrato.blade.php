@props([
    'titulo'=>'Crea Contrato',
    'origen'=>'SOCIO',
    'usuario' =>session('usuario'),
    'oferta' => session('oferta'),
    "descripcion",
    "fecha"


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
            margin: 50px;
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #1f4037, #99f2c8);
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

        .input-grande {
            width: 300px;
            height: 40px;
            font-size: 16px;
        }

        .input-grande {
            width: 400px;
            height: 200px ;
            font-size: 16px;
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
    <input type="hidden" name="oferta" value="<?php echo $oferta->id;?>">

    <div class="container">
        <h1>
            OFERTA a CONTRATAR
        </h1>

        <div class="usuario">
            <label>TITULO:</label>
            <text>{{$oferta->titulo}}</text>
        </div>

        <div class="fila">
            <div> <label> SECTOR: </label> <text>{{$oferta->sector}}</text> </div>
            <div>
                <label> PRECIO:</label>
                <text>{{$oferta->precio}}€</text>
            </div>
        </div>

        <br>
        <br>

        <div class="usuario">
            <label>DATOS A RELLENAR:</label>
        </div>

        <div class="fila">
            <div>
                <label> DESCRIPCIÓN: </label><br>
                <textarea name="descripcion" class="input-grande"></textarea>
            </div>
            <div>
                <label> FECHA iNICIO: </label>
                <input  type="date" name="fecha"
                        value="{{ \Carbon\Carbon::today()}}" required>
            </div>
        </div>

        <br>

        <div class="fila">
            <div>
                <button class="btn volver"  onclick="action='/Envia_Oferta';">
                    Volver
                </button>
            </div>

            <div class="divi">
                <button class="btn derecha"  onclick="action='/Crea_Contrato';">
                    Confirmar
                </button>
            </div>
        </div>


    </div>

</form>

</body>
</html>
