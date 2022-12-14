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
    <title>Ambulancia - Bomberos Voluntarios</title>
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
                            <a class="dropdown-item" href="../../business/login/credenciales/cerrarSesion.php"><i class="fa-solid fa-right-from-bracket"></i> Cerrar
                                Sesi??n</a>
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
                            <span class="px-3"><i class="fa-solid fa-chart-pie"></i><span class="ms-3">Estad??sticas</span></span>
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
                    <h5 class="fw-bold">Ambulancia</h5>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="card bg-nav text-dark h-auto stretch-card">
                        <div class="card-header bg-secondary text-light">
                            <h6 class="mt-2">Agregar Nuevo Llamado</h6>
                        </div>
                        <div class="card-body">
                            <form action="../../business/ambulancia/insertarDatos.php" method="POST" class="row mt-2">

                                <div class="col-md-12 col-lg-12 mt-4">
                                    <label for="" class="form-label">Control Correlativo</label>
                                    <input type="text" class="form-control" required name="controlCorrelativo" />
                                </div>

                                <div class="col-md-12 col-lg-6 mt-4">
                                    <label for="" class="form-label">Fecha Actual (Sistema)</label>
                                    <input type="text" class="form-control" required readonly id="fechaActual" name="fechaGeneracion" />
                                </div>

                                <div class="col-md-12 col-lg-6 mt-4">
                                    <label for="" class="form-label">Hora Actual (Sistema)</label>
                                    <input type="text" class="form-control" required readonly id="horaActual" name="horaGeneracion" />
                                </div>

                                <div class="col-md-12 col-lg-12 mt-4">
                                    <label for="" class="form-label">Telefonista *</label>
                                    <select class="form-select" aria-label="Default select example" required name="telefonista">
                                        <option value="">Seleccione uno...</option>
                                        <?php

                                        include('../../data/conection.php');

                                        $query = "CALL consultarTodosLosDatosPersonal();";
                                        $result = mysqli_query($conexion, $query);

                                        while ($mostrar = mysqli_fetch_array($result)) {

                                        ?>
                                            <option value="<?php echo $mostrar['idPersona'] ?>"><?php echo $mostrar['nombreCompleto'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>

                                </div>
                                <div class="col-md-12 col-lg-12 mt-4">
                                    <label for="" class="form-label">Nombre del Solicitante *</label>
                                    <input type="text" class="form-control" required name="nombreSolicitante" />
                                </div>

                                <div class="col-md-12 col-lg-12 mt-4">
                                    <label for="" class="form-label">Motivo del Llamado *</label>
                                    <input type="text" class="form-control" required name="motivoLlamado" />
                                </div>

                                <div class="col-md-12 col-lg-12 mt-4">
                                    <label for="" class="form-label">Direcci??n Solicitante*</label>
                                    <input type="text" class="form-control" required name="direccionSolicitante" />
                                </div>

                                <div class="col-md-12 col-lg-12 mt-4">
                                    <label for="" class="form-label">Tel??fono *</label>
                                    <input type="number" class="form-control" min="0" required name="telefono" />
                                </div>

                                <div class="col-md-12 col-lg-12 mt-4">
                                    <label for="" class="form-label">Observaciones *</label>
                                    <textarea class="form-control" style="height: 160px" maxlength="400" required name="observaciones"></textarea>
                                </div>

                                <div class="col-md-12 mt-4">
                                    <button type="submit" class="btn btn-success mb-2">
                                        <i class="fa-solid fa-floppy-disk"></i> Guardar
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="card bg-nav text-dark h-auto stretch-card">
                        <div class="card-header bg-success text-light">
                            <h6 class="mt-2">Mantenimiento y B??squeda de Llamados</h6>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <label for="" class="form-label mt-3">Ingresa un dato a buscar</label>
                                    <form action="" method="GET">
                                        <div class="input-group mb-3">

                                            <input type="text" class="form-control mt-2" aria-label="Buscar por" placeholder="Busca aqu??..." id="datoABuscar" name="search" />
                                            <button type="submit" class="btn btn-secondary mt-2" name="btnBuscar"><i class="fa-solid fa-magnifying-glass"></i></button>
                                            <a href="ambulancia.php" class="btn btn-primary mt-2 ms-2" type="button">Ver Todo</a>

                                        </div>
                                    </form>
                                </div>

                                <div class="table-responsive mt-4">
                                    <table class="table text-center">
                                        <thead>
                                            <tr>
                                                <th scope="col">C??digo Correlativo</th>
                                                <th scope="col">Fecha Creaci??n</th>
                                                <th scope="col">Hora Creaci??n</th>
                                                <th scope="col">Solicitante</th>
                                                <th scope="col">Direcci??n</th>
                                                <th scope="col">Tel??fono</th>
                                                <th scope="col">Motivo</th>
                                                <th scope="col">Reporte</th>
                                                <th scope="col">Editar</th>
                                                <th scope="col">Eliminar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <?php


                                                include('../../data/conection.php');

                                                if (isset($_GET['btnBuscar'])) {

                                                    $dato = $_GET['search'];

                                                    $query = "SELECT * FROM llamado_ambulancia WHERE controlCorrelativo LIKE CONCAT('%', '$dato' , '%')
                                                                                                OR fechaGeneracion LIKE CONCAT('%', '$dato' , '%')
                                                                                                OR horaGeneracion LIKE CONCAT('%', '$dato' , '%')
                                                                                                OR nombreSolicitante LIKE CONCAT('%', '$dato' , '%')
                                                                                                OR direccionSolicitante LIKE CONCAT('%', '$dato' , '%')
                                                                                                OR telefonoSolicitante LIKE CONCAT('%', '$dato' , '%')
                                                                                                OR motivoLlamadoSolicitante LIKE CONCAT('%', '$dato' , '%');";
                                                } else {

                                                    $query = "SELECT llamadoa.idLlamado,llamadoa.controlCorrelativo,llamadoa.fechaGeneracion,
                                                                    llamadoa.horaGeneracion,llamadoa.fechaEdicion,llamadoa.horaEdicion, 
                                                                    llamadoa.nombreSolicitante,llamadoa.telefonoSolicitante,llamadoa.motivoLlamadoSolicitante,
                                                                    llamadoa.direccionSolicitante,llamadoa.observaciones, llamadoa.minutosTrabajados,
                                                                    llamadoa.salidaEstacion,llamadoa.horaSalidaEstacion,llamadoa.entradaEstacion,
                                                                    llamadoa.horaEntradaEstacion, llamadoa.cantidadPacientesAtendidos,
                                                                    llamadoa.nombrePacienteAtendido,llamadoa.cantidadDeFallecidos,llamadoa.fallecidosEnIncidente, 
                                                                    llamadoa.edadPaciente, llamadoa.nombreAcompa??antePaciente,llamadoa.tipoDeServicioProporcionado,
                                                                    llamadoa.trasladoHacia,personal.nombreCompleto,unidades.nombreUnidad 
                                                                    FROM `llamado_ambulancia` llamadoa 
                                                                    INNER JOIN personal_estacion personal ON llamadoa.fkTelefonista = personal.idPersona 
                                                                    INNER JOIN unidades_estacion unidades ON llamadoa.fkUnidadUtilizada = unidades.idUnidad
                                                                    WHERE personal.nombreCompleto = '$nombrePersonaLogueada'
                                                                    ORDER BY llamadoa.fechaGeneracion DESC;";
                                                }

                                                $result = mysqli_query($conexion, $query);

                                                while (mysqli_next_result($conexion)) {;
                                                }


                                                while ($mostrar = mysqli_fetch_array($result)) {

                                                ?>
                                                    <td hidden><?php echo $mostrar['idLlamado']; ?></td>
                                                    <td><?php echo $mostrar['controlCorrelativo']; ?></td>
                                                    <td><?php echo $mostrar['fechaGeneracion']; ?></td>
                                                    <td><?php echo $mostrar['horaGeneracion']; ?></td>
                                                    <td><?php echo $mostrar['nombreSolicitante']; ?></td>
                                                    <td><?php echo $mostrar['direccionSolicitante']; ?></td>
                                                    <td><?php echo $mostrar['telefonoSolicitante']; ?></td>
                                                    <td><?php echo $mostrar['motivoLlamadoSolicitante']; ?></td>
                                                    <td class="text-center">
                                                        <a href="../../business/reportes/reporteAmbulancia.php?search=<?php echo $mostrar['idLlamado']; ?>" 
                                                        class="btn btn-danger" target="_blank"><i class="fa-solid fa-file-pdf"></i></a>
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="edicion/ambulancia.php?search=<?php echo $mostrar['idLlamado']; ?>" class="btn btn-success">
                                                            <i class="fa-solid fa-pen"></i></a>
                                                    </td>
                                                    <?php
                                                    if ($varpermiso == 'admin') {
                                                    ?>
                                                        <td class="text-center">
                                                            <a href="../../business/ambulancia/borrarDatos.php?search=<?php echo $mostrar['idLlamado']; ?>" class="btn btn-danger">
                                                                <i class="fa-solid fa-trash"></i></a>
                                                        </td>
                                                    <?php
                                                    } else if ($varpermiso == 'bombero') {
                                                    ?>
                                                        <td>
                                                            <!-- no tiene permisos -->
                                                        </td>
                                                    <?php
                                                    }
                                                    ?>
                                            </tr>
                                        <?php
                                                }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
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
    <script src="../../js/components/ambulancia.js"></script>
    <script>
        setInterval(traerHoraYFechaDelDia, 100);
    </script>
</body>

</html>