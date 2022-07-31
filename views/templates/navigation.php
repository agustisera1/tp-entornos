<?php
session_start();
?>
<header class="">
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
        <div class="container">
            <!-- LOGO -->
            <a class="navbar-brand" href=<?= "$URL/"; ?>>
                <!-- UTN -->
                <!-- <img src="./views/static/img/logo-utn-navbar.png" class="text-light" alt="Logo UTN" style="max-width: 80px;"> -->
                <img src=<?= "$URL/views/static/img/logo-utn-navbar.png" ?> class="text-light" alt="Logo UTN" style="max-width: 80px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- ITEMS A LA IZQUIERDA DE LA BARRA DE NAVEGACION -->

                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= "$URL/listado_consultas"; ?>">Listado consultas</a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" href="<?= "$URL/mis_consultas"; ?>">Mis consultas</a>
                    </li>
                    
                    <?php
                    if(isset($_SESSION["rol"]) and $_SESSION["rol"] == "Admin"){
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= "$URL/registrar_profesor"; ?>">Registrar profesor</a>
                    </li>
                    <?php
                    }
                    ?>
                </ul>

                <!-- ITEMS A LA DERECHA DE LA BARRA DE NAVEGACION -->
                <?php
                if (!isset($_SESSION["rol"])) {
                ?>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href=<?= "$URL/login"; ?>>Iniciar sesión</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href=<?= "$URL/register"; ?>>Registrarse</a>
                        </li>
                    </ul>
                <?php
                } else {
                ?>
                    <p style="color: #fff; margin-bottom: 0; border-right: 1px solid #fff; padding: 10px;">Bienvenido <?= $_SESSION["nombre"] ?> <?= $_SESSION["apellido"] ?></p>
                    <a href=<?= "$URL/logout/" ?> style="color: #fff; margin-bottom: 0; padding: 10px;">Cerrar sesión</a>
                    </ul>
                <?php
                }
                ?>
            </div>
        </div>
    </nav>
    <!-- FIN NAVBAR -->

</header>