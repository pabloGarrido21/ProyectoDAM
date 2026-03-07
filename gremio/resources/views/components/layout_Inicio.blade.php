@props([
    'titulo'=>'Sin Título'
])

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>{{ $titulo }}</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #1f4037, #99f2c8);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
            color: white;
        }

        .container {
            background: rgba(0, 0, 0, 0.6);
            padding: 40px;
            border-radius: 15px;
            width: 400px;
        }

        img {
            width: 100%;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        h1 {
            margin-bottom: 30px;
        }

        .btn {
            display: block;
            width: 100%;
            padding: 15px;
            margin: 10px 0;
            font-size: 16px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s;
        }

        .volver {
            display: block;
            width: 25%;
            justify-self: center;
            padding: 15px;
            margin: 10px 0;
            font-size: 16px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s;
        }

        .profesionales {
            background-color: #007BFF;
            color: white;
        }

        .socios {
            background-color: #28A745;
            color: white;
        }

        .btn:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>

    {{ $slot }}

</body>
</html>
