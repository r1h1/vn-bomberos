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
$llamadaRecibidaDe = $_POST[''];
$salidaEstacion = $_POST[''];
$horaSalidaEstacion = $_POST[''];
$entradaEstacion = $_POST[''];
$horaEntradaEstacion = $_POST[''];
$propietarioInmueble = $_POST[''];
$sitioDondePrincipioElIncendio = $_POST[''];
$causasIncendio = $_POST[''];
$valorAproximadoInmueble = $_POST[''];
$montoAproximadoPerdidasInmueble = $_POST[''];
$compañiaAseguradoraInmueble = $_POST[''];
$propietarioVehiculo = $_POST[''];
$conductorVehiculo = $_POST[''];
$descripcionTipoVehiculo = $_POST[''];
$marcaVehiculo = $_POST[''];
$modeloVehiculo = $_POST[''];
$placasVehiculo = $_POST[''];
$valorAproximadoVehiculo = $_POST[''];
$perdidasAproximadoVehiculo = $_POST[''];
$compañiaAseguradoraVehiculo = $_POST[''];
$fkTelefonista = $_POST[''];
$fkPiloto = $_POST[''];
$fkPersonalDestacado = $_POST[''];
$fkUnidadUtilizada = $_POST[''];


$query = "UPDATE `llamado_incendio` SET `controlCorrelativo`='$controlCorrelativo',
`fechaEdicion`='$fechaEdicion',`horaEdicion`='$horaEdicion',
`nombreSolicitante`='$nombreSolicitante',`telefonoSolicitante`='$telefono',
`motivoLlamadoSolicitante`='$motivoLlamado',`direccionSolicitante`='$direccionSolicitante',
`observaciones`='$observaciones',`minutosTrabajados`='$minutosTrabajados',
`llamadaRecibidaDe`='$llamadaRecibidaDe',
`horaSalidaEstacion`='$horaSalidaEstacion',
`horaEntradaEstacion`='$horaEntradaEstacion',`propietarioInmueble`='$propietarioInmueble',
`sitioDondePrincipioElIncendio`='[value-19]',`causasIncendio`='[value-20]',
`valorAproximadoInmueble`='[value-21]',`montoAproximadoPerdidasInmueble`='[value-22]',
`compañiaAseguradoraInmueble`='[value-23]',`propietarioVehiculo`='[value-24]',
`conductorVehiculo`='[value-25]',`descripcionTipoVehiculo`='[value-26]',
`marcaVehiculo`='[value-27]',`modeloVehiculo`='[value-28]',`placasVehiculo`='[value-29]',
`valorAproximadoVehiculo`='[value-30]',`perdidasAproximadoVehiculo`='[value-31]',
`compañiaAseguradoraVehiculo`='[value-32]',`fkTelefonista`='[value-33]',
`fkPiloto`='[value-34]',`fkPersonalDestacado`='[value-35]',
`fkUnidadUtilizada`='[value-36]' 
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