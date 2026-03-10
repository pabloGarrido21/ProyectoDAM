@props([
    'profesional' => session('profesional'),
    'ciudad' => session('ciudad'),
    'sector' => session('sector')
])

<style>
    body {
        margin: 100px;
        font-family: Arial, sans-serif;
        background: linear-gradient(to right, #1f3740 , #9bd3ff);
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        color: white;
    }
</style>


<x-layout_Inicio titulo="Inicio Profesional">

            <text>USUARIO: {{$profesional->email}}</text>

            <br>

            <text>NOMBRE: {{$profesional->nombre}} </text>
            <text> APELLIDOS: {{$profesional->apellido}}</text>

            <br>

            <text>TELE: {{$profesional->telefono}}</text>
            <text>DIRECCIÓN: {{$profesional->direccion}}</text>

            <br>

            <text>CIUDAD: {{$ciudad->nombre}} </text>
            <text>COD_POSTAL: {{$ciudad->codigo_postal}}</text>

            <br>

            <text>PROFESION: {{$sector->nombre}}</text>


</x-layout_Inicio>
