<?php

include('../../data/conection.php');

error_reporting(0);


$idEdicion = $_POST['idEdicionID'];
$fechaEdicion = $_POST['fechaEdicion'];
$horaEdicion = $_POST['horaEdicion'];
$controlCorrelativo = $_POST['controlCorrelativo'];
$nombreSolicitante = $_POST['nombreSolicitante'];
$telefono = $_POST['telefono'];
$motivoLlamado = $_POST['motivoLlamado'];
$direccionSolicitante = $_POST['direccionSolicitante'];
$observaciones = $_POST['observaciones'];
$minutosTrabajados = $_POST['minutosTrabajados'];
$solicitudPorTelefono = $_POST['solicitudPorTelefono'];
$claseDeServicio = $_POST['claseDeServicio'];
$horaEntradaEstacion = $_POST['horaEntradaEstacion'];
$horaSalidaEstacion = $_POST['horaSalidaEstacion'];
$fkPiloto = $_POST['fkPiloto'];
$fkPersonalDestacado = $_POST['fkPersonalDestacado'];
$fkUnidadUtilizada = $_POST['fkUnidadUtilizada'];



$query = "UPDATE `llamado_servicios_varios` SET `controlCorrelativo`='$controlCorrelativo',
`fechaEdicion`='$fechaEdicion',`horaEdicion`='$horaEdicion',`nombreSolicitante`='$nombreSolicitante',
`telefonoSolicitante`='$telefono',`motivoLlamadoSolicitante`='$motivoLlamado',
`direccionSolicitante`='$direccionSolicitante',`observaciones`='$observaciones',
`minutosTrabajados`='$minutosTrabajados',`solicitudPorTelefono`='$solicitudPorTelefono',
`claseDeServicio`='$claseDeServicio',`horaSalidaEstacion`='$horaSalidaEstacion',
`horaEntradaEstacion`='$horaEntradaEstacion',`fkPiloto`='$fkPiloto',
`fkPersonalDestacado`='$fkPersonalDestacado',`fkUnidadUtilizada`='$fkUnidadUtilizada'
WHERE `idLlamado`='$idEdicion'";




$result = mysqli_query($conexion, $query);
while (mysqli_next_result($conexion)) {;}

if($result == 1){
    echo'<script type="text/javascript">
        window.location.href="../../view/components/varios.php?success=ok";
    </script>';
}
else{
    echo'<script type="text/javascript">
        window.location.href="../../view/components/varios.php?success=error";
    </script>';
}

mysqli_free_result($result);
clearstatcache();

?>