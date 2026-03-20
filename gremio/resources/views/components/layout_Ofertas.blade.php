@props([
    'titulo'=>'Sin Título',
    'titulo2'=>'Sin Título',
    'datos' =>session('datos'),
    'usuario' => session('usuario'),
    'origen' =>''

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

            <input type="hidden" name="usuario" value="<?php echo $usuario;?>">
            <input type="hidden" name="origen" value="<?php echo $origen;?>">

            <br>

            <table>
                <thead>
                <tr>
                    <th>Titulo</th>
                    <th>Sector</th>
                    <th>Ciudad</th>
                    <th>Precio(€)</th>
                </tr>
                </thead>

                <tbody>
                @foreach ($datos as $fila)
                    <tr onclick="window.location=
                    '{{ route('oferta.show', ['datos'=> 'A','id' => $fila->id,
                            'origen' => $origen, 'usuario' => $usuario]) }}'"
                        style="cursor:pointer;">

                        <td>{{ $fila->titulo }}</td>
                        <td>{{ $fila->sector }}</td>
                        <td>{{ $fila->ciudad }}</td>
                        <td>{{ $fila->precio }}</td>

                    </tr>
                @endforeach

                </tbody>
            </table>



        </div>

    </form>

</body>
</html>
