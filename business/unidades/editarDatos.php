<?php

include('../../data/conection.php');

error_reporting(0);

$idEdicion = $_POST['idEdicion'];
$codigoUnidad = $_POST['codigoUnidad'];
$nombreUnidad = $_POST['nombreUnidad'];
$placasUnidad = $_POST['placasUnidad'];
$marcaUnidad = $_POST['marcaUnidad'];
$modeloUnidad = $_POST['modeloUnidad'];
$tipoUnidad = $_POST['tipoUnidad'];

$query = "CALL editarUnidadPorID('$idEdicion','$codigoUnidad','$nombreUnidad','$placasUnidad','$marcaUnidad','$modeloUnidad','$tipoUnidad');";

$result = mysqli_query($conexion, $query);
while (mysqli_next_result($conexion)) {;}

if($result == 1){
    echo'<script type="text/javascript">
        window.location.href="../../view/components/unidades.php?success=ok";
    </script>';
}
else{
    echo'<script type="text/javascript">
        window.location.href="../../view/components/unidades.php?success=error";
    </script>';
}

mysqli_free_result($result);
clearstatcache();
