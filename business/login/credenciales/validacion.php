<?php

include('../../../data/conection.php');

error_reporting(0);

$sUsuario = $_POST['usuario'];
$sClave = $_POST['clave'];


$sql = "CALL inicioDeSesionSistema('$sUsuario','$sClave');";

$resultado = mysqli_query($conexion, $sql);

while (mysqli_next_result($conexion)) {;
}

$filas = mysqli_num_rows($resultado);


while ($mostrar =  mysqli_fetch_array($resultado)) {
    $permiso = $mostrar['rolPermisos'];
    $nombrecompleto = $mostrar['nombreCompleto'];
}

//SI LOS DATOS COINCIDEN, SE REDIRIGE AL DASHBOARD
if ($filas > 0) {

    //INICIAMOS SESIÓN Y ALMACENAMOS
    session_start();
    $_SESSION['usuario'] = $sUsuario;
    $_SESSION['rol'] = $permiso;
    $_SESSION['nombre'] = $nombrecompleto;

    header("location:../../../view/administracion.php");
    
}


//SI LOS DATOS NO COINCIDEN, NO SE REDIRIGE AL DASHBOARD
else {
    header("location:../../../index.php?status=1");
}

//LIBERAR MEMORIA DE LOS DATOS
mysqli_free_result($resultado);

clearstatcache();

?>