<div class="table-responsive mt-1">
    <table class="table text-center">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Control Correlativo</th>
                <th scope="col">Fecha de Generación</th>
                <th scope="col">Hora de Generacion</th>
                <th scope="col">Nombre Solicitante</th>
                <th scope="col">Motivo del Llamado</th>
                <th scope="col">Dirección Solicitante</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Minutos Trabajados</th>
                <th scope="col">Hora Salida Estacion</th>
                <th scope="col">Hora Entrada Estacion</th>
                <th scope="col">Cantidad de Pacientes Atendidos</th>
                <th scope="col">Nombre Paciente</th>
                <th scope="col">Nombre Acompañante</th>
                <th scope="col">Trasladado Hacia</th>
                <th scope="col">Cantidad Fallecidos</th>
                <th scope="col">Nombre Fallecidos</th>
                <th scope="col">Piloto</th>
                <th scope="col">Personal Destacado</th>
                <th scope="col">Unidad Utilizada</th>
                <th scope="col">Tipo de Servicio</th>
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


                $query = "SELECT llamadoa.idLlamado,llamadoa.controlCorrelativo,llamadoa.fechaGeneracion,
                            llamadoa.horaGeneracion,llamadoa.fechaEdicion,llamadoa.horaEdicion, 
                            llamadoa.nombreSolicitante,llamadoa.telefonoSolicitante,llamadoa.motivoLlamadoSolicitante,
                            llamadoa.direccionSolicitante,llamadoa.observaciones, llamadoa.minutosTrabajados,
                            llamadoa.salidaEstacion,llamadoa.horaSalidaEstacion,llamadoa.entradaEstacion,
                            llamadoa.horaEntradaEstacion, llamadoa.cantidadPacientesAtendidos,
                            llamadoa.nombrePacienteAtendido,llamadoa.cantidadDeFallecidos,llamadoa.fallecidosEnIncidente, 
                            llamadoa.edadPaciente, llamadoa.nombreAcompañantePaciente,llamadoa.tipoDeServicioProporcionado,
                            llamadoa.trasladoHacia,personal1.nombreCompleto,personal2.nombreCompleto,personal3.nombreCompleto,
                            unidades.nombreUnidad 
                            FROM `llamado_ambulancia` llamadoa 
                            INNER JOIN personal_estacion personal1 ON llamadoa.fkTelefonista = personal1.idPersona 
                            INNER JOIN personal_estacion personal2 ON llamadoa.fkPiloto = personal2.idPersona 
                            INNER JOIN personal_estacion personal3 ON llamadoa.fkPersonalDestacado = personal3.idPersona 
                            INNER JOIN unidades_estacion unidades ON llamadoa.fkUnidadUtilizada = unidades.idUnidad
                            ORDER BY llamadoa.fechaGeneracion DESC;";

                $result = mysqli_query($conexion, $query);

                while ($mostrar = mysqli_fetch_array($result)) {
                    $idLlamado = $mostrar[0];
                    $controlCorrelativo = $mostrar[1];
                    $fechaGeneracion = $mostrar[2];
                    $horaGeneracion = $mostrar[3];
                    $nombreSolicitante = $mostrar[6];
                    $motivoLlamado = $mostrar[8];
                    $direccionSolicitante = $mostrar[9];
                    $telefono = $mostrar[7];
                    $minutosTrabajados = $mostrar[11];
                    $horaSalidaEstacion = $mostrar[13];
                    $horaEntradaEstacion = $mostrar[15];
                    $cantidadPacientesAtendidos = $mostrar[16];
                    $nombrePaciente = $mostrar[17];
                    $edadPaciente = $mostrar[20];
                    $nombreAcompanante = $mostrar[21];
                    $trasladoHacia = $mostrar[23];
                    $cantidadFallecidos = $mostrar[18];
                    $nombreFallecidos = $mostrar[19];
                    $fkPiloto = $mostrar[25];
                    $fkPersonalDestacado = $mostrar[26];
                    $fkUnidadUtilizada = $mostrar[27];
                    $observaciones = $mostrar[10];
                    $tipoServicio = $mostrar[23];
                ?>
                    <td><?php echo $idLlamado ?></td>
                    <td><?php echo $controlCorrelativo ?></td>
                    <td><?php echo $fechaGeneracion ?></td>
                    <td><?php echo $horaGeneracion ?></td>
                    <td><?php echo $nombreSolicitante ?></td>
                    <td><?php echo $motivoLlamado ?></td>
                    <td><?php echo $direccionSolicitante ?></td>
                    <td><?php echo $telefono ?></td>
                    <td><?php echo $minutosTrabajados ?></td>
                    <td><?php echo $horaSalidaEstacion ?></td>
                    <td><?php echo $horaEntradaEstacion ?></td>
                    <td><?php echo $cantidadPacientesAtendidos ?></td>
                    <td><?php echo $nombrePaciente ?></td>
                    <td><?php echo $nombreAcompanante ?></td>
                    <td><?php echo $trasladoHacia ?></td>
                    <td><?php echo $cantidadFallecidos ?></td>
                    <td><?php echo $nombreFallecidos ?></td>
                    <td><?php echo $fkPiloto ?></td>
                    <td><?php echo $fkPersonalDestacado ?></td>
                    <td><?php echo $fkUnidadUtilizada ?></td>
                    <td><?php echo $tipoServicio ?></td>
                    <td><?php echo $observaciones ?></td>
                    <td></td>
                    <td class="text-center">
                        <a href="../../view/components/edicion/ambulancia.php?search=<?php echo $idLlamado; ?>" class="btn btn-success">
                            <i class="fa-solid fa-pen"></i></a>
                    </td>
            </tr>
        <?php
                }
        ?>
        </tbody>
    </table>
</div>