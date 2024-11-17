<?php
session_start();
include '../../admin/conexion.php';

if(isset($_SESSION['NombreUsuario'])) {
     if ($_SESSION["NivelUsuario"] == 2) {
            $user = $_SESSION['NombreUsuario'];
            $codigo = $_SESSION["Codigo"];
        ?>
           <?php 
          $consulta1 = "SELECT idNumeroAsignacion, numeroAsignado FROM numeros_asignaciones";
          $numero = mysqli_query($conexion, $consulta1);

          $consultaD = mysqli_query($conexion, "SELECT Foto FROM docentes WHERE idDocente = $codigo");                  
          while($filas = mysqli_fetch_array($consultaD)){
              $foto = $filas['Foto'];                           
          }

          $consultaD2 = mysqli_query($conexion, "SELECT CONCAT(NombresDocente, ' ', ApellidosDocente) AS Docente FROM docentes WHERE idDocente = $codigo"); 
          while($filas2 = mysqli_fetch_array($consultaD2)){
              $docente = $filas2['Docente'];                           
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
    <link href="../css/bootstrap.min.css" rel="stylesheet">
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
       include ('../menu_inicio_docente.php');
            ?>
       <br>
       <br>
       <br>
        <div class="container">
            <div class="row">
            <div class="col-lg-12">
            <div class="col-md-3"><img src="../../imagenes/logoSIAD.png" width="80" height="80" class="img-responsive"></div>
             <div class="col-md-6">         
               
                <img src="../../imagenes/banerDoc.png" class="img-responsive">
                     
             </div>
               <div class="col-md-3">
                <img class="img-responsive img-circle" src="<?php echo '../'.$foto ?>" width="50px" height="50px">
              <h5><i class="fa fa-circle fa-stack-1x fa-inverse" style="color:green; text-align: left; "></i><b> &nbsp; Online:</b> <?php echo isset($docente) ? $docente : ''; ?></h5>
               </div> 

            </div>
             <div class="col-lg-12">
                    <ol class="breadcrumb">
                    <li><a href="../../index.php">Inicio</a></li>
                    <li><a href="../docentes.php">Docentes</a></li>
                    <li><a href="../material_didactico.php">Material Didactico</a></li>
                    <li class="active">Subir Material</li>
                </ol>
            </div>
        </div> 
        <!-- /.row -->
        <div class="row">
            <!-- Content Column -->
              <?php
    include('../../docentes/menu_docente.php');
 ?>

    <div class="col-md-9">
                <div class="containe">
      <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="btn-group pull-right">
                </div>
                <center><h4><b>Administracion de Material Didactico</b></h4></center>
            </div>
                    <div class="panel-body">
                        <div class="row">
                            <div style="margin: 10px;">
                  <form id="formulario" class="form-group" action="recibirSubida.php" method="post" enctype="multipart/form-data">
            <div class="modal-body">

            <input type="text" class="form-control" required readonly id="id-registro" name="id-registro" readonly="readonly" style="visibility:hidden; height:5px;"/>

          <div class="form-group"> <label for="carrera" class="col-md-3 control-label">Numero:</label>
                         <div class="col-md-9">
                       <select class="form-control" id="numero" name="numero">
                     <?php 
                          while($fila=mysqli_fetch_row($numero)){
                          echo "<option value='".$fila['0']."'>".$fila['1']."</option>";
                          }
                          ?>
                      </select>
                       </div>
                    </div> <br>

               <div class="form-group"> <label for="carnet" class="col-md-3 control-label">Descripcion:</label>
        <div class="col-md-9"><input type="text" class="form-control" id="descripcion" name="descripcion" required maxlength="50"></div>
         </div> <br>  


               <div class="form-group"> <label for="carnet" class="col-md-3 control-label">Archivo:</label>
        <div class="col-md-9"><input type="file" class="form-control" id="archivo" name="archivo" required="true"></div>
         </div> <br> 


               <div class="form-group"> <label for="carnet" class="col-md-3 control-label">Codigo Material:</label>
        <div class="col-md-9"><input type="number" class="form-control" id="codigo" name="codigo" required maxlength="50"></div>
         </div> <br>
         <br>   
               <center><input type="submit" value="Registrar" name="subir" class="btn btn-success" id="reg"/></center>    
          
             </div>         


            </form>
                       <a href="../material_didactico.php"> <button class="btn btn-primary"><i class="fa fa-arrow-left"></i> Volver al Listado</button> </a>        

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
    include('../../includes/footer.php');
 ?>
</body>
</html>
<?php
     }
     else{
        echo '<script> alert("No Tienes los permisos para acceder a esta pagina.");</script>';
         echo '<script> window.location="../../login.php"; </script>';
     }
}else{
 echo '<script> window.location="../../login.php"; </script>';
}
?>
