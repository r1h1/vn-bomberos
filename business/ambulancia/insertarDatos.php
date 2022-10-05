<?php

include("../../data/conection.php");


$controlCorrelativo = $_POST['controlCorrelativo'];
$fechaActual = $_POST['fechaGeneracion'];
$horaActual = $_POST['horaGeneracion'];
$telefonistaId = $_POST['telefonista'];
$nombreSolicitante = $_POST['nombreSolicitante'];
$motivoLlamado = $_POST['motivoLlamado'];
$direccionSolicitante = $_POST['direccionSolicitante'];
$telefono = $_POST['telefono'];
$observaciones = $_POST['observaciones'];


$query = "CALL insertarLlamadoAmbulancia('$controlCorrelativo','$fechaActual','$horaActual',
'$telefonistaId','$nombreSolicitante','$motivoLlamado','$direccionSolicitante','$telefono',
'$observaciones');";   


$result = mysqli_query($conexion, $query);
while (mysqli_next_result($conexion)) {;}

if($result == 1){
    echo'<script type="text/javascript">
        window.location.href="../../view/components/ambulancia.php?success=ok";
    </script>';
}
else{
    echo'<script type="text/javascript">
        window.location.href="../../view/components/ambulancia.php?success=error";
    </script>';
}

mysqli_free_result($result);
clearstatcache();
