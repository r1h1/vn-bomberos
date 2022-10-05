<?php
session_start();
$varsesion = $_SESSION['usuario'];
$varpermiso = $_SESSION['rol'];
$varnombre = $_SESSION['nombre'];

error_reporting(0);

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
  <title>Edición de Personal - Bomberos Voluntarios</title>
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
              <a class="dropdown-item" href="../../../business/login/credenciales/cerrarSesion.php"><i class="fa-solid fa-right-from-bracket"></i> Cerrar
                Sesión</a>
            </li>
            <li>
              <a class="dropdown-item" href="../personal.php"><i class="fa-solid fa-pen"></i> Modificar Usuario</a>
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
          <h5 class="fw-bold">Edición de Personal</h5>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12 mb-3">
          <div class="card bg-nav text-dark h-auto stretch-card">
            <div class="card-header bg-secondary text-light">
              <h6 class="mt-2">Agregar Nuevo</h6>
            </div>
            <div class="card-body">

              <?php

              include("../../../data/conection.php");

              error_reporting(0);

              $idEdicion = $_GET['search'];

              $sql = "CALL consultarPersonalPorID('$idEdicion')";

              $result = mysqli_query($conexion, $sql);

              while ($mostrar = mysqli_fetch_array($result)) {
                $nombre = $mostrar[1];
                $identificacion = $mostrar[2];
                $fechaNacimiento = $mostrar[3];
                $telefono = $mostrar[4];
                $cargo = $mostrar[5];
                $codigo = $mostrar[6];
                $usuario = $mostrar[7];
                $contrasena = $mostrar[8];
                $rol = $mostrar[9];
              }

              ?>

              <form action="../../../business/personal/editarDatos.php" method="POST" class="row mt-2">

                <div class="col-md-6 col-lg-6 mt-3">
                  <input type="text" class="form-control" required name="idPersonaAEditar" value="<?php echo $idEdicion ?>" hidden />
                </div>

                <div class="col-md-12 col-lg-12 mt-3">
                  <label for="" class="form-label">Nombre Completo *</label>
                  <input type="text" class="form-control" required name="nombre" value="<?php echo $nombre ?>" />
                </div>

                <div class="col-md-12 col-lg-6 mt-3">
                  <label for="" class="form-label">Identificación *</label>
                  <input type="text" class="form-control" required name="identificacion" value="<?php echo $identificacion ?>" />
                </div>

                <div class="col-md-12 col-lg-6 mt-3">
                  <label for="" class="form-label">Fecha de Nacimiento *</label>
                  <input type="text" class="form-control" required name="fechaNacimiento" value="<?php echo $fechaNacimiento ?>" />
                </div>

                <div class="col-md-12 col-lg-6 mt-3">
                  <label for="" class="form-label">Teléfono *</label>
                  <input type="number" class="form-control" required name="telefono" value="<?php echo $telefono ?>" />
                </div>

                <div class="col-md-12 col-lg-6 mt-3">
                  <label for="" class="form-label">Cargo *</label>
                  <input type="text" class="form-control" required name="cargo" value="<?php echo $cargo ?>" />
                </div>

                <div class="col-md-12 col-lg-6 mt-3">
                  <label for="" class="form-label">Código *</label>
                  <input type="text" class="form-control" required name="codigo" value="<?php echo $codigo ?>" />
                </div>

                <div class="col-md-12 col-lg-6 mt-3">
                  <label for="" class="form-label">Usuario *</label>
                  <input type="text" class="form-control" required name="usuario" value="<?php echo $usuario ?>" />
                </div>

                <div class="col-md-12 col-lg-6 mt-3">
                  <label for="" class="form-label">Contraseña *</label>
                  <input type="text" class="form-control" required name="contrasena" id="contrasena" onchange="validarContrasenaIgual()" value="<?php echo $contrasena ?>" />
                </div>

                <div class="col-md-12 col-lg-6 mt-3">
                  <label for="" class="form-label">Confirmar Contraseña *</label>
                  <input type="text" class="form-control" required id="contrasenaConfirmar" onchange="validarContrasenaIgual()" value="<?php echo $contrasena ?>" />
                </div>

                <div class="col-md-12 col-lg-12 text-center mt-3">
                  <p id="mensajeAlerta" class="text-danger"></p>
                </div>

                <div class="col-md-12 col-lg-12 mt-3">
                  <label for="" class="form-label">Rol / Permisos *</label>
                  <select class="form-select form-select-sm mt-2" required name="rol">
                    <option value="<?php echo $rol ?>"><?php echo $rol ?></option>
                    <option value="admin">Administrador</option>
                    <option value="bombero">Personal Operativo</option>
                  </select>
                </div>

                <div class="col-md-12 mt-3">
                  <a class="btn btn-warning mb-2 w-25" id="botonFakeGuardarPersona" onclick="validarContrasenaIgual()"><i class="fa-solid fa-floppy-disk"></i> Guardar Cambios</a>
                  <button type="submit" class="btn btn-warning mb-2 w-25" id="botonGuardarPersona">
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
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
  <script src="../../../js/components/personal.js"></script>
  <script>


  </script>
</body>

</html>