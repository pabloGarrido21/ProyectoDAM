@props([
    'titulo'=>'Sin Título'
])

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>{{ $titulo }}</title>
    <style>

        .container {
            background: rgba(0, 0, 0, 0.6);
            padding: 40px;
            border-radius: 15px;
            width: 1200px;
        }

        .container2 {
            background: rgba(0, 0, 0, 0.6);
            padding: 40px;
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
            font-size: 40px;
            text-align: center;
        }

        text{
            font-size: 30px;
            text-align: left;

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

        .volver{
            align-self: center;
        }

        .izquierda {
            background-color: #007BFF;
            color: white;
            align-self: flex-start;

        }

        .derecha {
            background-color: #28A745;
            color: white;
            align-self: flex-end;

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
            <h1>MIS DATOS</h1>

            {{ $slot }}

        </div>

        <br><br>

        <div class="container2">

            <h1>CONTRATOS ACTIVOS</h1>

            <table>
                <tr>
                    <th>Nombre</th>
                    <th>Edad</th>
                    <th>Ciudad</th>
                </tr>

                <tr>
                    <td>Juan</td>
                    <td>25</td>
                    <td>Madrid</td>
                </tr>

                <tr>
                    <td>Ana</td>
                    <td>30</td>
                    <td>Sevilla</td>
                </tr>
            </table>

        </div>

        <br><br>

        <div class="container2">

            <!-- onclick="location.href='/Login_Socio';" -->
            <button class="btn izquierda"  onclick="action='/';">
                Modificar mis Datos
            </button>

            <!-- onclick="location.href='/Login_Socio';" -->
            <button class="btn volver"  onclick="action='/';">
                Volver
            </button>

            <!-- onclick="location.href='/Login_Socio';" -->
            <button class="btn derecha"  onclick="action='/';">
                Buscar Ofertas
            </button>

        </div>

    </form>

</body>
</html>
