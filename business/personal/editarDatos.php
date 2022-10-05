<?php

include('../../data/conection.php');

error_reporting(0);

$idPersona = $_POST['idPersonaAEditar'];
$nombre = $_POST['nombre'];
$identificacion = $_POST['identificacion'];
$fechaNacimiento = $_POST['fechaNacimiento'];
$telefono = $_POST['telefono'];
$cargo = $_POST['cargo'];
$codigo = $_POST['codigo'];
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];
$rol = $_POST['rol'];

$query = "CALL editarPersonalPorID('$idPersona','$nombre','$identificacion','$fechaNacimiento','$telefono','$cargo','$codigo','$usuario','$contrasena','$rol');";

$result = mysqli_query($conexion, $query);
while (mysqli_next_result($conexion)) {;}

if($result == 1){
    echo'<script type="text/javascript">
        window.location.href="../../view/components/personal.php?success=ok";
    </script>';
}
else{
    echo'<script type="text/javascript">
        window.location.href="../../view/components/personal.php?success=error";
    </script>';
}

mysqli_free_result($result);
clearstatcache();

?>