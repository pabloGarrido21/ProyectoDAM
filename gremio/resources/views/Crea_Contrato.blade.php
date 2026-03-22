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
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(to right, #1f4037, #99f2c8);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            color: #fff;
        }

        .container {
            background: rgba(0, 0, 0, 0.7);
            padding: 40px 50px;
            border-radius: 20px;
            width: 1000px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.4);
        }

        .container2 {
            text-align: center;
            margin-bottom: 30px;
        }

        img.logo {
            width: 200px;
            display: block;
            margin: 0 auto 30px auto;
        }

        h1 {
            text-align: center;
            font-size: 32px;
            margin-bottom: 30px;
            letter-spacing: 1px;
        }

        label {
            font-weight: bold;
            font-size: 20px;
            display: block;
            margin-bottom: 5px;
        }

        text {
            font-size: 18px;
            display: block;
            margin-bottom: 10px;
        }

        .usuario {
            margin-bottom: 25px;
        }

        .fila {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
            margin-bottom: 20px;
        }

        .input-grande {
            width: 100%;
            height: 150px;
            font-size: 16px;
            padding: 10px;
            border-radius: 8px;
            border: 1px solid #ccc;
            resize: none;
        }

        input[type="date"] {
            width: 100%;
            height: 40px;
            font-size: 16px;
            padding: 5px;
            border-radius: 8px;
            border: 1px solid #ccc;
        }

        .btn {
            width: 100%;
            padding: 15px;
            font-size: 16px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .volver {
            background-color: #6c757d;
            color: white;
        }

        .derecha {
            background-color: #28a745;
            color: white;
        }

        .btn:hover {
            opacity: 0.85;
            transform: translateY(-2px);
        }

        .divi {
            text-align: right;
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
                <label> FECHA INICIO: </label><br>
                <input  type="date" name="fecha">
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
