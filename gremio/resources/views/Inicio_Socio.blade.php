@props([
    'socio' => session('socio'),
    'origen' => 'SOCIO'

])

<style>
    body {
        margin: 50px;
        font-family: Arial, sans-serif;
        background: linear-gradient(to right, #1f4037, #99f2c8);
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        color: white;
    }

</style>


<x-layout_Inicio titulo="Inicio Socio" accion="/Ini_Socio/" original="{{$socio->email}}"
                 origen="{{$origen}}">


    <div class="usuario">
        <label>USUARIO:</label> <text>{{$socio->email}}</text>
    </div>

    <div class="fila">
        <div> <label> NOMBRE: </label> <text>{{$socio->nombre}}</text> </div>
        <div> <label> APELLIDOS: </label> <text>{{$socio->apellido}}</text> </div>
    </div>

    <div class="fila">
        <div>  <label> TELE: </label> <text>{{$socio->telefono}}</text> </div>
        <div> <label> DIRECCIÓN: </label> <text>{{$socio->direccion}}</text> </div>
    </div>

    <div class="fila">
        <div> <label> CIUDAD: </label> <text>{{$socio->ciudad}}</text> </div>
        <div> <label> COD POSTAL: </label> <text>{{$socio->cod_pos}}</text> </div>
    </div>

    <input type="hidden" name="origen" value="<?php echo $origen;?>">
    <input type="hidden" name="original" value="<?php echo $socio->email;?>">



</x-layout_Inicio>
