<?php

include('../../data/conection.php');

error_reporting(0);


$idEdicion = $_POST['idEdicionID'];
$fechaEdicion = $_POST['fechaEdicion'];
$horaEdicion = $_POST['horaEdicion'];
$controlCorrelativo = $_POST['controlCorrelativo'];
$nombreSolicitante = $_POST['nombreSolicitante'];
$motivoLlamado = $_POST['motivoLlamado'];
$direccionSolicitante = $_POST['direccionSolicitante'];
$telefono = $_POST['telefono'];
$minutosTrabajados = $_POST['minutosTrabajados'];
$horaSalidaEstacion = $_POST['horaSalidaEstacion'];
$horaEntradaEstacion = $_POST['horaEntradaEstacion'];
$cantidadPacientesAtendidos = $_POST['cantidadPacientesAtendidos'];
$nombrePaciente = $_POST['nombrePaciente'];
$edadPaciente = $_POST['edadPaciente'];
$nombreAcompanante = $_POST['nombreAcompanante'];
$trasladoHacia = $_POST['trasladoHacia'];
$cantidadFallecidos = $_POST['cantidadFallecidos'];
$nombreFallecidos = $_POST['nombreFallecidos'];
$fkPiloto = $_POST['fkPiloto'];
$fkPersonalDestacado = $_POST['fkPersonalDestacado'];
$fkUnidadUtilizada = $_POST['fkUnidadUtilizada'];
$observaciones = $_POST['observaciones'];
$tipoServicio = $_POST['tipoServicio'];




$query = "UPDATE `llamado_ambulancia` SET `controlCorrelativo`='$controlCorrelativo',`fechaEdicion`='$fechaEdicion',
`horaEdicion`='$horaEdicion',`nombreSolicitante`='$nombreSolicitante',
`telefonoSolicitante`='$telefono',`motivoLlamadoSolicitante`='$motivoLlamado',`direccionSolicitante`='$direccionSolicitante',
`observaciones`='$observaciones',`minutosTrabajados`='$minutosTrabajados',
`horaSalidaEstacion`='$horaSalidaEstacion',`horaEntradaEstacion`='$horaEntradaEstacion',
`cantidadPacientesAtendidos`='$cantidadPacientesAtendidos',`nombrePacienteAtendido`='$nombrePaciente',`cantidadDeFallecidos`='$cantidadFallecidos',
`fallecidosEnIncidente`='$nombreFallecidos',`edadPaciente`='$edadPaciente',`nombreAcompañantePaciente`='$nombreAcompanante',
`tipoDeServicioProporcionado`='$tipoServicio',`trasladoHacia`='$trasladoHacia',
`fkPiloto`='$fkPiloto',`fkPersonalDestacado`='$fkPersonalDestacado',`fkUnidadUtilizada`='$fkUnidadUtilizada' 
WHERE `idLlamado`='$idEdicion';";




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

?>