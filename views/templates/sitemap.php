<section class="border-bottom title-section">
    <div class="container">
        <div class="row">
            <div class="col">
                <h2 class="pt-4 pb-3 m-0">
                    MAPA DEL SITIO
                </h2>
            </div>
            <div class="col d-flex justify-content-end pt-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item "><a href=<?= "$URL/"; ?>>Inicio</a></li>
                        <li class="breadcrumb-item active text-dark" aria-current="page">Mapa del Sitio</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>

<div class="container">
    <section>
        <div class="row row-cols-md-4 row-cols-2 mt-3 d-flex justify-content-between">
            <div class="col">
                <h3>CONSULTAS</h3>
                <ul>
                    <li>
                        <a href=<?= "$URL/listado_consultas" ?>>Listado de consultas</a>
                        <ul>
                            <li>
                                <a href=<?= "$URL/nueva_consulta" ?>>Nueva Consulta</a>
                            </li>
                            <li>
                                <a href=<?= "$URL/editar_consulta" ?>>Editar Consulta</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href=<?= "$URL/mis_consultas" ?>>Mis consultas</a>
                        <ul>
                            <li>
                                <a href="">Bloquear Consulta</a>
                            </li>
                        </ul>
                    </li>
                    </li>
                </ul>
            </div>
            <div class="col">
                <h3>USUARIO</h3>
                <ul>
                    <li>
                        <a href=<?= "$URL/register" ?>>Registrarse</a>
                    </li>
                    <li>
                        <a href=<?= "$URL/login" ?>>Iniciar sesion</a>
                    </li>
                    <!-- <li>
                        <a href="#">Perfil de usuario</a>
                    </li> -->
                </ul>
            </div>
            <div class="col">
                <h3>SOPORTE</h3>
                <ul>
                    <li>
                        <a href=<?= "$URL/contact" ?>>Contacto</a>
                    </li>
                    <li>
                        <a href=<?= "$URL/sitemap" ?>>Mapa del sitio</a>
                    </li>
                    <li>
                        <a href="#">Preguntas frecuentes</a>
                    </li>
                </ul>
            </div>
        </div>
    </section>
</div>