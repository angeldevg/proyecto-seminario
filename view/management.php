<!doctype html>
<html lang="en">
  <head>
    <title>Panel</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!--CSS-->
    <link rel="stylesheet" href="../css/management.css">

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

    <?php 
                                        include("../model/dao/conexion.php");
                                        
                                            $query = "SELECT u.id_usuario id, u.usuario, u.pass, u.idtipo_usuario idtipo, t.tipo_usuario tipo from usuarios u, tipos_usuario t where u.idtipo_usuario = t.idtipo_usuario and u.usuario = '$nom';";
                                            $resul = mysqli_query($conn, $query);
                                        
                                                $row  = mysqli_fetch_array($resul);
                                                $tipo = $row['tipo'];

                                                if($tipo == 'admin'){
                                                  include("menuadmin.html");
                                                }else{
                                                  include("menuuser.html");
                                                }

                                               
                                                
                                            
                                    ?>



   
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../js/alerts.js"></script>

  </body>
</html>