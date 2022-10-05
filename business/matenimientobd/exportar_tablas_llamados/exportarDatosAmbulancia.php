<?php
header("Pragma: public");
header("Expires: 0");
$filename = "llamadosAmbulancia.xls";
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=" . $filename);
header("Pragma: no-cache");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

error_reporting(0);
?>

<h1 class="text-center">Todas las llamadas - Ambulancia</h1>
<br><br>

<table class="table text-center">
    <thead>
        <tr>
            <th scope="col">ID Base de Datos</th>
            <th scope="col">Codigo Correlativo</th>
            <th scope="col">Fecha Creacion</th>
            <th scope="col">Hora Creacion</th>
            <th scope="col">Fecha Edicion</th>
            <th scope="col">Hora Edicion</th>
            <th scope="col">Telefonista</th>
            <th scope="col">Nombre Solicitante</th>
            <th scope="col">Motivo Llamado</th>
            <th scope="col">Direccion</th>
            <th scope="col">Telefono</th>
            <th scope="col">Minutos Trabajados</th>
            <th scope="col">Hora de Salida Estacion</th>
            <th scope="col">Hora de Entrada Estacion</th>
            <th scope="col">Cantidad de Pacientes Atendidos</th>
            <th scope="col">Nombre de los Pacientes</th>
            <th scope="col">Edades Pacientes</th>
            <th scope="col">Nombre Acompanante</th>
            <th scope="col">Traslado Hacia</th>
            <th scope="col">Cantidad de Fallecidos</th>
            <th scope="col">Nombre de los Fallecidos</th>
            <th scope="col">Tipo de Servicio</th>
            <th scope="col">Piloto</th>
            <th scope="col">Personal Destacado</th>
            <th scope="col">Unidad Utilizada</th>
            <th scope="col">Observaciones</th>
        </tr>
    </thead>
    <tbody>
        <tr>

            <?php

            include('../../../data/conection.php');

            $query = "SELECT llamadoa.idLlamado,llamadoa.controlCorrelativo,llamadoa.fechaGeneracion,
                llamadoa.horaGeneracion,llamadoa.fechaEdicion,llamadoa.horaEdicion, 
                llamadoa.nombreSolicitante,llamadoa.telefonoSolicitante,
                llamadoa.motivoLlamadoSolicitante,
                llamadoa.direccionSolicitante,llamadoa.observaciones, llamadoa.minutosTrabajados,
                llamadoa.salidaEstacion,llamadoa.horaSalidaEstacion,llamadoa.entradaEstacion,
                llamadoa.horaEntradaEstacion, llamadoa.cantidadPacientesAtendidos,
                llamadoa.nombrePacienteAtendido,llamadoa.cantidadDeFallecidos,
                llamadoa.fallecidosEnIncidente, 
                llamadoa.edadPaciente, llamadoa.nombreAcompañantePaciente,
                llamadoa.tipoDeServicioProporcionado,
                llamadoa.trasladoHacia,personal.nombreCompleto,unidades.nombreUnidad 
                FROM `llamado_ambulancia` llamadoa 
                INNER JOIN personal_estacion personal ON llamadoa.fkTelefonista = personal.idPersona 
                INNER JOIN unidades_estacion unidades ON llamadoa.fkUnidadUtilizada = unidades.idUnidad
                ORDER BY llamadoa.fechaGeneracion ASC;";
            $result = mysqli_query($conexion, $query);

            while (mysqli_next_result($conexion)) {;
            }


            while ($mostrar = mysqli_fetch_array($result)) {

            ?>
                <td hidden><?php echo $mostrar['idLlamado']; ?></td>
                <td><?php echo $mostrar['controlCorrelativo']; ?></td>
                <td><?php echo $mostrar['fechaGeneracion']; ?></td>
                <td><?php echo $mostrar['horaGeneracion']; ?></td>
                <td><?php echo $mostrar['fechaEdicion']; ?></td>
                <td><?php echo $mostrar['horaEdicion']; ?></td>
                <td><?php echo $mostrar['nombreCompleto']; ?></td>
                <td><?php echo $mostrar['nombreSolicitante']; ?></td>
                <td><?php echo $mostrar['motivoLlamadoSolicitante']; ?></td>
                <td><?php echo $mostrar['direccionSolicitante']; ?></td>
                <td><?php echo $mostrar['telefonoSolicitante']; ?></td>
                <td><?php echo $mostrar['minutosTrabajados']; ?></td>
                <td><?php echo $mostrar['horaSalidaEstacion']; ?></td>
                <td><?php echo $mostrar['horaEntradaEstacion']; ?></td>
                <td><?php echo $mostrar['cantidadPacientesAtendidos']; ?></td>
                <td><?php echo $mostrar['nombrePacienteAtendido']; ?></td>
                <td><?php echo $mostrar['edadPaciente']; ?></td>
                <td><?php echo $mostrar['nombreAcompañantePaciente']; ?></td>
                <td><?php echo $mostrar['trasladoHacia']; ?></td>
                <td><?php echo $mostrar['cantidadDeFallecidos']; ?></td>
                <td><?php echo $mostrar['fallecidosEnIncidente']; ?></td>
                <td><?php echo $mostrar['tipoDeServicioProporcionado']; ?></td>
                <td><?php echo $mostrar['nombreCompleto']; ?></td>
                <td><?php echo $mostrar['nombreCompleto']; ?></td>
                <td><?php echo $mostrar['nombreUnidad']; ?></td>
                <td><?php echo $mostrar['observaciones']; ?></td>
        </tr>
    <?php
            }
    ?>
    </tbody>
</table>