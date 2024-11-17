<?php
session_start();
include '../../admin/conexion.php';

if(isset($_SESSION['NombreUsuario'])) {
     if ($_SESSION["NivelUsuario"] == 3) {
            $user = $_SESSION['NombreUsuario'];
            $codigo = $_SESSION["Codigo"];
        ?>
           <?php 
          $consulta1="select idCarrera, NombreCarrera from carreras";
          $carrera=mysql_query($consulta1);
          $consulta2="select idYearAcademico, NombreYear from years_academicos";
          $year=mysql_query($consulta2);
          $consulta3="select idCuatrimestre, NombreCuatrimestre from cuatrimestres";
          $cuatrimestre=mysql_query($consulta3);
         
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
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link href="../../css/modern-business.css" rel="stylesheet">
    <link href="../../css/estilo.css" rel="stylesheet">
    <link href="../css/modern-business.css" rel="stylesheet">
    <link href="../../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script src="../../js/jquery.js"></script>
    <script src="../js/back-to-top.js"></script>
    <script src="../../js/bootstrap.min.js"></script>

</head>
<body>
           <?php
                include ('../menu_inicio_estudiante.php');
            ?>
       <br>
        <div class="container">
            <div class="row">
            <div class="col-lg-12">
            <div class="col-md-3"><img src="../../imagenes/logoSIAD.png" width="80" height="80" class="img-responsive"></div>
             <div class="col-md-6">         
               
                <img src="../../imagenes/banerEst.png" class="img-responsive">
                     
             </div>
               <div class="col-md-3">
              <h5><i class="fa fa-circle fa-stack-1x fa-inverse" style="color:green; text-align: left; "></i><b> &nbsp; Online:</b> <?php echo $user ?></h5>
               </div> 

            </div>
              <div class="col-lg-12">              
                <ol class="breadcrumb">
                    <li><a href="index.php">Inicio</a>
                    </li>
                    <li class="active">Estudiantes</li>
                </ol>
            </div>
        </div> 
        <!-- /.row -->
        <div class="row">
            <!-- Content Column -->
                        <?php
                  include ('../menu_estudiante.php');
                       ?>
            <div class="col-md-9">
                <div class="containe">
      <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="btn-group pull-right">
            </div>

            <center>

            <h4>
 <a href="../inscripcion_asignatura.php"> <button class="btn btn-warning" style="float: left; "><i class="fa fa-arrow-left"></i> Volver al Listado</button> </a> 
            <b>Nueva Inscripcion</b></h4>
            </center>
        </div>
        <div class="panel-body">
            <div class="row">
                 
		               <div style="margin-left: : 10px; margin-right: 10px;">
                  <form id="formulario" class="form-group" action="" method="post">
            <div class="modal-body">

          <div class="form-group"> <label for="carrera" class="col-md-3 control-label">Carrera:</label>
                         <div class="col-md-9">
                       <select class="form-control" id="carrera" name="carrera">
                      <?php 
                          while($fila=mysql_fetch_row($carrera)){
                          echo "<option value='".$fila['0']."'>".$fila['1']."</option>";
                          }
                          ?>
                      </select>
                       </div>
                    </div> <br>

                       <div class="form-group"> <label for="carrera" class="col-md-3 control-label">Año:</label>
                         <div class="col-md-9">
                       <select class="form-control" id="year" name="year">
                      <?php 
                          while($fila=mysql_fetch_row($year)){
                          echo "<option value='".$fila['0']."'>".$fila['1']."</option>";
                          }
                          ?>
                      </select>
                       </div>
                    </div> <br>

                       <div class="form-group"> <label for="carrera" class="col-md-3 control-label">Cuatrimestre:</label>
                         <div class="col-md-9">
                       <select class="form-control" id="Cuatrimestre" name="cuatrimestre">
                      <?php 
                          while($fila=mysql_fetch_row($cuatrimestre)){
                          echo "<option value='".$fila['0']."'>".$fila['1']."</option>";
                          }
                          ?>
                      </select>
                       </div>
                    </div> <br>
              <div style="margin-top: 10px"> <center><input type="submit" value="Buscar"  class="btn btn-success" /></center>    </div>         
             </div>         
            </form>
                            </div>
                        </div> 
                         <div class="form-group"> <label for="carrera" class="col-md-3 control-label">Asignaturas:</label>
                         <div class="col-md-9">
                       <select class="form-control" id="Cuatrimestre" name="cuatrimestre">
                     <option>Asignatura 1</option>
                       <option>Asignatura 2</option>
                      </select>
                                         
                </div>
        </div>
          



           <!-- Fin del Panel 1 -->
  
        <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="btn-group pull-right">
            </div><center><h4><b>Listado de Asignaturas a Inscribir</b></h4></center></div>
        <div class="panel-body">
            <div class="row">        
                   <div style="margin-left: : 10px; margin-right: 10px;">
                  <table class="table table-striped table-condensed table-hover table-responsive">
                    <tr>
                     <th>Codigo</th>
                      <th>Asignatura</th>
                      <th>Observaciones</th>
                      <th>Opcion</th>
                    </tr>
                        <?php
                      $consulta=mysql_query("select idAsignatura, NombreAsignatura from asignaturas ORDER BY idAsignatura desc");
                       if (isset($_POST['carrera'])){
                       $consulta=mysql_query("select idAsignatura, NombreAsignatura from asignaturas where Idcarrera = '".$_POST['carrera']."' and Idyear = '".$_POST['year']."' and idcuatrimestre = '".$_POST['cuatrimestre']."' ORDER BY idAsignatura desc"); 
                    }
                     
                           while($filas=mysql_fetch_array($consulta)){
                                 $nombre=$filas['NombreAsignatura'];
                                 $id=$filas['idAsignatura'];
                               
                 ?>
                      <tr>
                       <td><?php echo $id ?></td>
                       <td><?php echo $nombre ?></td>
                        
                       <td width="50%"><input type="text" name="observaciones" maxlength="250" class="form-control"></td>
                      <td> 
                            <form action="recibir_inscripcion.php" method="post" name="editar">
                             <input name="idtxt" type="hidden" value="<?php echo $id ?>" />
                             <input type="submit" title="Inscribir esta Asignatura" class="btn btn-success" name="Inscribir" value="Inscribir Asignatura" />
                             </form>

                      <?php }?>
                      </td>
                    </tr>

                  </table>
       

                            </div>
                        </div>                   
        </div>
  
        </div>
        <!-- Fin del Panel 2 -->

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
