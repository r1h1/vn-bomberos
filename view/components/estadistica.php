<?php
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
    <title>Estadísticas - Bomberos Voluntarios</title>
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

    <main class="mt-5 pt-5 p-4">
        <div class="container-sm mx-auto">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <h5 class="fw-bold">Estadísticas</h5>
                </div>
            </div>

            <div class="card bg-nav text-dark h-auto stretch-card">
                <div class="card-header bg-secondary text-light">
                    <h6 class="mt-2">Mantenimiento y Búsqueda de Llamados</h6>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-6 col-lg-3">
                            <label for="" class="form-label mt-4">Filtrar por</label>
                            <select class="form-select form-select-sm mt-2" aria-label="Default select example" name="filtrarPor">
                                <option value="">Seleccione...</option>
                                <option value="3">Ambulancia</option>
                                <option value="4">Incendio</option>
                                <option value="5">Rescate</option>
                                <option value="6">Servicios Varios</option>
                            </select>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <label for="" class="form-label mt-4">Fecha de Inicio</label>
                            <input type="date" class="form-control" />
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <label for="" class="form-label mt-4">Fecha Final</label>
                            <input type="date" class="form-control" />
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <label for="" class="form-label mt-4">Buscar por</label>
                            <input type="text" class="form-control" placeholder="" aria-label="Buscar por" name="buscarPor" />
                        </div>
                    </div>

                    <div class="botones-exportar">
                        <a href="#" class="btn btn-success mt-4"><i class="fa-solid fa-file-excel"></i>
                            Exportar Registros</a>
                    </div>

                    <div class="table-responsive mt-5">
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <th scope="col">Categoria</th>
                                    <th scope="col">Fecha de Creación</th>
                                    <th scope="col">Hora de Creación</th>
                                    <th scope="col">Solicitante</th>
                                    <th scope="col">Dirección</th>
                                    <th scope="col">Número de Teléfono</th>
                                    <th scope="col">Motivo</th>
                                    <th scope="col">Reporte</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Mark</td>
                                    <td>Mark</td>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>Otto</td>
                                    <td>Otto</td>
                                    <td>Otto</td>
                                    <td>
                                        <a href="#" class="btn btn-danger"><i class="fa-solid fa-file-pdf"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer mt-4">
                    <p class="mt-2 text-muted h6">En la pantalla estadística puedes ver un resumen general de todas las llamadas que se han registrado,
                        a su vez, puedes filtrar por las categorías disponibles, por fechas o buscar un dato en especíco, puedes generar
                        un reporte en PDF de la incidencia, <span class="fw-bold text-decoration-underline">si deseas editar o eliminar, puedes hacerlo
                            desde la opción correspondiente a la categoría en el menú de opciones</span>.</p>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <!--nada-->
    </footer>

    <script src="../../js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="../../js/jquery-3.5.1.js"></script>
    <script src="../../js/script.js"></script>
</body>

</html>