<?php

error_reporting(0);

session_start();
$varsesion = $_SESSION['usuario'];
$varpermiso = $_SESSION['rol'];
$varnombre = $_SESSION['nombre'];

$nombrePersonaLogueada = $varnombre;

if ($varsesion == null || $varsesion = '') {
    echo '<script type="text/javascript">
            window.location.href="../../index.php?status=2";
    </script>';
    die();
}
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Sistema local, Bomberos de VN" />
    <meta name="keywords" content="HTML5, CSS3, Bootstrap 5, JavaScript, PHP" />
    <meta name="author" content="UMG" />
    <meta name="copyright" content="UMG" />
    <meta name="robots" content="index" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

    <!-- Font type -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet" />

    <link rel="icon" href="../../img/log.png" />

    <!-- Font type -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet" />

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/be221c52b4.js" crossorigin="anonymous"></script>

    <!-- SweetAlert2 Library -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href="../../css/general.css" />
    <title>Mantenimiento Sistema - Bomberos Voluntarios</title>
</head>

<body>
    <!-- top navigation bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top border border-2">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar" aria-controls="offcanvasExample">
                <span class="navbar-toggler-icon" data-bs-target="#sidebar"></span>
            </button>

            <form class="d-flex ms-auto my-3 my-lg-0"></form>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link text-light dropdown-toggle ms-2 btn btn-danger" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Opciones
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="../../business/login/credenciales/cerrarSesion.php"><i class="fa-solid fa-right-from-bracket"></i> Cerrar
                                Sesión</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="personal.php"><i class="fa-solid fa-pen"></i> Modificar
                                Usuario</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

    <div class="offcanvas offcanvas-start sidebar-nav bg-nav" tabindex="-1" id="sidebar">
        <div class="offcanvas-body p-0">
            <nav class="navbar-dark">
                <ul class="navbar-nav mt-4">
                    <li>
                        <img src="../../img/log.png" alt="logo-png" width="100px" class="mx-auto d-block" />
                    </li>
                    <li>
                        <a href="../administracion.php" class="nav-link active px-3 mb-3 mt-5 text-dark">
                            <span class="px-3"><i class="fa-solid fa-house"></i><span class="ms-3">Inicio</span></span>
                        </a>
                    </li>
                    <?php
                    if ($varpermiso == 'admin') {
                    ?>
                        <li>
                            <a href="personal.php" class="nav-link active px-3 mb-3 text-dark">
                                <span class="px-3"><i class="fa-solid fa-user"></i><span class="ms-4">Personal</span></span>
                            </a>
                        </li>
                        <li>
                            <a href="unidades.php" class="nav-link active px-3 mb-3 text-dark">
                                <span class="px-3"><i class="fa-solid fa-car"></i><span class="ms-3">Unidades</span></span>
                            </a>
                        </li>
                    <?php
                    } else if ($varpermiso == 'bombero') {
                    ?>
                        <li>
                            <!-- no tiene permisos -->
                        </li>
                        <li>
                            <!-- no tiene permisos -->
                        </li>
                    <?php
                    }
                    ?>
                    <li>
                        <a href="ambulancia.php" class="nav-link active px-3 mb-3 text-dark">
                            <span class="px-3"><i class="fa-solid fa-truck-medical"></i><span class="ms-3">Ambulancia</span></span>
                        </a>
                    </li>
                    <li>
                        <a href="incendio.php" class="nav-link active px-3 mb-3 text-dark">
                            <span class="px-3"><i class="fa-solid fa-fire"></i><span class="ms-4">Incendio</span></span>
                        </a>
                    </li>
                    <li>
                        <a href="rescate.php" class="nav-link active px-3 mb-3 text-dark">
                            <span class="px-3"><i class="fa-solid fa-parachute-box"></i><span class="ms-3">Rescate</span></span>
                        </a>
                    </li>
                    <li>
                        <a href="varios.php" class="nav-link active px-3 mb-3 text-dark">
                            <span class="px-3"><i class="fa-solid fa-kit-medical"></i><span class="ms-3">Servicios
                                    Varios</span></span>
                        </a>
                    </li>
                    <li>
                        <a href="estadistica.php" class="nav-link active px-3 mb-3 text-dark">
                            <span class="px-3"><i class="fa-solid fa-chart-pie"></i><span class="ms-3">Estadísticas</span></span>
                        </a>
                    </li>
                    <?php
                    if ($varpermiso == 'admin') {
                    ?>
                        <li>
                            <a href="mantenimiento-bd.php" class="nav-link active px-3 mb-3 text-dark">
                                <span class="px-3"><i class="fa-solid fa-database"></i><span class="ms-3">Manto. Datos</span></span>
                            </a>
                        </li>
                    <?php
                    } else if ($varpermiso == 'bombero') {
                    ?>
                        <li>
                            <!-- no tiene permisos -->
                        </li>
                    <?php
                    }
                    ?>
                </ul>
            </nav>
        </div>
    </div>

    <?php

    date_default_timezone_set("America/Guatemala");

    $fechaActual = date("j/m/Y");

    ?>

    <main class="mt-5 pt-5 p-4">
        <div class="container-sm mx-auto">
            <h5 class="mb-4 mt-2 fw-bold">Mantenimiento del Sistema</h5>
            <div class="card bg-nav text-dark h-auto stretch-card">
                <div class="card-header bg-secondary text-light">
                    <h6 class="mt-2">Opciones de Base de Datos</h6>
                </div>
                <div class="card-body text-center mt-3 mb-5">
                    <div class="row">
                        <div class="col-md-3 mt-3">
                            <div class="card">
                                <div class="card-header bg-warning text-dark">
                                    <p class="mt-2">Llamadas Ambulancia</p>
                                </div>
                                <div class="card-body">
                                    <a class="btn btn-outline-danger" onclick="eliminarDatosAmbulancia()"><i class="fa-solid fa-trash"></i>
                                        Eliminar</a>
                                    <a href="../../business/matenimientobd/exportar_tablas_llamados/exportarDatosAmbulancia.php" class="btn btn-outline-success"><i class="fa-solid fa-file-excel"></i>
                                        Exportar</a>
                                </div>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="modalAmbulancia" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <p class="mt-2 h5 fw-bold text-center">Para Continuar, Ingresa tu Usuario</p>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="../../business/matenimientobd/borrarDatosAmbulancia.php" method="POST">
                                                <input type="text" class="form-control" required value=<?php echo $fechaActual ?> name="fechaDelDiaActual" hidden />
                                                <input type="text" class="form-control" required name="usuarioLogueado" />
                                                <button type="sumit" class="btn btn-danger mt-3 w-100">Borrar</button>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <p class="text-end">Llamadas: Ambulancia</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mt-3">
                            <div class="card">
                                <div class="card-header bg-success text-light">
                                    <p class="mt-2">Llamadas Incendio</p>
                                </div>
                                <div class="card-body">
                                    <a class="btn btn-outline-danger" onclick="eliminarDatosIncendio()"><i class="fa-solid fa-trash"></i>
                                        Eliminar</a>
                                    <a href="../../business/matenimientobd/exportar_tablas_llamados/exportarDatosIncendio.php" class="btn btn-outline-success"><i class="fa-solid fa-file-excel"></i>
                                        Exportar</a>
                                </div>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="modalIncendio" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <p class="mt-2 h5 fw-bold text-center">Para Continuar, Ingresa tu Usuario</p>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="../../business/matenimientobd/borrarDatosIncendio.php" method="POST">
                                                <input type="text" class="form-control" required hidden value=<?php echo $fechaActual ?> name="fechaDelDiaActual" />
                                                <input type="text" class="form-control" required name="usuarioLogueado" />
                                                <button type="sumit" class="btn btn-danger mt-3 w-100">Borrar</button>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <p class="text-end">Llamadas: Incendio</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mt-3">
                            <div class="card">
                                <div class="card-header bg-danger text-light">
                                    <p class="mt-2">Llamadas Rescate</p>
                                </div>
                                <div class="card-body">
                                    <a class="btn btn-outline-danger" onclick="eliminarDatosRescate()"><i class="fa-solid fa-trash"></i>
                                        Eliminar</a>
                                    <a href="../../business/matenimientobd/exportar_tablas_llamados/exportarDatosRescate.php" class="btn btn-outline-success"><i class="fa-solid fa-file-excel"></i>
                                        Exportar</a>
                                </div>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="modalRescate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <p class="mt-2 h5 fw-bold text-center">Para Continuar, Ingresa tu Usuario</p>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="../../business/matenimientobd/borrarDatosRescate.php" method="POST">
                                                <input type="text" class="form-control" required hidden value=<?php echo $fechaActual ?> name="fechaDelDiaActual" />
                                                <input type="text" class="form-control" required name="usuarioLogueado" />
                                                <button type="sumit" class="btn btn-danger mt-3 w-100">Borrar</button>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <p class="text-end">Llamadas: Rescate</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mt-3">
                            <div class="card">
                                <div class="card-header bg-primary text-light">
                                    <p class="mt-2">Llamadas Servicios Varios</p>
                                </div>
                                <div class="card-body">
                                    <a class="btn btn-outline-danger" onclick="eliminarDatosServiciosVarios()"><i class="fa-solid fa-trash"></i>
                                        Eliminar</a>
                                    <a href="../../business/matenimientobd/exportar_tablas_llamados/exportarDatosVarios.php" class="btn btn-outline-success"><i class="fa-solid fa-file-excel"></i>
                                        Exportar</a>
                                </div>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="modalSVarios" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <p class="mt-2 h5 fw-bold text-center">Para Continuar, Ingresa tu Usuario</p>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="../../business/matenimientobd/borrarDatosServiciosVarios.php" method="POST">
                                                <input type="text" class="form-control" required hidden value=<?php echo $fechaActual ?> name="fechaDelDiaActual" />
                                                <input type="text" class="form-control" required name="usuarioLogueado" />
                                                <button type="sumit" class="btn btn-danger mt-3 w-100">Borrar</button>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <p class="text-end">Llamadas: S. Varios</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <p class="mt-2 text-muted h6">Si se presiona el botón 'Eliminar' según su categoría asignada,
                        se borrarán los registros anteriores al mes actual para evitar saturación en la base de
                        datos <span class="fw-bold text-decoration-underline">NO PRESIONE SI NO TIENE AUTORIZACIÓN, O NO
                            HA HECHO UNA COPIA DE SEGURIDAD.</span></p>
                </div>
            </div>
        </div>
    </main>

    <section class="mt-5 pt-5 p-5">
        <div class="container-sm mx-auto">
        </div>
    </section>

    <footer>
        <!--nada-->
    </footer>

    <script src="../../js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="../../js/jquery-3.5.1.js"></script>
    <script src="../../js/components/mantoDatos.js"></script>
</body>

</html>