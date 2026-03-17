@props([
    'profesional' => session('profesional'),
    'ciudad' => session('ciudad'),
    'sector' => session('sector'),
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


<x-layout_Ofertas titulo="Inicio Profesional" titulo2="CONTRATOS ACTIVOS" accion="/Ini_Profesional/">

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
        <div> <label> CIUDAD: </label> <text>{{$ciudad->nombre}}</text> </div>
        <div> <label> COD POSTAL: </label> <text>{{$ciudad->codigo_postal}}</text> </div>
    </div>

    <div class="fila">
        <div> <label> SECTOR: </label> <text>{{$sector->nombre}}</text> </div>
    </div>


    <input type="hidden" name="origen" value="<?php echo $origen;?>">
    <input type="hidden" name="original" value="<?php echo $profesional->email;?>">
    <input type="hidden" name="ciudad" value="<?php echo $ciudad->nombre;?>">
    <input type="hidden" name="sector" value="<?php echo $sector->nombre;?>">


</x-layout_Ofertas>
