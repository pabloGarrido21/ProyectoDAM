@props([
    'titulo'=>'Sin Título',
    'titulo2'=>'Sin Título',
    'tipo'=>session('tipo'),
    'accion' =>'',
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

        <div class="container">
            <h1>
                MIS DATOS
                <input type="image" src="https://illustoon.com/photo/3127.png"
                       alt="Submit" width="48" height="48" onclick="action='/Envia_Modifica';">
            </h1>


            {{ $slot }}
            <br>

            <div class="fila">
                <div>
                    <button class="btn volver"  onclick="action='/';">
                        Cerrar Sesion
                    </button>
                </div>
                <div class="divi">
                    <button class="btn derecha"  onclick="action='/';">
                        Ofertas
                    </button>
                </div>
            </div>

        </div>

        <br>

        <div class="container2">

            <h1>
                {{$titulo2}}
                <input type="image" src="https://illustoon.com/photo/3127.png"
                       alt="Submit" width="48" height="48" onclick="action='{{ $accion }}{{ $tipo }}';">
            </h1>

            <table>
                <thead>
                    <tr>
                        <th>Email</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                    </tr>
                </thead>

                @foreach ($datos as $fila)
                    <tr>
                        <td>{{ $fila->email }}</td>
                        <td>{{ $fila->nombre }}</td>
                        <td>{{ $fila->apellido }}</td>
                    </tr>
                @endforeach
            </table>

        </div>

    </form>

</body>
</html>
