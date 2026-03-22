@props([
    'profesional' => session('profesional'),
    'origen' => 'PROFESIONAL'

])

<style>
    body {
        margin: 70px;
        font-family: Arial, sans-serif;
        background: linear-gradient(to right, #1f3740 , #9bd3ff);
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        color: white;
    }


</style>


<x-layout_Inicio titulo="Inicio Profesional" accion="/Ini_Profesional/"
                 original="{{$profesional->email}}" origen="{{$origen}}">

    <div class="usuario">
        <label>USUARIO:</label> <text>{{$profesional->email}}</text>
    </div>

    <div class="fila">
        <div> <label> NOMBRE: </label> <text>{{$profesional->nombre}}</text> </div>
        <div> <label> APELLIDOS: </label> <text>{{$profesional->apellido}}</text> </div>
    </div>

    <div class="fila">
        <div>  <label> TELE: </label> <text>{{$profesional->telefono}}</text> </div>
        <div> <label> DIRECCIÓN: </label> <text>{{$profesional->direccion}}</text> </div>
    </div>

    <div class="fila">
        <div> <label> CIUDAD: </label> <text>{{$profesional->ciudad}}</text> </div>
        <div> <label> COD POSTAL: </label> <text>{{$profesional->cod_pos}}</text> </div>
    </div>

    <div class="fila">
        <div> <label> SECTOR: </label> <text>{{$profesional->sector}}</text> </div>
    </div>


    <input type="hidden" name="origen" value="<?php echo $origen;?>">
    <input type="hidden" name="original" value="<?php echo $profesional->email;?>">


</x-layout_Inicio>
