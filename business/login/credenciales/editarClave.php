<?php

include('../../../data/conection.php');

error_reporting(0);

$identificacion = $_POST['identificacion'];
$nuevaContrasena = $_POST['nuevaContrasena'];

if ($identificacion == "" || $nuevaContrasena == null) {
    echo '<script type="text/javascript">
        window.location.href="../../../index.php?status=2";
    </script>';
} 

else {
    $query = "CALL cambiarContrasenaPersonalPorIdentificacion('$nuevaContrasena','$identificacion');";
}

$result = mysqli_query($conexion, $query);

if ($result == 1) {
    echo '<script type="text/javascript">
        window.location.href="../../../index.php?status=3";
    </script>';
} else {
    echo '<script type="text/javascript">
        window.location.href="../../../index.php?status=2";
    </script>';
}

mysqli_free_result($result);
clearstatcache();

?>