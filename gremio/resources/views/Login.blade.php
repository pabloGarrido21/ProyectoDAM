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

<x-layout_login titulo="Portal de acceso">

    <div class="container">
        <h1>Bienvenido al Portal</h1>

        <!-- Imagen de profesionales -->
        <img src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d" alt="Profesionales trabajando">

        <!-- Botones -->
        <button class="btn profesionales" onclick="location.href='/Login_Profesional';">
            Acceso Profesionales
        </button>

        <button class="btn socios" onclick="location.href='/Login_Socio';">
            Acceso Socios
        </button>
    </div>

</x-layout_login>
