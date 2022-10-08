<div class="table-responsive mt-1">

    <a href="../../business/matenimientobd/exportar_tablas_llamados/exportarDatosVarios.php" class="btn btn-success">Exportar a Excel</a>

    <table class="table text-center">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Fecha de Generación</th>
                <th scope="col">Hora de Generacion</th>
                <th scope="col">Control Correlativo</th>
                <th scope="col">Nombre Solicitante</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Motivo del Llamado</th>
                <th scope="col">Dirección Solicitante</th>
                <th scope="col">Minutos Trabajados</th>
                <th scope="col">Clase de Servicio</th>
                <th scope="col">Hora Entrada Estacion</th>
                <th scope="col">Hora Salida Estacion</th>
                <th scope="col">Telefonista</th>
                <th scope="col">Piloto</th>
                <th scope="col">Personal Destacado</th>
                <th scope="col">Unidad Utilizada</th>
                <th scope="col">Observaciones</th>
                <th scope="col">Reporte</th>
                <th scope="col">Editar</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php

                $conexion = mysqli_connect('localhost', 'root', '', 'bomberos_voluntarios_vn');

                if (!$conexion) {
                    die("No hay conexiones existentes: " . mysqli_connect_error());
                }


                $query = "SELECT llamadovarios.idLlamado,llamadovarios.controlCorrelativo,llamadovarios.fechaGeneracion,
                llamadovarios.horaGeneracion,llamadovarios.fechaEdicion,llamadovarios.horaEdicion, 
                llamadovarios.nombreSolicitante,llamadovarios.motivoLlamadoSolicitante,
                llamadovarios.direccionSolicitante,llamadovarios.observaciones, llamadovarios.minutosTrabajados,
                llamadovarios.solicitudPorTelefono,llamadovarios.motivoLlamadoSolicitante,llamadovarios.claseDeServicio,
                llamadovarios.horaSalidaEstacion,llamadovarios.horaEntradaEstacion,
                personal1.nombreCompleto,personal2.nombreCompleto,personal3.nombreCompleto,unidades.nombreUnidad 
                FROM llamado_servicios_varios llamadovarios
                INNER JOIN personal_estacion personal1 ON llamadovarios.fkTelefonista = personal1.idPersona 
                INNER JOIN personal_estacion personal2 ON llamadovarios.fkPiloto = personal2.idPersona 
                INNER JOIN personal_estacion personal3 ON llamadovarios.fkPersonalDestacado = personal3.idPersona 
                INNER JOIN unidades_estacion unidades ON llamadovarios.fkUnidadUtilizada = unidades.idUnidad
                ORDER BY llamadovarios.fechaGeneracion DESC;";

                $result = mysqli_query($conexion, $query);

                while ($mostrar = mysqli_fetch_array($result)) {
                    $idLlamado = $mostrar['idLlamado'];
                    $fechaGeneracion = $mostrar['fechaGeneracion'];
                    $horaGeneracion = $mostrar['horaGeneracion'];
                    $controlCorrelativo = $mostrar['controlCorrelativo'];
                    $nombreSolicitante = $mostrar['nombreSolicitante'];
                    $telefono = $mostrar['solicitudPorTelefono'];
                    $motivoLlamado = $mostrar['motivoLlamadoSolicitante'];
                    $direccionSolicitante = $mostrar['direccionSolicitante'];
                    $observaciones = $mostrar['observaciones'];
                    $minutosTrabajados = $mostrar['minutosTrabajados'];
                    $claseDeServicio = $mostrar['claseDeServicio'];
                    $horaEntradaEstacion = $mostrar['horaEntradaEstacion'];
                    $horaSalidaEstacion = $mostrar['horaSalidaEstacion'];
                    $fkTelefonista = $mostrar[18];
                    $fkPiloto = $mostrar[19];
                    $fkPersonalDestacado = $mostrar[20];
                    $fkUnidadUtilizada = $mostrar[21];
                ?>
                    <td><?php echo $idLlamado ?></td>
                    <td><?php echo $fechaGeneracion ?></td>
                    <td><?php echo $horaEntradaEstacion ?></td>
                    <td><?php echo $controlCorrelativo ?></td>
                    <td><?php echo $nombreSolicitante ?></td>
                    <td><?php echo $telefono ?></td>
                    <td><?php echo $motivoLlamado ?></td>
                    <td><?php echo $direccionSolicitante ?></td>
                    <td><?php echo $minutosTrabajados ?></td>
                    <td><?php echo $claseDeServicio ?></td>
                    <td><?php echo $horaEntradaEstacion ?></td>
                    <td><?php echo $horaSalidaEstacion ?></td>
                    <td><?php echo $fkTelefonista ?></td>
                    <td><?php echo $fkPiloto ?></td>
                    <td><?php echo $fkPersonalDestacado ?></td>
                    <td><?php echo $$fkUnidadUtilizada ?></td>
                    <td><?php echo $observaciones ?></td>
                    <td class="text-center"><a href="../../business/reportes/reporteServiciosVarios.php?search=<?php echo $idLlamado; ?>" class="btn btn-danger"><i class="fa-solid fa-file-pdf"></i></a></td>
                    <td class="text-center">
                        <a href="../../view/components/edicion/varios.php?search=<?php echo $idLlamado; ?>" class="btn btn-success">
                            <i class="fa-solid fa-pen"></i></a>
                    </td>
            </tr>
        <?php
                }
        ?>
        </tbody>
    </table>
</div>