@props([
    'profesional' => session('profesional'),
    'ciudad' => session('ciudad'),
    'sector' => session('sector')
])

<style>
    body {
        margin: 0;
        font-family: Arial, sans-serif;
        background: linear-gradient(to right, #1f3740 , #9bd3ff);
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        text-align: center;
        color: white;
    }
</style>


<x-layout_Inicio titulo="Inicio Profesional">

    <form method="POST" >
        @csrf

        <div class="container">
            <h1>USUARIO: {{$profesional->email}}</h1>
            <h1>NOMBRE: {{$profesional->nombre}}  APELLIDOS: {{$profesional->apellido}}</h1>
            <h1>TELE: {{$profesional->telefono}}</h1>
            <h1>DIRECCIÓN: {{$profesional->direccion}}</h1>
            <h1>CIUDAD: {{$ciudad->nombre}}     COD_POSTAL: {{$ciudad->codigo_postal}}</h1>
            <h1>PROFESION: {{$sector->nombre}}</h1>


            <!-- onclick="location.href='/Login_Socio';" -->
            <button class="volver"  onclick="action='/';">
                Volver
            </button>
        </div>

    </form>

</x-layout_Inicio>
