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

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        .fila {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            margin-bottom: 20px;
        }

        label, text {
            font-weight: 600;
            font-size: 24px;
        }

        input[type="text"] {
            width: 70%;
            padding: 12px;
            margin-top: 5px;
            border-radius: 8px;
            border: none;
            outline: none;
            font-size: 14px;
        }

        input[type="number"] {
            width: 70%;
            padding: 12px;
            margin-top: 5px;
            border-radius: 8px;
            border: none;
            outline: none;
            font-size: 14px;
        }

        input:focus, select:focus {
            border-color: #007BFF;
            outline: none;
        }

         select {
            width: 25%;
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #ccc;
            margin-top: 5px;
            transition: 0.2s;
        }


        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            overflow: hidden;
            border-radius: 10px;
        }

        th {
            background: #1f3740;
            color: white;
            padding: 12px;
        }

        td {
            padding: 12px;
            border-bottom: 1px solid #eee;
            text-align: center;
        }

        tr {
            transition: 0.2s;
        }

        tr:hover {
            background: #f5faff;
            cursor: pointer;
            transform: scale(1.01);
        }

        .btn {
            width: 400px;
            padding: 14px;
            margin-top: 20px;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .derecha {
            background: #28a745;
            color: white;
        }

        .izquierda {
            background: #007BFF;
            color: white;
        }

        .volver {
            background: #6c757d;
            color: white;
        }

        .btn:hover {
            transform: translateY(-2px);
            opacity: 0.9;
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
