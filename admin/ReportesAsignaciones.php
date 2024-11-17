<?php
session_start();
include 'conexion.php';

if(isset($_SESSION['NombreUsuario'])) {
     if ($_SESSION["NivelUsuario"] == 1) {
            $user = $_SESSION['NombreUsuario'];
              $codigo = $_SESSION["Codigo"];

              $consulta=mysqli_query($conexion,"select Foto from usuarios where Codigo = $codigo");                  
                while($filas=mysqli_fetch_array($consulta)){
                         $foto=$filas['Foto'];                           
                 }
        ?>
           <?php 
          $consulta1="select idDocente, concat(NombresDocente, ' ' ,ApellidosDocente) as Docentes FROM docentes";
          $docente=mysqli_query($conexion, $consulta1);
          $consulta2="select idAsignatura, NombreAsignatura from asignaturas";
          $asignatura=mysqli_query($conexion, $consulta2);
          $consulta3="select idGrupo, NumeroGrupo from grupos";
          $grupo=mysqli_query($conexion, $consulta3);
          $consulta4="select idTurno, NombreTurno from turnos";
          $turno=mysqli_query($conexion, $consulta4);
          $consulta5="select idHorario, NombreHorario from horarios";
          $horario=mysqli_query($conexion, $consulta5);


          $consulta6="select idDocente, concat(NombresDocente, ' ' ,ApellidosDocente) as Docentes FROM docentes";
          $docente2=mysqli_query($conexion, $consulta6);

          $consulta7="select idAsignatura, NombreAsignatura from asignaturas";
          $asignatura2=mysqli_query($conexion, $consulta7);

          $consulta8="select idGrupo, NumeroGrupo from grupos";
          $grupo2=mysqli_query($conexion, $consulta8);

          $consulta9="select idTurno, NombreTurno from turnos";
          $turno2=mysqli_query($conexion,$consulta9);

          $consulta10="select idHorario, NombreHorario from horarios";
          $horario2=mysqli_query($conexion,$consulta10);

         
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SIAD</title>
     <link rel="shortcut icon" href="../imagenes/politecnico.jpg" type="image/x-icon">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/modern-business.css" rel="stylesheet">
    <link href="../css/estilo.css" rel="stylesheet">
    <link href="../css/modern-business.css" rel="stylesheet">
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script src="../js/jquery.js"></script>
    <script src="js/back-to-top.js"></script>
    <script src="../js/bootstrap.min.js"></script>

</head>
<body>
           <?php
        include ('menuAdmin.php');
            ?>
       <br>
        <div class="container">
            <div class="row">
            <div class="col-lg-12">
            <div class="col-md-3"><img src="../imagenes/politecnico.jpg" width="80" height="80  " class="img-responsive"></div>
             <div class="col-md-6">         
               
                <img src="../imagenes/baner.png" class="img-responsive">
                     
             </div>
               <div class="col-md-3">
             <img class="img-responsive img-circle" src="<?php echo $foto ?>" width="50px" height="50px">
              <h5><i class="fa fa-circle fa-stack-1x fa-inverse" style="color:green; text-align: left; "></i><b> &nbsp; Online:</b> <?php echo $user ?></h5>
               </div> 

            </div>
            <div class="col-lg-12">
                    <ol class="breadcrumb">
                    <li><a href="../index.php">Inicio</a></li>
                    <li><a href="admin.php">Administrador</a></li>
                    <li class="active">Reporte de Asignaciones</li>
                </ol>
            </div>
        </div> 
        <!-- /.row -->
        <!-- Content Row -->
<?php //include('otros/menuAdministrador.php') ?>
        <div class="row">
            <!-- Content Column -->
            <div class="col-md-9">
                <div class="container">
      <div class="panel panel-success">
        <div class="panel-heading">
            <div class="btn-group pull-right">
            </div>
            <center><h4><b>Busqueda de Asignaciones por Filtros</b></h4></center>
        </div>
        <div class="panel-body">
            <div class="row">
                 
            <div class="modal-body">
   
                      <form class="form-group" method="post" action="reportes/Reporte_Asignaciones_Por_Docente.php" ">
                     <div class="form-group"> <label for="carrera" class="col-md-3 control-label">Busqueda por Docente:</label>
                         <div class="col-md-4">
                       <select class="form-control" id="docente" name="docente">
                     <?php 
                          while($fila=mysqli_fetch_row($docente)){
                          echo "<option value='".$fila['0']."'>".$fila['1']."</option>";
                          }
                          ?>
                      </select>
                       </div>
                       <input type="submit" value="Buscar" class="btn btn-success"/>
                    </div>
                    </form>

                    <form class="form-group" method="post" action="reportes/Reporte_Asignaciones_Por_Asignatura.php" ">
                    <div class="form-group"> <label for="carrera" class="col-md-3 control-label">Busqueda por Asignatura:</label>
                         <div class="col-md-4">
                       <select class="form-control" id="asignatura" name="asignatura">
                     <?php 
                          while($fila=mysqli_fetch_row($asignatura)){
                          echo "<option value='".$fila['0']."'>".$fila['1']."</option>";
                          }
                          ?>
                      </select>
                       </div>
                      <input type="submit" value="Buscar" class="btn btn-success"/>
                    </div>
                    </form>

                    <form class="form-group" method="post" action="reportes/Reporte_Asignaciones_Por_Grupo.php" ">
                    <div class="form-group"> <label for="carrera" class="col-md-3 control-label">Busqueda por Grupo:</label>
                         <div class="col-md-4">
                       <select class="form-control" id="grupo" name="grupo">
                     <?php 
                          while($fila=mysqli_fetch_row($grupo)){
                          echo "<option value='".$fila['0']."'>".$fila['1']."</option>";
                          }
                          ?>
                      </select>
                       </div>
                       <input type="submit" value="Buscar" class="btn btn-success"/>
                    </div>
                    </form>

                           <form class="form-group" method="post" action="reportes/Reporte_Asignaciones_Por_Turno.php" ">
                         <div class="form-group"> <label for="carrera" class="col-md-3 control-label">Busqueda por Turno:</label>
                         <div class="col-md-4">
                       <select class="form-control" id="turno" name="turno">
                     <?php 
                          while($fila=mysqli_fetch_row($turno)){
                          echo "<option value='".$fila['0']."'>".$fila['1']."</option>";
                          }
                          ?>
                      </select>
                       </div>
                      <input type="submit" value="Buscar" class="btn btn-success"/>
                    </div>
                    </form>
                    
                      <form class="form-group" method="post" action="reportes/Reporte_Asignaciones_Por_Horario.php" ">
                    <div class="form-group"> <label for="carrera" class="col-md-3 control-label">Busqueda por Horario:</label>
                         <div class="col-md-4">
                       <select class="form-control" id="horario" name="horario">
                     <?php 
                          while($fila=mysqli_fetch_row($horario)){
                          echo "<option value='".$fila['0']."'>".$fila['1']."</option>";
                          }
                          ?>
                      </select>
                       </div>
                       <input type="submit" value="Buscar" class="btn btn-success"/>
                    </div>
                    </form>

                    <form class="form-group" method="post" action="reportes/Reporte_Asignaciones_Por_NumeroAsignacion.php" ">
                    <div class="form-group"> <label for="carnet" class="col-md-3 control-label">Busqueda por Numero:</label>
                     <div class="col-md-4">
                     <input type="number" class="form-control" name="numero" placeholder="Escriba el Numero de Asignacion">
                     </div>
                      <input type="submit" value="Buscar" class="btn btn-success"/>
                    </div>
                   </form>
             </div>         



            </div>
                    
        </div>
        <!-- Fin del Panel -->
      </div>
        <!-- Fin del Row -->

             <div class="panel panel-success">
        <div class="panel-heading">
            <div class="btn-group pull-right">
            </div>
            <center><h4><b>Busqueda Filtrada</b></h4></center>
        </div>
        <div class="panel-body">
            <div class="row">
                 
            <div class="modal-body">
                        <form class="form-" method="post" action="reportes/Reporte_Asignaciones_Filtradas.php">
                        <div class="row">
                        <div class="form-group"> <label for="carrera" class="col-md-2 control-label">Seleccione Docente:</label>
                         <div class="col-md-4">
                       <select class="form-control" id="docente" name="docente">
                     <?php 
                          while($fila=mysqli_fetch_row($docente2)){
                          echo "<option value='".$fila['0']."'>".$fila['1']."</option>";
                          }
                          ?>
                      </select>
                       </div>
                        <br>
                       
                        <div class="form-group"> <label for="carrera" class="col-md-2 control-label">Seleccione Asignatura:</label>
                         <div class="col-md-4">
                       <select class="form-control" id="asignatura" name="asignatura">
                     <?php 
                          while($fila=mysqli_fetch_row($asignatura2)){
                          echo "<option value='".$fila['0']."'>".$fila['1']."</option>";
                          }
                          ?>
                      </select>
                       </div>
                    </div>                   

                    </div>

                        </div>
                        <!--Fin de la primera fila -->

                        <div class="row">
                         <div class="form-group"> <label for="carrera" class="col-md-2 control-label">Seleccione Grupo:</label>
                         <div class="col-md-4">
                       <select class="form-control" id="grupo" name="grupo">
                     <?php 
                          while($fila=mysqli_fetch_row($grupo2)){
                          echo "<option value='".$fila['0']."'>".$fila['1']."</option>";
                          }
                          ?>
                      </select>
                       </div>
                    </div>

                         <div class="form-group"> <label for="carrera" class="col-md-2 control-label">Seleccione Turno:</label>
                         <div class="col-md-4">
                       <select class="form-control" id="turno" name="turno">
                     <?php 
                          while($fila=mysqli_fetch_row($turno2)){
                          echo "<option value='".$fila['0']."'>".$fila['1']."</option>";
                          }
                          ?>
                      </select>
                       </div>
                    </div>


                  </div>
                         <!--Fin de la segunda fila -->
                        <div class="row">
                          <div class="form-group"> <label for="carrera" class="col-md-2 control-label">Seleccione Horario:</label>
                         <div class="col-md-4">
                       <select class="form-control" id="horario" name="horario">
                     <?php 
                          while($fila=mysqli_fetch_row($horario2)){
                          echo "<option value='".$fila['0']."'>".$fila['1']."</option>";
                          }
                          ?>
                      </select>
                       </div>
                    </div>

                      <div class="form-group"> <label for="carnet" class="col-md-2 control-label">Seleccione Numero:</label>
                     <div class="col-md-4">
                        <input type="number" class="form-control" name="numero" placeholder="Escriba el Numero de Asignacion">
                     </div>
                    </div>

                        </div>
                         <!--Fin de la tercera fila -->
                        <div class="row">
                            <center><input type="submit" value="Realizar Busqueda" class="btn btn-success"/></center>
                        </div>
                         <!--Fin de la cuarta fila -->
                         </form>
             </div>         



            </div>
                    
        </div>
        <!-- Fin del Panel -->
      </div>
        <!-- Fin del Row -->

    </div>
</div>
</div>
        <hr>
    </div>
    <?php
    include('../includes/footer.php');
 ?>
</body>
</html>
<?php
     }
     else{
        echo '<script> alert("No Tienes los permisos para acceder a esta pagina.");</script>';
         echo '<script> window.location="../login.php"; </script>';
     }
}else{
 echo '<script> window.location="../login.php"; </script>';
}
?>
