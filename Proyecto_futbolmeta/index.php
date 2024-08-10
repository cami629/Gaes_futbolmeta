<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido a FutbolMeta</title>
    <link href="publico/css/bootstrap.min.css" rel="stylesheet">
    <script src="publico/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <!-- Menú de navegación fijo -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">FutbolMeta</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="vistas/login.php">Iniciar Sesión</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="vistas/register.php">Registrarse</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenido principal -->
    <div class="container mt-5 pt-5">
        <header class="text-center my-4">
            <h1>Bienvenido a FutbolMeta</h1>
            <p>Tu sistema de información para la organización de campeonatos de fútbol</p>
        </header>

        <main>
            <section class="mb-5">
                <h2>Organiza tus campeonatos de fútbol fácilmente</h2>
                <p>Con FutbolMeta, puedes gestionar equipos, partidos, resultados y más.</p>
            </section>

            <section class="mb-5">
                <h2>Características del Sistema</h2>
                <ul class="list-group">
                    <li class="list-group-item">Gestión de equipos y jugadores</li>
                    <li class="list-group-item">Planificación de partidos</li>
                    <li class="list-group-item">Seguimiento de resultados</li>
                    <li class="list-group-item">Y mucho más...</li>
                </ul>
            </section>

            <section class="mb-5">
                <h2>Imágenes</h2>
                <div class="row">
                    <div class="col-md-6">
                        <img src="imagenes/equipo.jpg?version=1" class="img-fluid" alt="Equipo de fútbol">
                    </div>
                    <div class="col-md-6">
                        <img src="imagenes/partido.jpg" class="img-fluid" alt="Partido de fútbol">
                    </div>
                </div>
            </section>
        </main>
    </div>

    <!-- Pie de página -->
    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; 202X FutbolMeta. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
