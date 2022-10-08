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

$idFiltrado = $_GET['search'];

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
    <title>Reporte Servicios Varios - Bomberos Voluntarios</title>
</head>

<body>
    <style>
        img {
            margin-top: 70px;
        }
    </style>
    <main class="text-center">
        <img src="../../img/log.png" class="mx-auto d-block" alt="logo-bomberos" width="130px" height="auto">
        <div class="card-body">
            <h5 class="card-title fw-bold">¡Su reporte se ha generado!</h5>
            <h5 class="">Reporte de Servicios Varios</h5>
            <h2 class="mt-5 text-decoration-underline">ID de acceso: <?php echo $idFiltrado; ?></h2>
            <p class="mt-4">Presiona el botón descargar y <span class="fw-bold">filtra el ID en el reporte generado para
                    obtener los datos</span><br> en el apartado "Correspondencia" dentro del Word y "Vista previa de los resultados", <br>
                luego, en "Buscar Destinatario", luego,
                <br>llena el campo "Buscar" con el ID de arriba, presiona la opción "Buscar en: Esta Campo: idLlamado" <br> y "Buscar Siguiente"
                y poder imprimir o editar el reporte sin afectar el sistema.
            </p>
            <a href="formatosWord/servicios_varios.docx" class="btn btn-primary" download="<?php echo "ID-" . $idFiltrado . "-"; ?>reporteServiciosVarios">
            <i class="fa-sharp fa-solid fa-download"></i>
                Descargar Reporte</a>
        </div>
    </main>

    <script src="../../js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="../../js/jquery-3.5.1.js"></script>
    <script src="../../js/script.js"></script>
</body>

</html>