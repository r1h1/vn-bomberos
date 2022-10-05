<?php

error_reporting(0);

session_start();

$varsesion = $_SESSION['usuario'];
$varpermiso = $_SESSION['rol'];
$varnombre = $_SESSION['nombre'];

$nombrePersonaLogueada = $varnombre;

if ($varsesion == null || $varsesion = '') {
  echo '<script type="text/javascript">
            window.location.href="../index.php?status=2";
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

  <link rel="icon" href="../img/log.png" />

  <!-- Font type -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />

  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet" />

  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/be221c52b4.js" crossorigin="anonymous"></script>

  <!-- SweetAlert2 Library -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <link rel="stylesheet" href="../css/general.css" />
  <title>Administración - Bomberos Voluntarios</title>
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
              <a class="dropdown-item" href="../business/login/credenciales/cerrarSesion.php"><i class="fa-solid fa-right-from-bracket"></i> Cerrar
                Sesión</a>
            </li>
            <li>
              <a class="dropdown-item" href="components/personal.php"><i class="fa-solid fa-pen"></i> Modificar
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
            <img src="../img/log.png" alt="logo-png" width="100px" class="mx-auto d-block" />
          </li>
          <li>
            <a href="administracion.php" class="nav-link active px-3 mb-3 mt-5 text-dark">
              <span class="px-3"><i class="fa-solid fa-house"></i><span class="ms-3">Inicio</span></span>
            </a>
          </li>
          <?php
          if ($varpermiso == 'admin') {
          ?>
            <li>
              <a href="components/personal.php" class="nav-link active px-3 mb-3 text-dark">
                <span class="px-3"><i class="fa-solid fa-user"></i><span class="ms-4">Personal</span></span>
              </a>
            </li>
            <li>
              <a href="components/unidades.php" class="nav-link active px-3 mb-3 text-dark">
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
            <a href="components/ambulancia.php" class="nav-link active px-3 mb-3 text-dark">
              <span class="px-3"><i class="fa-solid fa-truck-medical"></i><span class="ms-3">Ambulancia</span></span>
            </a>
          </li>
          <li>
            <a href="components/incendio.php" class="nav-link active px-3 mb-3 text-dark">
              <span class="px-3"><i class="fa-solid fa-fire"></i><span class="ms-4">Incendio</span></span>
            </a>
          </li>
          <li>
            <a href="components/rescate.php" class="nav-link active px-3 mb-3 text-dark">
              <span class="px-3"><i class="fa-solid fa-parachute-box"></i><span class="ms-3">Rescate</span></span>
            </a>
          </li>
          <li>
            <a href="components/varios.php" class="nav-link active px-3 mb-3 text-dark">
              <span class="px-3"><i class="fa-solid fa-kit-medical"></i><span class="ms-3">Servicios
                  Varios</span></span>
            </a>
          </li>
          <li>
            <a href="components/estadistica.php" class="nav-link active px-3 mb-3 text-dark">
              <span class="px-3"><i class="fa-solid fa-chart-pie"></i><span class="ms-3">Estadísticas</span></span>
            </a>
          </li>
          <?php
          if ($varpermiso == 'admin') {
          ?>
            <li>
              <a href="components/mantenimiento-bd.php" class="nav-link active px-3 mb-3 text-dark">
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
        <div class="col-sm-12 col-md-6 mb-4">
          <h5 class="fw-bold mb-3">Resumen Administrativo,</h5>
          <h5><?php echo $nombrePersonaLogueada; ?></h5>
          <p class="h6">Bomberos Voluntarios de Villa Nueva CIA 25.</p>
        </div>
      </div>

      <div class="row">

        <div class="col-sm-12 col-md-3 mb-3">
          <div class="card bg-warning text-dark h-100">
            <div class="card-body py-5">
              <?php
              include('../data/conection.php');

              $query = "CALL consultarTotalDeLlamadasAmbulancia();";
              $result = mysqli_query($conexion, $query);
              while ($mostrar = mysqli_fetch_array($result)) {
                $totalLlamadoAmbulancia = $mostrar[0];
              }
              ?>
              <h6 class="mt-2">Ambulancia</h6>
              <h3 class="mt-4" id="llamadoAmbulancia"><?php echo $totalLlamadoAmbulancia; ?></h2>
            </div>
            <div class="card-footer d-flex">
              <a href="components/ambulancia.php" class="nav-link text-dark">Ver más detalles</a>
              <span class="ms-auto">
                <i class="fa-solid fa-arrow-down mt-2"></i>
              </span>
            </div>
          </div>
        </div>

        <div class="col-sm-12 col-md-3 mb-3">
          <div class="card bg-success text-white h-100">
            <div class="card-body py-5">
              <?php
              include('../data/conection.php');

              $query = "CALL consultarTotalDeLlamadasIncendio()";
              $result = mysqli_query($conexion, $query);
              while ($mostrar = mysqli_fetch_array($result)) {
                $totalLlamadoIncendio = $mostrar[0];
              }
              ?>
              <h6 class="mt-2">Incendios</h6>
              <h3 class="mt-4" id="llamadoIncendio"><?php echo $totalLlamadoIncendio; ?></h2>
            </div>
            <div class="card-footer d-flex">
              <a href="components/incendio.php" class="nav-link text-light">Ver más detalles</a>
              <span class="ms-auto">
                <i class="fa-solid fa-arrow-down mt-2"></i>
              </span>
            </div>
          </div>
        </div>

        <div class="col-sm-12 col-md-3 mb-3">
          <div class="card bg-danger text-white h-100">
            <div class="card-body py-5">
              <?php
              include('../data/conection.php');

              $query = "CALL consultarTotalDeLlamadasRescate();";
              $result = mysqli_query($conexion, $query);
              while ($mostrar = mysqli_fetch_array($result)) {
                $totalLlamadoRescate = $mostrar[0];
              }
              ?>
              <h6 class="mt-2">Rescate</h6>
              <h3 class="mt-4" id="llamadoRescate"><?php echo $totalLlamadoRescate; ?></h2>
            </div>
            <div class="card-footer d-flex">
              <a href="components/rescate.php" class="nav-link text-light">Ver más detalles</a>
              <span class="ms-auto">
                <i class="fa-solid fa-arrow-down mt-2"></i>
              </span>
            </div>
          </div>
        </div>

        <div class="col-sm-12 col-md-3 mb-3">
          <div class="card bg-primary text-white h-100">
            <div class="card-body py-5">
              <?php
              include('../data/conection.php');

              $query = "CALL consultarTotalDeLlamadasVarios();";
              $result = mysqli_query($conexion, $query);
              while ($mostrar = mysqli_fetch_array($result)) {
                $totalLlamadoServiciosVarios = $mostrar[0];
              }
              ?>
              <h6 class="mt-2">Servicios Varios</h6>
              <h3 class="mt-4" id="llamadoVarios"><?php echo $totalLlamadoServiciosVarios; ?></h2>
            </div>
            <div class="card-footer d-flex">
              <a href="components/varios.php" class="nav-link text-light">Ver más detalles</a>
              <span class="ms-auto">
                <i class="fa-solid fa-arrow-down mt-2"></i>
              </span>
            </div>
          </div>
        </div>

        <div class="col-sm-12 col-md-6 mb-3">
          <div class="card bg-secondary text-light h-100">
            <div class="card-body">
              <?php
              $totalDeLlamados = $totalLlamadoAmbulancia + $totalLlamadoIncendio
                + $totalLlamadoRescate + $totalLlamadoServiciosVarios;
              ?>
              <h6 class="mt-2">Total de Llamadas</h6>
              <h3 class="mt-4" id="totalLlamados"><?php echo $totalDeLlamados; ?></h3>
            </div>
          </div>
        </div>

        <div class="col-sm-12 col-md-6 mb-3">
          <div class="card bg-secondary text-light h-100">
            <div class="card-body">
              <?php
              include('../data/conection.php');

              $query = "CALL consultarTotalDePersonalEstacion();";
              $result = mysqli_query($conexion, $query);
              while ($mostrar = mysqli_fetch_array($result)) {
                $totalPersonalActivo = $mostrar[0];
              }
              ?>
              <h6 class="mt-2">Personal Activo</h6>
              <h3 class="mt-4"><?php echo $totalPersonalActivo; ?></h3>
            </div>
          </div>
        </div>

      </div>

      <div class="row mt-4">
        <div class="col-sm-12 col-md-12 mb-3 h-auto">
          <div class="card h-100">
            <div class="card-header">
              <span class="me-3"></span>
              Gráfica de Llamadas
            </div>
            <div class="card-body">
              <canvas class="chart" width="500" height="auto"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <footer>
    <!--nada-->
  </footer>

  <script src="../js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
  <script src="../js/chart.js"></script>
  <script src="../js/jquery-3.5.1.js"></script>
</body>

</html>