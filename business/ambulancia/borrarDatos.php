<?php

include('../../data/conection.php');

error_reporting(0);

$idParaBorrar = $_GET['search'];


$query = "CALL borrarLlamadoAmbulanciaPorID('$idParaBorrar');";


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