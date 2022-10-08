<div class="table-responsive mt-1">

    <a href="../../business/matenimientobd/exportar_tablas_llamados/exportarDatosRescate.php"
    class="btn btn-success">Exportar a Excel</a>
    
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
                <th scope="col">Forma de Aviso</th>
                <th scope="col">Hora Salida Estacion</th>
                <th scope="col">Hora Entrada Estacion</th>
                <th scope="col">Nombre Rescatados</th>
                <th scope="col">Edad Rescatados</th>
                <th scope="col">Trasladado Hacia</th>
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


                $query = "SELECT llamadores.idLlamado,llamadores.controlCorrelativo,llamadores.fechaGeneracion,
                llamadores.horaGeneracion,llamadores.fechaEdicion,llamadores.horaEdicion, 
                llamadores.nombreSolicitante,llamadores.telefonoSolicitante,llamadores.motivoLlamadoSolicitante,
                llamadores.direccionSolicitante,llamadores.observaciones, llamadores.minutosTrabajados,
                llamadores.formaDeAvisoPorTelefono,
                llamadores.salidaEstacion,llamadores.horaSalidaEstacion,llamadores.entradaEstacion,
                llamadores.horaEntradaEstacion, llamadores.nombreRescatados,
                llamadores.edadRescatados,llamadores.trasladoHacia,
                personal1.nombreCompleto,personal2.nombreCompleto,personal3.nombreCompleto,unidades.nombreUnidad 
                FROM llamado_rescate llamadores
                INNER JOIN personal_estacion personal1 ON llamadores.fkTelefonista = personal1.idPersona 
                INNER JOIN personal_estacion personal2 ON llamadores.fkPiloto = personal2.idPersona 
                INNER JOIN personal_estacion personal3 ON llamadores.fkPersonalDestacado = personal3.idPersona 
                INNER JOIN unidades_estacion unidades ON llamadores.fkUnidadUtilizada = unidades.idUnidad
                ORDER BY llamadores.fechaGeneracion DESC;";

                $result = mysqli_query($conexion, $query);

                while ($mostrar = mysqli_fetch_array($result)) {
                    $idLlamado = $mostrar['idLlamado'];
                    $fechaGeneracion = $mostrar['fechaGeneracion'];
                    $horaGeneracion = $mostrar['horaGeneracion'];
                    $controlCorrelativo = $mostrar['controlCorrelativo'];
                    $nombreSolicitante = $mostrar['nombreSolicitante'];
                    $telefono = $mostrar['telefonoSolicitante'];
                    $motivoLlamado = $mostrar['motivoLlamadoSolicitante'];
                    $direccionSolicitante = $mostrar['direccionSolicitante'];
                    $observaciones = $mostrar['observaciones'];
                    $minutosTrabajados = $mostrar['minutosTrabajados'];
                    $formaDeAvisoPorTelefono = $mostrar['formaDeAvisoPorTelefono'];
                    $horaSalidaEstacion = $mostrar['horaSalidaEstacion'];
                    $horaEntradaEstacion = $mostrar['horaEntradaEstacion'];
                    $nombreRescatados = $mostrar['nombreRescatados'];
                    $edadRescatados = $mostrar['edadRescatados'];
                    $trasladoHacia = $mostrar['trasladoHacia'];
                    $fkTelefonista = $mostrar[20];
                    $fkPiloto = $mostrar[21];
                    $fkPersonalDestacado = $mostrar[22];
                    $fkUnidadUtilizada = $mostrar[23];
                ?>
                    <td><?php echo $idLlamado ?></td>
                    <td><?php echo $fechaGeneracion ?></td>
                    <td><?php echo $horaGeneracion ?></td>
                    <td><?php echo $controlCorrelativo ?></td>
                    <td><?php echo $nombreSolicitante ?></td>
                    <td><?php echo $telefono ?></td>
                    <td><?php echo $motivoLlamado ?></td>
                    <td><?php echo $direccionSolicitante ?></td>                    
                    <td><?php echo $minutosTrabajados ?></td>
                    <td><?php echo $formaDeAvisoPorTelefono ?></td>
                    <td><?php echo $horaSalidaEstacion ?></td>
                    <td><?php echo $horaEntradaEstacion ?></td>
                    <td><?php echo $nombreRescatados ?></td>
                    <td><?php echo $edadRescatados ?></td>
                    <td><?php echo $trasladoHacia ?></td>
                    <td><?php echo $fkTelefonista ?></td>
                    <td><?php echo $fkPiloto ?></td>
                    <td><?php echo $fkPersonalDestacado ?></td>
                    <td><?php echo $fkUnidadUtilizada ?></td>
                    <td><?php echo $observaciones ?></td>
                    <td class="text-center"><a href="../../business/reportes/reporteRescate.php?search=<?php echo $idLlamado; ?>"
                    class="btn btn-danger"><i class="fa-solid fa-file-pdf"></i></a></td>
                    <td class="text-center">
                        <a href="../../view/components/edicion/rescate.php?search=<?php echo $idLlamado; ?>" class="btn btn-success">
                            <i class="fa-solid fa-pen"></i></a>
                    </td>
            </tr>
        <?php
                }
        ?>
        </tbody>
    </table>
</div>