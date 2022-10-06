<?php
header("Pragma: public");
header("Expires: 0");
$filename = "llamadosIncendio.xls";
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=" . $filename);
header("Pragma: no-cache");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

error_reporting(0);
?>

<h1 class="text-center">Todas las llamadas - Incendio</h1>
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
            <th scope="col">Llamada Recibida De</th>
            <th scope="col">Salida Estacion</th>
            <th scope="col">Hora Salida Estacion</th>
            <th scope="col">Entrada Estacion</th>
            <th scope="col">Hora Entrada Estacion</th>
            <th scope="col">Propietario Inmueble</th>
            <th scope="col">Sitio Donde Principio El Incendio</th>
            <th scope="col">Causas Incendio</th>
            <th scope="col">Valor Aproximado Inmueble</th>
            <th scope="col">Monto Aproximado Perdidas Inmueble</th>
            <th scope="col">Compañia Aseguradora Inmueble</th>
            <th scope="col">Propietario Vehiculo</th>
            <th scope="col">Conductor Vehiculo</th>
            <th scope="col">Descripcion Tipo Vehiculo</th>
            <th scope="col">Marca Vehiculo</th>
            <th scope="col">Placas Vehiculo</th>
            <th scope="col">Valor Aproximado Vehiculo</th>
            <th scope="col">Perdidas Aproximado Vehiculo</th>
            <th scope="col">Compañia Aseguradora Vehiculo</th>
            <th scope="col">Telefonista</th>
            <th scope="col">Piloto</th>
            <th scope="col">Personal Destacado</th>
            <th scope="col">Unidad Utilizada</th>
        </tr>
    </thead>
    <tbody>
        <tr>

            <?php

            include('../../../data/conection.php');

            $query = "SELECT * FROM llamado_incendio";

            $result = mysqli_query($conexion, $query);

            while (mysqli_next_result($conexion)) {;
            }


            while ($mostrar = mysqli_fetch_array($result)) {

            ?>
                <td><?php echo $mostrar[0]; ?></td>
                <td><?php echo $mostrar[1]; ?></td>
                <td><?php echo $mostrar[2]; ?></td>
                <td><?php echo $mostrar[3]; ?></td>
                <td><?php echo $mostrar[4]; ?></td>
                <td><?php echo $mostrar[5]; ?></td>
                <td><?php echo $mostrar[6]; ?></td>
                <td><?php echo $mostrar[7]; ?></td>
                <td><?php echo $mostrar[8]; ?></td>
                <td><?php echo $mostrar[9]; ?></td>
                <td><?php echo $mostrar[10]; ?></td>
                <td><?php echo $mostrar[11]; ?></td>
                <td><?php echo $mostrar[12]; ?></td>
                <td><?php echo $mostrar[13]; ?></td>
                <td><?php echo $mostrar[14]; ?></td>
                <td><?php echo $mostrar[15]; ?></td>
                <td><?php echo $mostrar[16]; ?></td>
                <td><?php echo $mostrar[17]; ?></td>
                <td><?php echo $mostrar[18]; ?></td>
                <td><?php echo $mostrar[19]; ?></td>
                <td><?php echo $mostrar[20]; ?></td>
                <td><?php echo $mostrar[21]; ?></td>
                <td><?php echo $mostrar[22]; ?></td>
                <td><?php echo $mostrar[23]; ?></td>
                <td><?php echo $mostrar[24]; ?></td>
                <td><?php echo $mostrar[25]; ?></td>
                <td><?php echo $mostrar[26]; ?></td>
                <td><?php echo $mostrar[27]; ?></td>
                <td><?php echo $mostrar[28]; ?></td>
                <td><?php echo $mostrar[29]; ?></td>
                <td><?php echo $mostrar[30]; ?></td>
                <td><?php echo $mostrar[31]; ?></td>
                <td><?php echo $mostrar[32]; ?></td>
                <td><?php echo $mostrar[33]; ?></td>
                <td><?php echo $mostrar[34]; ?></td>
        </tr>
    <?php
            }
    ?>
    </tbody>
</table>