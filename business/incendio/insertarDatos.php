<?php

include("../../data/conection.php");

error_reporting(0);

$controlCorrelativo = $_POST['controlCorrelativo'];
$fechaActual = $_POST['fechaGeneracion'];
$horaActual = $_POST['horaGeneracion'];
$telefonistaId = $_POST['telefonista'];
$nombreSolicitante = $_POST['nombreSolicitante'];
$motivoLlamado = $_POST['motivoLlamado'];
$direccionSolicitante = $_POST['direccionSolicitante'];
$telefono = $_POST['telefono'];
$observaciones = $_POST['observaciones'];


$query = "INSERT INTO `llamado_incendio`(`controlCorrelativo`, `fechaGeneracion`, `horaGeneracion`, 
`fechaEdicion`, `horaEdicion`, `nombreSolicitante`, `telefonoSolicitante`, `motivoLlamadoSolicitante`,
`direccionSolicitante`, `observaciones`, `minutosTrabajados`, `llamadaRecibidaDe`, `salidaEstacion`,
`horaSalidaEstacion`, `entradaEstacion`, `horaEntradaEstacion`, `propietarioInmueble`, 
`sitioDondePrincipioElIncendio`, `causasIncendio`, `valorAproximadoInmueble`, `montoAproximadoPerdidasInmueble`,
`compañiaAseguradoraInmueble`, `propietarioVehiculo`, `conductorVehiculo`, `descripcionTipoVehiculo`, 
`marcaVehiculo`, `modeloVehiculo`, `placasVehiculo`, `velorAproximadoVehiculo`, `perdidasAproximadoVehiculo`, 
`compañiaAseguradoraVehiculo`, `fkTelefonista`, `fkPiloto`, `fkPersonalDestacado`, `fkUnidadUtilizada`) 
VALUES ('$controlCorrelativo','$fechaActual','$horaActual',
'PENDIENTE','PENDIENTE','$nombreSolicitante',
'$telefono','$motivoLlamado','$direccionSolicitante','$observaciones',
'PENDIENTE','PENDIENTE',
'PENDIENTE','PENDIENTE','PENDIENTE','PENDIENTE','PENDIENTE','PENDIENTE',
'PENDIENTE','PENDIENTE','PENDIENTE','PENDIENTE','PENDIENTE','PENDIENTE',
'PENDIENTE','PENDIENTE','PENDIENTE','PENDIENTE','PENDIENTE','PENDIENTE',
'PENDIENTE','$telefonistaId','1','1','1')";   


$result = mysqli_query($conexion, $query);
while (mysqli_next_result($conexion)) {;}

if($result == 1){
    echo'<script type="text/javascript">
        window.location.href="../../view/components/incendio.php?success=ok";
    </script>';
}
else{
    echo'<script type="text/javascript">
        window.location.href="../../view/components/incendio.php?success=error";
    </script>';
}

mysqli_free_result($result);
clearstatcache();
