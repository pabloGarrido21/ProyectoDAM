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
