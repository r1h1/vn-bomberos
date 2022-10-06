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
    <title>Reporte Ambulancia - Bomberos Voluntarios</title>
</head>

<body>

    <style>
        body{
            border: 1px solid;
            border-color: #000000;
            padding: 2px;
        }
    </style>

    <header class="mt-3 container">
        <div class="row">
            <div class="col-md-2">
                <img src="../../img/logo.jpg" alt="logo-bomberos" width="70px" height="auto">
            </div>
            <div class="col-md-10 mt-4 text-center">
                <h1 class="fw-bold h6">BENEMERITO CUERPO VOLUNTARIO DE BOMBEROS DE GUATEMALA</h1>
                <h2 class="text-center fw-bold h6">REPORTE DE AMBULANCIA</h2>
            </div>
        </div>
    </header>

    <?php

    error_reporting(0);

    date_default_timezone_set("America/Guatemala");

    $fechaActual = date("j/m/Y");

    include('../../data/conection.php');

    $idBusqueda = $_GET['search'];

    $query = "SELECT llamadoa.idLlamado,llamadoa.controlCorrelativo,llamadoa.fechaGeneracion,
    llamadoa.horaGeneracion,llamadoa.fechaEdicion,llamadoa.horaEdicion, 
    llamadoa.nombreSolicitante,llamadoa.telefonoSolicitante,llamadoa.motivoLlamadoSolicitante,
    llamadoa.direccionSolicitante,llamadoa.observaciones, llamadoa.minutosTrabajados,
    llamadoa.salidaEstacion,llamadoa.horaSalidaEstacion,llamadoa.entradaEstacion,
    llamadoa.horaEntradaEstacion, llamadoa.cantidadPacientesAtendidos,
    llamadoa.nombrePacienteAtendido,llamadoa.cantidadDeFallecidos,llamadoa.fallecidosEnIncidente, 
    llamadoa.edadPaciente, llamadoa.nombreAcompañantePaciente,llamadoa.tipoDeServicioProporcionado,
    llamadoa.trasladoHacia,personal.nombreCompleto as telefonista,personal2.nombreCompleto as
    piloto,personal3.nombreCompleto as persona_destacada,unidades.nombreUnidad 
    FROM `llamado_ambulancia` llamadoa 
    INNER JOIN personal_estacion personal ON llamadoa.fkTelefonista = personal.idPersona 
    INNER JOIN personal_estacion personal2 ON llamadoa.fkPiloto = personal2.idPersona
    INNER JOIN personal_estacion personal3 ON llamadoa.fkPersonalDestacado = personal3.idPersona
    INNER JOIN unidades_estacion unidades ON llamadoa.fkUnidadUtilizada = unidades.idUnidad
    WHERE llamadoa.idLlamado = $idBusqueda;";

    $result = mysqli_query($conexion, $query);

    while (mysqli_next_result($conexion)) {;
    }

    while ($mostrar = mysqli_fetch_array($result)) {

    ?>

        <main class="container mt-4">
            <div class="row">
                <div class="col">
                    <p class="h6">Control: <span class="ms-3 text-decoration-underline"><?php echo $mostrar['controlCorrelativo']; ?></span></p>
                    <p class="h6">Teléfono: <span class="ms-3 text-decoration-underline"><?php echo $mostrar['telefonoSolicitante']; ?></span></p>
                    <p class="h6">Personal: ______</p>
                    <p class="h6">Salida De: <span class="ms-3 text-decoration-underline"><?php echo $mostrar['salidaEstacion']; ?></span></p>
                    <p class="h6">Hora Salida: <span class="ms-3 text-decoration-underline"><?php echo $mostrar['horaSalidaEstacion']; ?></span></p>
                    <p class="h6">Entrada a: <span class="ms-3 text-decoration-underline"><?php echo $mostrar['entradaEstacion']; ?></span></p>
                    <p class="h6">Hora Entrada: <span class="ms-3 text-decoration-underline"><?php echo $mostrar['horaEntradaEstacion']; ?></span></p>
                    <p class="h6">Dirección: <span class="ms-3 text-decoration-underline"><?php echo $mostrar['direccionSolicitante']; ?></span></p>
                    <p class="h6">Nombre de (los) solicitante(s): <span class="ms-3 text-decoration-underline"><?php echo $mostrar['nombrePacienteAtendido']; ?></span></p>
                    <p class="h6">Personal Destacado: <span class="ms-3 text-decoration-underline"><?php echo $mostrar[26]; ?></span></p>
                </div>

                <div class="col text-end">
                    <p class="h6">Minutos Trabajados: <span class="ms-3 text-decoration-underline"><?php echo $mostrar['minutosTrabajados']; ?></span></p>
                    <p class="h6">Fecha: <span class="ms-3 text-decoration-underline"><?php echo $mostrar['fechaGeneracion']; ?></span></p>
                    <p class="h6">Edad(es): <span class="ms-3 text-decoration-underline"><?php echo $mostrar['edadPaciente']; ?></span></p>
                    <p class="h6">Traslado a: <span class="ms-3 text-decoration-underline"><?php echo $mostrar['trasladoHacia']; ?></span></p>
                    <p class="h6">Motivo de Accidente (Llamado): <span class="ms-3 text-decoration-underline"><?php echo $mostrar['motivoLlamadoSolicitante']; ?></span></p>
                    <p class="h6">Nombre de (los) paciente(s): <span class="ms-3 text-decoration-underline"><?php echo $mostrar['nombrePacienteAtendido']; ?></span></p>
                    <p class="h6">Telefonista: <span class="ms-3 text-decoration-underline"><?php echo $mostrar[24]; ?></span></p>
                    <p class="h6">Unidad Utilizada: <span class="ms-3 text-decoration-underline"><?php echo $mostrar['nombreUnidad']; ?></span></p>
                    <p class="h6">Fallecidos: <span class="ms-3 text-decoration-underline"><?php echo $mostrar['fallecidosEnIncidente']; ?></span></p>
                    <p class="h6">Piloto(s): <span class="ms-3 text-decoration-underline"><?php echo $mostrar[25]; ?></span></p>
                </div>

                <div class="col-md-6 mt-4">
                    <p class="h6">Observaciones: </p>
                    <textarea class="form-control" style="height: 140px" maxlength="400" readonly><?php echo $mostrar['observaciones']; ?></textarea>
                </div>

                <div class="col mt-4">
                    <p class="h6">Reporte Por: <span class="ms-3 text-decoration-underline"><?php echo $mostrar[24]; ?></span></p>
                    <p class="h6">Es conforme el Piloto: <span class="ms-3 text-decoration-underline"><?php echo $mostrar[25]; ?></span></p>
                    <p class="h6">Vo.Bo. Jefe de Servicio: <span class="ms-3"></span></p>
                </div>

                <div class="col mt-4 text-end">
                    <p class="h6">(f) ___________________________</p>
                    <p class="h6">(f) ___________________________</p>
                    <p class="h6">(f) ___________________________</p>
                </div>

                <div class="col-md-12 mt-5">
                    <p class="h6">Razón: La Secretaría Ejecutiva del Cuerpo, para que conste que en esta fecha
                        y a solicitud de esta fecha se extiende copia certificada de este, reporta a Sr.(a)(ita): </p>
                    <p class="mt-3">___________________________________________________________________</p>
                </div>

                <div class="col-md-12 text-center mt-2">
                    <p class="h6">Guatemala ________ de ____________ de ______
                    </p>
                </div>

                <div class="col-md-12 text-center mt-2">
                    <p class="h6">____________________________</p>
                    <p class="h6">Secretaría</p>
                </div>

            </div>
        </main>

    <?php
    }

    ?>

    <script src="../../js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="../../js/jquery-3.5.1.js"></script>
    <script src="../../js/script.js"></script>
    <script>
        window.print();
    </script>
</body>

</html>