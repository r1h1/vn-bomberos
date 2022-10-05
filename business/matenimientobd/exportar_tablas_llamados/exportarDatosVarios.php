<?php
header("Pragma: public");
header("Expires: 0");
$filename = "llamadosServiciosVarios.xls";
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=" . $filename);
header("Pragma: no-cache");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

error_reporting(0);
?>

<h1 class="text-center">Todas las llamadas - S. Varios</h1>
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
            <th scope="col">Solicitud Por Telefono</th>
            <th scope="col">Clase de Servicio</th>
            <th scope="col">Hora de Salida Estacion</th>
            <th scope="col">Hora de Entrada Estacion</th>
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

            $query = "SELECT llamadovarios.idLlamado,llamadovarios.controlCorrelativo,llamadovarios.fechaGeneracion,
                                                    llamadovarios.horaGeneracion,llamadovarios.fechaEdicion,llamadovarios.horaEdicion,                                                    llamadovarios.nombreSolicitante,llamadovarios.telefonoSolicitante,llamadovarios.motivoLlamadoSolicitante,
                                                    llamadovarios.direccionSolicitante,llamadovarios.observaciones, llamadovarios.minutosTrabajados,
                                                    llamadovarios.solicitudPorTelefono,llamadovarios.claseDeServicio,llamadovarios.horaSalidaEstacion,
                                                    llamadovarios.horaEntradaEstacion,
                                                    personal.nombreCompleto,unidades.nombreUnidad 
                                                    FROM llamado_servicios_varios llamadovarios
                                                    INNER JOIN personal_estacion personal ON llamadovarios.fkTelefonista = personal.idPersona 
                                                    INNER JOIN unidades_estacion unidades ON llamadovarios.fkUnidadUtilizada = unidades.idUnidad
                                                    ORDER BY llamadovarios.fechaGeneracion DESC;";

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
                <td><?php echo $mostrar['solicitudPorTelefono']; ?></td>
                <td><?php echo $mostrar['claseDeServicio']; ?></td>
                <td><?php echo $mostrar['horaSalidaEstacion']; ?></td>
                <td><?php echo $mostrar['horaEntradaEstacion']; ?></td>
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