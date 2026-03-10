@props([
    'socio' => session('socio'),
    'ciudad' => session('ciudad')
])

<style>
    body {
        margin: 100px;
        font-family: Arial, sans-serif;
        background: linear-gradient(to right, #1f4037, #99f2c8);
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        color: white;
    }
</style>


<x-layout_Inicio titulo="Inicio Socio">

            <text>USUARIO: {{$socio->email}}</text>

            <br>

            <text>NOMBRE: {{$socio->nombre}} </text>
            <text> APELLIDOS: {{$socio->apellido}}</text>

            <br>

            <text>TELE: {{$socio->telefono}} </text>
            <text>DIRECCIÓN: {{$socio->direccion}} </text>

            <br>

            <text>CIUDAD: {{$ciudad->nombre}} </text>
            <text>COD POSTAL: {{$ciudad->codigo_postal}}</text>


</x-layout_Inicio>
