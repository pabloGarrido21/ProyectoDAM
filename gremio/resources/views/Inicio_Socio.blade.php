@props([
    'email' => session('email'),
    'nombre' => session('nombre'),
    'apellido' => session('apellido'),
    'telefono' => session('telefono'),
    'direccion' => session('direccion'),
    'ciudad' => session('ciudad'),
    'cod_pos' => session('cod_pos')
])


<x-layout_login titulo="Inicio Socio">

    <form method="POST" >
        @csrf

        <div class="container">
            <h1>USUARIO: {{$email}}</h1>
            <h1>NOMBRE: {{$nombre}}      APELLIDOS: {{$apellido}}</h1>
            <h1>TELE: {{$telefono}}</h1>
            <h1>DIRECCIÓN: {{$direccion}}</h1>
            <h1>CIUDAD: {{$ciudad}}     COD_POSTAL: {{$cod_pos}}</h1>


            <!-- onclick="location.href='/Login_Socio';" -->
            <button class="volver"  onclick="action='/';">
                Volver
            </button>
        </div>

    </form>

</x-layout_login>
