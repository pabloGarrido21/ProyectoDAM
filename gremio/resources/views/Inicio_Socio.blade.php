@props([
    'socio' => session('socio'),
    'ciudad' => session('ciudad')
])

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
</style>


<x-layout_Inicio titulo="Inicio Socio">

    <form method="POST" >
        @csrf

        <div class="container">
            <h1>USUARIO: {{$socio->email}}</h1>
            <h1>NOMBRE: {{$socio->nombre}}      APELLIDOS: {{$socio->apellido}}</h1>
            <h1>TELE: {{$socio->telefono}}</h1>
            <h1>DIRECCIÓN: {{$socio->direccion}}</h1>
            <h1>CIUDAD: {{$ciudad->nombre}}     COD_POSTAL: {{$ciudad->codigo_postal}}</h1>


            <!-- onclick="location.href='/Login_Socio';" -->
            <button class="volver"  onclick="action='/';">
                Volver
            </button>
        </div>

    </form>

</x-layout_Inicio>
