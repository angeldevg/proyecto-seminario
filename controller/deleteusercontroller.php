<?php

include("../model/dao/conexion.php");

    if(isset($_GET['id'])){
    
        $id = $_GET['id'];
        $query = "DELETE FROM usuarios WHERE id_usuario =  $id";
    
        $result = mysqli_query($conn, $query);
    
        if(!$result){
    
            die("Failed");
        }
    
        header("Location: ../view/usuarios.php");
    
        
    }
    
    ?> 