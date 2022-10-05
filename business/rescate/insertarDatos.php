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


$query = "INSERT INTO `llamado_rescate`(`controlCorrelativo`, `fechaGeneracion`, `horaGeneracion`, `fechaEdicion`, 
`horaEdicion`, `nombreSolicitante`, `telefonoSolicitante`, `motivoLlamadoSolicitante`, 
`direccionSolicitante`, `observaciones`, `minutosTrabajados`, `formaDeAvisoPorTelefono`, 
`salidaEstacion`, `horaSalidaEstacion`, `entradaEstacion`, `horaEntradaEstacion`, 
`nombreRescatados`, `edadRescatados`, `trasladoHacia`, `fkTelefonista`, `fkPiloto`, `fkPersonalDestacado`, `fkUnidadUtilizada`) 
VALUES ('$controlCorrelativo','$fechaActual','$horaActual','PENDIENTE','PENDIENTE','$nombreSolicitante','$telefono','$motivoLlamado',
'$direccionSolicitante','$observaciones','PENDIENTE','PENDIENTE','25 CIA','PENDIENTE','25 CIA','PENDIENTE',
'PENDIENTE','PENDIENTE','PENDIENTE','$telefonistaId','1','1','1');";   


$result = mysqli_query($conexion, $query);
while (mysqli_next_result($conexion)) {;}

if($result == 1){
    echo'<script type="text/javascript">
        window.location.href="../../view/components/rescate.php?success=ok";
    </script>';
}
else{
    echo'<script type="text/javascript">
        window.location.href="../../view/components/rescate.php?success=error";
    </script>';
}

mysqli_free_result($result);
clearstatcache();
