<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Aplicación</title>
    <!-- Aquí puedes incluir otros recursos como Bootstrap, etc. -->
</head>

<body>
    <div class="container">
        <!-- Barra de navegación, si la necesitas -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="{{ url('/') }}">Inicio</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('medicos.index') }}">Médicos</a>
                    </li>
                    <!-- Agrega más enlaces si es necesario -->
                </ul>
            </div>
        </nav>

        <!-- El contenido principal de cada vista -->
        @yield('content')
    </div>
</body>

</html>
