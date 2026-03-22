@props([
    'titulo'=>'Sin Título',
    'tipo'=>session('tipo'),
    'accion' =>'',
    'datos' =>session('datos'),
    'original',
    'origen'

])

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>{{ $titulo }}</title>


    <style>

        .container, .container2 {
            background: rgba(0, 0, 0, 0.6);
            padding: 30px;
            border-radius: 15px;
            width: 1200px;
        }

        .container2 {
            text-align: center;
        }

        h1 {
            margin-bottom: 25px;
            font-size: 28px;
            text-align: center;
            letter-spacing: 1px;
        }

        text {
            font-size: 18px;
            opacity: 0.9;
        }

        label {
            font-weight: 600;
            font-size: 24px;
            display: block;
            margin-bottom: 3px;
            color: #ffffff;
        }

        .usuario {
            margin-bottom: 25px;
            padding-bottom: 10px;
            border-bottom: 1px solid rgba(255,255,255,0.2);
        }

        .fila {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 15px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
            overflow: hidden;
            border-radius: 10px;
        }

        th, td {
            padding: 12px;
            text-align: center;
        }

        th {
            background: rgba(255,255,255,0.2);
            font-weight: 600;
        }

        td {
            background: rgba(255,255,255,0.05);
        }

        tr:hover td {
            background: rgba(255,255,255,0.15);
            transition: 0.3s;
        }

        .btn {
            display: inline-block;
            width: 200px;
            padding: 12px;
            margin: 10px 5px;
            font-size: 15px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 600;
        }

        .volver {
            background: #dc3545;
            color: white;
        }

        .derecha {
            background: #28a745;
            color: white;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
            opacity: 0.95;
        }

        .divi {
            text-align: right;
        }


        input[type="image"]:hover {
            opacity: 1;
            transform: scale(1.1);
        }

        @media (max-width: 900px) {
            .container, .container2 {
                width: 90%;
            }

            .fila {
                grid-template-columns: 1fr;
            }

            .btn {
                width: 100%;
            }
        }
    </style>


</head>
<body>

    <form method="POST" >
        @csrf

        <div class="container">
            <h1>
                MIS DATOS
                <input type="image" src="https://png.pngtree.com/png-vector/20211106/ourmid/pngtree-flat-icon-edit-png-image_4023192.png"
                       alt="Submit" width="48" height="48" onclick="action='/Envia_Modifica';"
                       title="Modifica Datos Personales">
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
                    <button class="btn derecha"  onclick="action='/Envia_Oferta';">
                        Ofertas
                    </button>
                </div>
            </div>

        </div>

        <br>

        <div class="container2">

            <h1>
                @if($tipo == "ACTIVO")
                    CONTRATOS ACTIVOS

                @elseif($tipo == "PENDIENTE")
                    CONTRATOS PENDIENTES

                @elseif($tipo == "TERMINADO")
                    CONTRATOS TERMINADOS

                @endif
                <input type="image" src="https://w7.pngwing.com/pngs/12/646/png-transparent-transfer-flexible-miscellaneous-angle-trademark.png"
                       alt="Submit" width="48" height="48" onclick="action='{{ $accion }}{{ $tipo }}';"
                       title="Cambiar Contratos">
            </h1>

            <table>
                <thead>
                    <tr>
                        <th>Socio</th>
                        <th>Profesional</th>
                        <th>Oferta</th>
                        <th>Precio</th>
                        <th>Fecha_ini</th>

                        @if($tipo == "TERMINADO")
                            <th>Fecha_fin</th>
                        @endif

                    </tr>
                </thead>

                <tbody>
                @foreach ($datos as $fila)
                    <tr onclick="window.location=
                    '{{ route('items.show', ['id'=> 'A','contrato' => $fila->id,
                            'tipo' => $tipo, 'original' => $original,
                            'origen' => $origen])}}'"
                        style="cursor:pointer;">

                        <td>{{ $fila->socio }}</td>
                        <td>{{ $fila->profesional }}</td>
                        <td>{{ $fila->oferta }}</td>
                        <td>{{ $fila->precio }}</td>
                        <td>{{ $fila->fecha_inicio }}</td>

                        @if($tipo == "TERMINADO")
                            <td>{{ $fila->fecha_fin }}</td>
                        @endif

                    </tr>
                @endforeach

                </tbody>
            </table>

        </div>

    </form>

</body>
</html>
