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
$llamadaRecibidaDe = $_POST['llamadaRecibidaDe'];
$salidaEstacion = $_POST['salidaEstacion'];
$horaSalidaEstacion = $_POST['horaSalidaEstacion'];
$entradaEstacion = $_POST['entradaEstacion'];
$horaEntradaEstacion = $_POST['horaEntradaEstacion'];
$propietarioInmueble = $_POST['propietarioInmueble'];
$sitioDondePrincipioElIncendio = $_POST['sitiodondePrincipioElIncendio'];
$causasIncendio = $_POST['causasIncendio'];
$valorAproximadoInmueble = $_POST['valorAproximadoInmueble'];
$montoAproximadoPerdidasInmueble = $_POST['montoAproximadoPerdidasInmueble'];
$compañiaAseguradoraInmueble = $_POST['compañiaAseguradoraInmueble'];
$propietarioVehiculo = $_POST['propietarioVehiculo'];
$conductorVehiculo = $_POST['conductorVehiculo'];
$descripcionTipoVehiculo = $_POST['descripcionTipoVehiculo'];
$marcaVehiculo = $_POST['marcaVehiculo'];
$modeloVehiculo = $_POST['modeloVehiculo'];
$placasVehiculo = $_POST['placasVehiculo'];
$valorAproximadoVehiculo = $_POST['valorAproximadoVehiculo'];
$perdidasAproximadoVehiculo = $_POST['perdidasAproximadoVehiculo'];
$compañiaAseguradoraVehiculo = $_POST['compañiaAseguradoraVehiculo'];
$fkPiloto = $_POST['fkPiloto'];
$fkPersonalDestacado = $_POST['fkPersonalDestacado'];
$fkUnidadUtilizada = $_POST['fkUnidadUtilizada'];


$query = "UPDATE `llamado_incendio` SET `controlCorrelativo`='$controlCorrelativo',
`fechaEdicion`='$fechaEdicion',`horaEdicion`='$horaEdicion',
`nombreSolicitante`='$nombreSolicitante',`telefonoSolicitante`='$telefono',
`motivoLlamadoSolicitante`='$motivoLlamado',`direccionSolicitante`='$direccionSolicitante',
`observaciones`='$observaciones',`minutosTrabajados`='$minutosTrabajados',
`llamadaRecibidaDe`='$llamadaRecibidaDe',
`horaSalidaEstacion`='$horaSalidaEstacion',
`horaEntradaEstacion`='$horaEntradaEstacion',`propietarioInmueble`='$propietarioInmueble',
`sitioDondePrincipioElIncendio`='$sitioDondePrincipioElIncendio',`causasIncendio`='$causasIncendio',
`valorAproximadoInmueble`='$valorAproximadoInmueble',`montoAproximadoPerdidasInmueble`='$montoAproximadoPerdidasInmueble',
`compañiaAseguradoraInmueble`='$compañiaAseguradoraInmueble',`propietarioVehiculo`='$propietarioVehiculo',
`conductorVehiculo`='$conductorVehiculo',`descripcionTipoVehiculo`='$descripcionTipoVehiculo',
`marcaVehiculo`='$marcaVehiculo',`modeloVehiculo`='$modeloVehiculo',`placasVehiculo`='$placasVehiculo',
`valorAproximadoVehiculo`='$valorAproximadoVehiculo',`perdidasAproximadoVehiculo`='$perdidasAproximadoVehiculo',
`compañiaAseguradoraVehiculo`='$compañiaAseguradoraVehiculo',
`fkPiloto`='$fkPiloto',`fkPersonalDestacado`='$fkPersonalDestacado',
`fkUnidadUtilizada`='$fkUnidadUtilizada' 
WHERE `idLlamado`='$idEdicion'";




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



?>