<?php
include '../admin/conexion.php';
session_start();
if(isset($_SESSION['NombreUsuario'])) {
     if ($_SESSION["NivelUsuario"] == 3) {
            $user = $_SESSION['NombreUsuario'];
            $codigo = $_SESSION['Codigo'];
        ?>
           <?php 
          $consulta1="SELECT asignaturas.idAsignatura, asignaturas.NombreAsignatura
FROM inscripciones_Asignaturas INNER JOIN asignaturas ON inscripciones_Asignaturas.idAsignatura = asignaturas.idAsignatura
where inscripciones_Asignaturas.idEstudiante = '$codigo'";
          $asignatura=mysqli_query($conexion, $consulta1);

          $consulta = mysqli_query($conexion, "SELECT Foto FROM usuarios WHERE Codigo = $codigo");

          while ($filas = mysqli_fetch_array($consulta)) {
              $foto = $filas['Foto'];
          }

                 $consulta2 = mysqli_query($conexion, "select concat (NombresEstudiante, ' ', ApellidosEstudiante) as Estudiante from estudiantes where idEstudiante = $codigo"); 
                 while($filas2=mysqli_fetch_array($consulta2)){
                         $estudiante=$filas2['Estudiante'];                           
                 }
    
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
     <link rel="shortcut icon" href="../imagenes/favicon.ico" type="image/x-icon">
    <link href="../admin/css/bootstrap.css" rel="stylesheet">
    <link href="../css/modern-business.css" rel="stylesheet">
    <link href="../css/estilo.css" rel="stylesheet">
    <link href="../css/modern-business.css" rel="stylesheet">
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script src="../js/jquery-1.10.2.js"></script>
    <script src="../js/back-to-top.js"></script>
    <script src="../js/bootstrap.min.js"></script>

      <link rel="stylesheet" type="text/css" href="../alertas/sweetalert.css">
  <script src="../alertas/sweetalert.min.js"></script>
</head>
<body>
           <?php
        include ('menu_inicio_estudiante.php');
            ?>
       <br>
          <div class="container">
            <div class="row">
            <div class="col-lg-12">
            <div class="col-md-3"><img src="../imagenes/logoSIAD.png" width="80" height="80" class="img-responsive"></div>
             <div class="col-md-6">         
               
                <img src="../imagenes/banerEst.png" class="img-responsive">
                     
             </div>
               <div class="col-md-3">
              <img class="img-responsive img-circle" src="<?php echo $foto ?>" width="50px" height="50px">
              <h5><i class="fa fa-circle fa-stack-1x fa-inverse" style="color:green; text-align: left; "></i><b> &nbsp; Online:</b> <?php echo $user ?></h5>
               </div> 

            </div>

             <div class="col-lg-12">              
                <ol class="breadcrumb">
                    <li><a href="../index.php">Inicio</a></li>
                    <li><a href="estudiantes.php">Estudiantes</a></li>
                     <li><a href="entrega_tarea.php">Entrega Tareas</a></li>
                    <li class="active">Subir Tarea</li>
                </ol>
            </div>
        </div> 
        <!-- /.row -->
        <div class="row">
            <!-- Content Column -->
              <?php
    include('menu_estudiante.php');
 ?>

    <div class="col-md-9">
                <div class="containe">
      <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="btn-group pull-right">
                </div>
                <center><h4><b>Nueva Entrega de Tarea</b></h4></center>
            </div>
                    <div class="panel-body">
                        <div class="row">
                            <div style="margin: 10px;">
                  <form id="formulario" class="form-group" action="entrega_tareas/recibirSubida.php" method="post" enctype="multipart/form-data">
            <div class="modal-body">

              <div class="form-group"> <label for="carnet" class="col-md-3 control-label">Descripcion:</label>
                <div class="col-md-9">
                <textarea class="form-control" id="descripcion" name="descripcion" required maxlength="200" required="true"></textarea>
                </div>
         </div> <br>

          <div class="form-group"> <label for="carrera" class="col-md-3 control-label">Codigo Docente:</label>
             <div class="col-md-9"><input type="text" class="form-control" id="codigoD" name="codigoD" required="true" maxlength="50"></div>
                    </div> <br>

               <div class="form-group"> <label for="carnet" class="col-md-3 control-label">Asignatura:</label>
                    <div class="col-md-9">
                       <select class="form-control" id="asignatura" name="asignatura">
                     <?php 
                          while($fila=mysqli_fetch_row($asignatura)){
                          echo "<option value='".$fila['0']."'>".$fila['1']."</option>";
                          }
                          ?>
                      </select>
                       </div>
         </div> <br>  
         
               <div class="form-group"> <label for="carnet" class="col-md-3 control-label">Archivo:</label>
        <div class="col-md-9"><input type="file" class="form-control" id="archivo" name="archivo" required="true"></div>
         </div> <br> 

<br>
               
               <center><input type="submit" value="Entregar Tarea" name="subir" class="btn btn-success" id="reg"/></center>    
          
             </div> 
             <div id="mensaje"> </div>        


            </form>
                       <a href="../entrega_tarea.php"> <button class="btn btn-primary"><i class="fa fa-arrow-left"></i> Volver al Listado</button> </a>        

                            </div>
                        </div>
                         <!-- Fin del Row -->       
                    </div>
      </div>
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
