<header class="">
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
        <div class="container">
            <!-- LOGO -->
            <a class="navbar-brand" href="index.php">
                <!-- UTN -->
                <img src="./views/static/img/logo-utn-navbar.png" class="text-light" alt="Logo UTN" style="max-width: 80px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- ITEMS A LA IZQUIERDA DE LA BARRA DE NAVEGACION -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= "$URL/consulta"; ?>">Consultas</a>
                    </li>
                </ul>
                <!-- FORMULARIO DE BUSQUEDA -->
                <!-- <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form> -->
                <!-- ITEMS A LA DERECHA DE LA BARRA DE NAVEGACION -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href=<?= "$URL/login"; ?>>Iniciar sesión</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href=<?= "$URL/register"; ?>>Registrarse</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- FIN NAVBAR -->

</header>