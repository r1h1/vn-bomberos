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


$query = "INSERT INTO `llamado_servicios_varios`(`controlCorrelativo`, `fechaGeneracion`, 
`horaGeneracion`, `fechaEdicion`, `horaEdicion`, 
`nombreSolicitante`, `telefonoSolicitante`, `motivoLlamadoSolicitante`, 
`direccionSolicitante`, `observaciones`, `minutosTrabajados`, `solicitudPorTelefono`, 
`claseDeServicio`, `salidaEstacion`, `horaSalidaEstacion`, `entradaEstacion`, 
`horaEntradaEstacion`, `fkTelefonista`, `fkPiloto`, `fkPersonalDestacado`, `fkUnidadUtilizada`) 
VALUES ('$controlCorrelativo','$fechaActual','$horaActual','PENDIENTE','PENDIENTE','$nombreSolicitante','$telefono',
'$motivoLlamado','$direccionSolicitante','$observaciones',
        'PENDIENTE','PENDIENTE','PENDIENTE','25 CIA','PENDIENTE','25 CIA','PENDIENTE','$telefonistaId','1','1','1')";


$result = mysqli_query($conexion, $query);
while (mysqli_next_result($conexion)) {;
}

if ($result == 1) {
    echo '<script type="text/javascript">
        window.location.href="../../view/components/varios.php?success=ok";
    </script>';
} else {
    echo '<script type="text/javascript">
        window.location.href="../../view/components/varios.php?success=error";
    </script>';
}

mysqli_free_result($result);
clearstatcache();
