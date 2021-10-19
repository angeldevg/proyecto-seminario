<!doctype html>
<html lang="en">
  <head>
    <title>Modificar</title>
    <link rel="shortcut icon" href="https://thumbs.dreamstime.com/b/a%C3%B1ada-el-verde-digital-del-nuevo-de-usuario-icono-la-cuenta-118747551.jpg"> 
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <!--CSS-->
        <link rel="stylesheet" href="../css/style.css">
  
</head>
  <body>

    
    <?php

    session_start();
    
    $nom = $_SESSION["usuario"];
    
    if(!isset($_SESSION["usuario"])){
      echo header("Location: ../../View/controlpanel.php");
    }
    
    
    ?>


    <header>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <div class="container">
                <div class="row">
        
                  <div class="col-sm-3">
                  
                    <form class="form-inline" action="/action_page.php">
                      <div class="input-group">
                        <h2 class="username"><?php  echo"@" . $nom; ?></h2>
                      </div>
                    </form>
                    
                  </div>
        
             <div class="col-sm-7">
        
                    
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
        
                </div>
        
              </div>
  
              <div class="col-xl-2 ">
                  <form action="../model/dao/CerrarSesion.php">
                     <input type="submit" class="btn btn-success" value="Cerrar Sesion" />
                 </form>
              </div>
      
              </div>
        </nav>
    </header>


    <section class="formulario">
        
        <div class="container my-5">

            <div class="row">

                <div class="columna1 col-sm-12 justify-content-center">

                    <div class="card">
                        <div class="card-header text-center">
                            <div class="card-title">
                                <h2>Modificar usuario</h2>
                            </div>
                        </div>
                    </div>
                    
                </div>

            </div>

        </div>

    </section>


    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">

                </div>

                <div class="col-sm-6">

                    <div class="card">
                        <div class="card-body">

                            <form class="form-group justify-content-center" action="../controller/addusercontroller.php" method="post">
                                <div class="form-group">
                                    <?php 
                                        include("../model/dao/conexion.php");
                                        
                                        if(isset($_GET['id'])){
                                        
                                            $id = $_GET['id'];
                                            $query = "SELECT u.id_usuario id, u.usuario, u.pass, u.idtipo_usuario idtipo, t.tipo_usuario tipo from usuarios u, tipos_usuario t where u.idtipo_usuario = t.idtipo_usuario and id_usuario = $id;";
                                            $resul = mysqli_query($conn, $query);
                                        
                                            if(mysqli_num_rows($resul) == 1){
                                        
                                                $row  = mysqli_fetch_array($resul);
                                        
                                                $id = $row['id'];
                                                $usuario = $row['usuario'];
                                                $pass = $row['pass'];
                                                $idtipo = $row['idtipo'];
                                                $tipo = $row['tipo'];
                                                
                                            }
                                        }

                                    ?>

                                    <input type="hidden" name="txt_id" id="txt_id" class="form-control" value="<?php echo $id; ?>">
        
                                    <label for="lbl_usuario">Usuario</label>
                                    <input type="text" name="txt_usuario" id="txt_usuario" class="form-control" placeholder="User" required value="<?php echo $usuario; ?>">
                  
                                    <label for="lbl_apellidos">Password</label>
                                    <input type="password" name="txt_pass" id="txt_pass" class="form-control" placeholder="Password" required value="<?php echo $pass; ?>">
        
                                    <label for="lbl_rol">Tipo Usuario</label>
                                    <select name="drop_tipo" id="drop_tipo" class="form-control" required>
                                    
                                    <!--Llenar Combo-->
                                    <option value="<?php echo $idtipo ?>"> <?php echo $tipo ?> </option>
                                      <?php
                  
                                          include("../model/dao/usuariosDao.php");

                                          while($fila = $resultado->fetch_assoc()){
                                              echo "<option value='".$fila['id']."'>".$fila['tipo_usuario']."</option>";
                  
                                          }
                                      ?>
                  
                                    </select>
                                </div>

                                <input  type="submit" class="btn btn-primary mt-3" name="btn_modificar" id="btn_modificar" value="Actualizar">
                            </form>

                        </div>
                    </div>

                </div>

                <div class="col-sm-3">

                </div>


            </div>
        </div>
    </section>



      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>