<?php

error_reporting(0);

include('../../../data/conection.php');

$identificacion = $_POST['identificacion'];
$codigoIngresado = $_POST['codigoIngresado'];

if ($codigoIngresado == "" || $codigoIngresado == null) {
    echo '<script type="text/javascript">
        window.location.href="../../../index.php?status=2";
    </script>';
} else {
    $query = "CALL consultarPersonalPorIdentificacion('$identificacion');";
}

$result = mysqli_query($conexion, $query);

$row = mysqli_fetch_assoc($result);

if ($row > 0) {
    //los datos son correctos lo cual está bien
} else {
    echo '<script type="text/javascript">
        window.location.href="../../../index.php?status=2";
    </script>';
}

mysqli_free_result($result);
clearstatcache();

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Sistema local, Bomberos de VN" />
    <meta name="keywords" content="HTML5, CSS3, Bootstrap 5, JavaScript, PHP" />
    <meta name="author" content="UMG" />
    <meta name="copyright" content="UMG" />
    <meta name="robots" content="index" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

    <!-- Font type -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">


    <!-- Local CSS -->
    <link rel="stylesheet" href="../../../css/login.css" />

    <!-- icon -->
    <link rel="icon" href="../../../img/log.png">

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/be221c52b4.js" crossorigin="anonymous"></script>

    <!-- SweetAlert2 Library -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>Cambio de Clave</title>
</head>

<body>
    <header>
        <!-- Empty -->
    </header>

    <!-- Start main site content -->
    <div class="container-sm">
        <main class="login-card">
            <div class="principal-container">
                <div class="card">
                    <div class="card-body">
                        <div class="principal-img text-center">
                            <img src="../../../img/logo.jpg" alt="logo-img" width="119" height="119" class="d-inline-block align-text-top mt-2" loading="lazy" />
                            <p class="h5 mt-4 fw-bold">Bomberos Voluntarios</p>
                            <p class="mt-1 mb-2 text-muted">Recuperación de Contraseña</p>
                        </div>

                        <hr />

                        <div class="login-container mt-4">
                            <form class="login-form" action="../../../business/login/credenciales/editarClave.php" method="POST">

                                <input type="text" class="form-control" value="<?php echo $identificacion ?>" name="identificacion" hidden>
                                <input type="text" class="form-control" placeholder="Nueva contraseña" name="nuevaContrasena" required />

                                <div class="action-buttons text-center mt-3">
                                    <button type="submit" class="btn btn-success">Guardar Cambios</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-footer bg-light text-center mt-2">
                        <p class="text-muted">Recuerda crear una contraseña que recuerdes y no sea fácil de adivinar.</p>
                    </div>
                </div>
            </div>
        </main>
        <!-- End main site content -->
    </div>
    <!-- End principal container -->

    <!-- Start Top Footer -->
    <footer>
        <!-- Empty -->
    </footer>
    <!-- End Top Footer -->

    <!-- Bootstrap Bundle with Popper -->
    <script src="../../../js/login.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>