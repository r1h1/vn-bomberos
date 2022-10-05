<?php

session_start();
$varsesion = $_SESSION['usuario'];

include('../../data/conection.php');

error_reporting(0);

$fechaDelDia = $_POST['fechaDelDiaActual'];
$usuario = $_POST['usuarioLogueado'];


if($usuario == $varsesion){
    $query = "DELETE FROM llamado_rescate WHERE fechaGeneracion NOT IN ('$fechaDelDia');";
}
else{
    echo'<script type="text/javascript">
        window.location.href="../../view/components/mantenimiento-bd.php?success=2";
    </script>';
}


$result = mysqli_query($conexion, $query);
while (mysqli_next_result($conexion)) {;}


if($result == 1){
    echo'<script type="text/javascript">
        window.location.href="../../view/components/mantenimiento-bd.php?success=1";
    </script>';
}
else{
    echo'<script type="text/javascript">
        window.location.href="../../view/components/mantenimiento-bd.php?success=2";
    </script>';
}

mysqli_free_result($result);
clearstatcache();

?>