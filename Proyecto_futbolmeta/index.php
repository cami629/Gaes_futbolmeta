<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido a FutbolMeta</title>
    <link href="publico/css/bootstrap.min.css" rel="stylesheet">
    <script src="publico/js/bootstrap.bundle.min.js"></script>
    <style>
        .carousel-item img {
            height: 300px; /* Ajusta la altura según tus necesidades */
            object-fit: cover;
        }
    </style>
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
                        <a class="nav-link" href="index.php">Inicio</a>
                    </li>
                    
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

        <!-- Carrusel de imágenes -->
        <div id="carouselExampleIndicators" class="carousel slide mb-5" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="imagenes/equipo.jpg?cami=1" class="d-block w-100" alt="Equipo de fútbol">
                </div>
                <div class="carousel-item">
                    <img src="imagenes/estadio.jpg" class="d-block w-100" alt="Estadio de fútbol">
                </div>
                <div class="carousel-item">
                    <img src="imagenes/partido.jpg?version=1" class="d-block w-100" alt="Partido de fútbol">
                </div>
                <div class="carousel-item">
                    <img src="imagenes/trofeo.jpg" class="d-block w-100" alt="Trofeo de fútbol">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Siguiente</span>
            </button>
        </div>

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
        </main>
    </div>

    <!-- Pie de página -->
    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; 202X FutbolMeta. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
