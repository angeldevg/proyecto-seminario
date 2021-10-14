<?php

if(isset($_POST["btn_agregar"])){

  include("../model/dao/conexion.php");


  $txt_usuario = utf8_decode($_POST["txt_usuario"]);
  $txt_pass = utf8_decode($_POST["txt_pass"]);
  $drop_tipo = utf8_decode($_POST["drop_tipo"]);

  $sql = "INSERT INTO USUARIOS(usuario, pass, idtipo_usuario) VALUES  ('".$txt_usuario."', '".$txt_pass."', '".$drop_tipo."')";  

  if($conn->query($sql)==true){
    $conn->close();

    echo header("Location: ../view/usuarios.php");


  }else{
    echo "Error: " . $sql . "<br>" . $conn->close();
  }

}



if(isset($_POST["btn_modificar"])){

  include("../model/dao/conexion.php");

  $txt_id = utf8_decode($_POST["txt_id"]);
  $txt_usuario = utf8_decode($_POST["txt_usuario"]);
  $txt_pass = utf8_decode($_POST["txt_pass"]);
  $drop_tipo = utf8_decode($_POST["drop_tipo"]);

  $sql = "UPDATE USUARIOS SET usuario = '".$txt_usuario."', pass = '".$txt_pass."', idtipo_usuario  = '".$drop_tipo."' WHERE ID_USUARIO = '".$txt_id."'";  

  if($conn->query($sql)==true){
    $conn->close();

    echo header("Location: ../view/usuarios.php");


  }else{
    echo "Error: " . $sql . "<br>" . $conn->close();
  }

} 

?>