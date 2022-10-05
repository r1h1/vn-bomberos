<?php
session_start();
$varsesion = $_SESSION['usuario'];
$varpermiso = $_SESSION['rol'];
$varnombre = $_SESSION['nombre'];

$nombrePersonaLogueada = $varnombre;

if ($varsesion == null || $varsesion = '') {
    echo '<script type="text/javascript">
            window.location.href="../../../index.php?status=2";
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

    <link rel="icon" href="../../../img/log.png" />

    <!-- Font type -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet" />

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/be221c52b4.js" crossorigin="anonymous"></script>

    <!-- SweetAlert2 Library -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href="../../../css/general.css" />
    <title>Edicion Llamado Servicios Varios - Bomberos Voluntarios</title>
</head>

<body>

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
                            <a class="dropdown-item" href="../../../business/login/credenciales/cerrarSesion.php"><i class="fa-solid fa-right-from-bracket"></i> Cerrar
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
                        <img src="../../../img/log.png" alt="logo-png" width="100px" class="mx-auto d-block" />
                    </li>
                    <li>
                        <a href="../../administracion.php" class="nav-link active px-3 mb-3 mt-5 text-dark">
                            <span class="px-3"><i class="fa-solid fa-house"></i><span class="ms-3">Inicio</span></span>
                        </a>
                    </li>
                    <?php
                    if ($varpermiso == 'admin') {
                    ?>
                        <li>
                            <a href="../personal.php" class="nav-link active px-3 mb-3 text-dark">
                                <span class="px-3"><i class="fa-solid fa-user"></i><span class="ms-4">Personal</span></span>
                            </a>
                        </li>
                        <li>
                            <a href="../unidades.php" class="nav-link active px-3 mb-3 text-dark">
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
                        <a href="../ambulancia.php" class="nav-link active px-3 mb-3 text-dark">
                            <span class="px-3"><i class="fa-solid fa-truck-medical"></i><span class="ms-3">Ambulancia</span></span>
                        </a>
                    </li>
                    <li>
                        <a href="../incendio.php" class="nav-link active px-3 mb-3 text-dark">
                            <span class="px-3"><i class="fa-solid fa-fire"></i><span class="ms-4">Incendio</span></span>
                        </a>
                    </li>
                    <li>
                        <a href="../rescate.php" class="nav-link active px-3 mb-3 text-dark">
                            <span class="px-3"><i class="fa-solid fa-parachute-box"></i><span class="ms-3">Rescate</span></span>
                        </a>
                    </li>
                    <li>
                        <a href="../varios.php" class="nav-link active px-3 mb-3 text-dark">
                            <span class="px-3"><i class="fa-solid fa-kit-medical"></i><span class="ms-3">Servicios
                                    Varios</span></span>
                        </a>
                    </li>
                    <li>
                        <a href="../estadistica.php" class="nav-link active px-3 mb-3 text-dark">
                            <span class="px-3"><i class="fa-solid fa-chart-pie"></i><span class="ms-3">Estadísticas</span></span>
                        </a>
                    </li>
                    <?php
                    if ($varpermiso == 'admin') {
                    ?>
                        <li>
                            <a href="../mantenimiento-bd.php" class="nav-link active px-3 mb-3 text-dark">
                                <span class="px-3"><i class="fa-solid fa-database"></i><span class="ms-3">Manto.
                                        Datos</span></span>
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
                    <h5 class="fw-bold">Edición de Llamadas - Servicios Varios</h5>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 mb-3">
                    <div class="card bg-nav text-dark h-auto stretch-card">
                        <div class="card-header bg-secondary text-light">
                            <h6 class="mt-2">Agregar Nuevo Llamado</h6>
                        </div>
                        <div class="card-body">

                            <?php

                            include("../../../data/conection.php");

                            //error_reporting(0);

                            $idEdicion = $_GET['search'];

                            $sql = "SELECT * FROM `llamado_servicios_varios` WHERE idLlamado = '$idEdicion';";

                            $result = mysqli_query($conexion, $sql);

                            while (mysqli_next_result($conexion)) {;
                            }

                            while ($mostrar = mysqli_fetch_array($result)) {
                                $controlCorrelativo = $mostrar[1];
                                $nombreSolicitante = $mostrar[6];
                                $telefonoSolicitante = $mostrar[7];
                                $motivoLlamadoSolicitante = $mostrar[8];
                                $direccionSolicitante = $mostrar[9];
                                $observaciones = $mostrar[10];
                            }

                            ?>

                            <form action="../../../business/varios/editarDatos.php" method="POST" class="row mt-2">

                                <input type="text" class="form-control" value="<?php echo $idEdicion ?>" name="idEdicionID" hidden />

                                <div class="col-md-12 col-lg-6 mt-4">
                                    <label for="" class="form-label">Fecha (Sistema)</label>
                                    <input type="text" class="form-control" required readonly id="fechaActual" name="fechaEdicion" />
                                </div>

                                <div class="col-md-12 col-lg-6 mt-4">
                                    <label for="" class="form-label">Hora (Sistema)</label>
                                    <input type="text" class="form-control" required readonly id="horaActual" name="horaEdicion" />
                                </div>

                                <div class="col-md-12 col-lg-6 mt-4">
                                    <label for="" class="form-label">Control Correlativo</label>
                                    <input type="text" class="form-control" required value="<?php echo $controlCorrelativo; ?>" name="controlCorrelativo" />
                                </div>

                                <div class="col-md-12 col-lg-6 mt-4">
                                    <label for="" class="form-label">Telefonista *</label>
                                    <?php

                                    $sql = "SELECT llamada.fkTelefonista,personal.nombreCompleto 
                                    FROM `llamado_servicios_varios` llamada
                                    INNER JOIN personal_estacion personal ON llamada.fkTelefonista = personal.idPersona
                                    WHERE llamada.idLlamado = '$idEdicion';";

                                    $result = mysqli_query($conexion, $sql);

                                    while ($mostrar = mysqli_fetch_array($result)) {
                                        $fkTelefonista = $mostrar['fkTelefonista'];
                                        $nombre = $mostrar['nombreCompleto'];
                                    }
                                    ?>
                                    <input type="text" class="form-control" value="<?php echo $fkTelefonista; ?>" name="fkTelefonista" hidden>
                                    <input type="text" class="form-control" value="<?php echo $nombre; ?>" readonly />
                                </div>
                                <div class="col-md-12 col-lg-12 mt-4">
                                    <label for="" class="form-label">Nombre del Solicitante *</label>
                                    <input type="text" class="form-control" required name="nombreSolicitante" value="<?php echo $nombreSolicitante; ?>" />
                                </div>

                                <div class="col-md-12 col-lg-12 mt-4">
                                    <label for="" class="form-label">Motivo del Llamado *</label>
                                    <input type="text" class="form-control" required name="motivoLlamado" value="<?php echo $motivoLlamadoSolicitante; ?>" />
                                </div>

                                <div class="col-md-12 col-lg-12 mt-4">
                                    <label for="" class="form-label">Dirección Solicitante *</label>
                                    <input type="text" class="form-control" required name="direccionSolicitante" value="<?php echo $direccionSolicitante; ?>" />
                                </div>

                                <div class="col-md-12 col-lg-6 mt-4">
                                    <label for="" class="form-label">Teléfono *</label>
                                    <input type="number" class="form-control" min="0" required name="telefono" value="<?php echo $telefonoSolicitante; ?>" />
                                </div>

                                <div class="col-md-12 col-lg-6 mt-4">
                                    <label for="" class="form-label">Minutos Trabajados *</label>
                                    <input type="number" class="form-control" min="0" required name="minutosTrabajados" />
                                </div>

                                <div class="col-md-12 col-lg-6 mt-4">
                                    <label for="" class="form-label">Solicitud Por Teléfono *</label>
                                    <input type="text" class="form-control" name="solicitudPorTelefono" />
                                </div>

                                <div class="col-md-12 col-lg-6 mt-4">
                                    <label for="" class="form-label">Clase de Servicio *</label>
                                    <input type="text" class="form-control" name="claseDeServicio" />
                                </div>

                                <div class="col-md-12 col-lg-6 mt-4">
                                    <label for="" class="form-label">Hora de Salida (Estación) *</label>
                                    <input type="time" class="form-control" required name="horaSalidaEstacion" />
                                </div>

                                <div class="col-md-12 col-lg-6 mt-4">
                                    <label for="" class="form-label">Hora de Entrada (Estación) *</label>
                                    <input type="time" class="form-control" required name="horaEntradaEstacion" />
                                </div>

                                <div class="col-md-12 col-lg-6 mt-4">
                                    <label for="" class="form-label">Piloto *</label>
                                    <select class="form-select" aria-label="Default select example" required name="fkPiloto">
                                        <option value="">Seleccione uno...</option>
                                        <?php

                                        include('../../../data/conection.php');

                                        $query = "CALL consultarTodosLosDatosPersonal();";
                                        $result = mysqli_query($conexion, $query);

                                        while ($mostrar = mysqli_fetch_array($result)) {

                                        ?>
                                            <option value="<?php echo $mostrar['idPersona'] ?>"><?php echo $mostrar['codigo'] . ' - ' . $mostrar['nombreCompleto']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="col-md-12 col-lg-6 mt-4">
                                    <label for="" class="form-label">Personal Destacado *</label>
                                    <select class="form-select" aria-label="Default select example" required name="fkPersonalDestacado">
                                        <option value="">Seleccione uno...</option>
                                        <?php

                                        include('../../../data/conection.php');

                                        $query = "CALL consultarTodosLosDatosPersonal();";
                                        $result = mysqli_query($conexion, $query);

                                        while ($mostrar = mysqli_fetch_array($result)) {

                                        ?>
                                            <option value="<?php echo $mostrar['idPersona'] ?>"><?php echo $mostrar['codigo'] . ' - ' . $mostrar['nombreCompleto']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="col-md-12 col-lg-6 mt-4">
                                    <label for="" class="form-label">Unidad Utilizada *</label>
                                    <select class="form-select" aria-label="Default select example" required name="fkUnidadUtilizada">
                                        <option value="">Seleccione uno...</option>
                                        <?php

                                        include('../../../data/conection.php');

                                        $query = "CALL consultarTodosLosDatosUnidades();";
                                        $result = mysqli_query($conexion, $query);

                                        while ($mostrar = mysqli_fetch_array($result)) {

                                        ?>
                                            <option value="<?php echo $mostrar['idUnidad'] ?>"><?php echo $mostrar['codigoUnidad'] . ' - ' . $mostrar['nombreUnidad']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="col-md-12 col-lg-12 mt-4">
                                    <label for="" class="form-label">Observaciones *</label>
                                    <textarea class="form-control" style="height: 200px" maxlength="400" name="observaciones"><?php echo $observaciones; ?></textarea>
                                </div>

                                <div class="col-md-12 mt-4">
                                    <button type="submit" class="btn btn-warning mb-2 w-auto">
                                        <i class="fa-solid fa-floppy-disk"></i> Guardar Cambios
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <!--nada-->
    </footer>

    <script src="../../../js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="../../../js/jquery-3.5.1.js"></script>
    <script src="../../../js/script.js"></script>
    <script>
        setInterval(traerHoraYFechaDelDia, 100);
    </script>
</body>

</html>