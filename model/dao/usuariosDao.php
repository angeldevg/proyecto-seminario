<?php

    include("conexion.php");



//select tipo_usuario
    $conn -> real_query("SELECT idtipo_usuario id, tipo_usuario FROM tipos_usuario;");
                                     
    $resultado = $conn-> use_result();

?>