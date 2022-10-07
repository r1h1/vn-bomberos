<?php

if (isset($_GET['buscarCategoria'])) {
    $categoriaMostrar = $_GET['categoria'];

    if ($categoriaMostrar == '1') {
        include('datosBusqueda/ambulancia.php');
    }
    if ($categoriaMostrar == '2') {
        include('datosBusqueda/incendio.php');
    }
    if ($categoriaMostrar == '3') {
        include('datosBusqueda/rescate.php');
    }
    if($categoriaMostrar == '4'){
        include('datosBusqueda/serviciosVarios.php');
    }
} else {
?>
    <div class="table-responsive mt-5">
        <table class="table text-center">
            <thead>
                <tr>
                    <th scope="col">-- No has seleccionado una Categoria para buscar --</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Lo sentimos, no hemos encontrado datos.</td>
                </tr>
            </tbody>
        </table>
    </div>
<?php
}
?>