@props([
    'usuario' => 'aaa',
    'passw' => ''
])

<x-layout_login titulo="Inicio Socio">

    <form method="POST" >
        @csrf

        <div class="container">
            <h1>{{$usuario}}</h1>
            <h1>{{$passw}}</h1>

            <!-- onclick="location.href='/Login_Socio';" -->
            <button class="volver"  onclick="action='/';">
                Volver
            </button>
        </div>

    </form>

</x-layout_login>
