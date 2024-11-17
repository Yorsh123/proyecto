<?php
session_start();
include '../admin/conexion.php';

if (!isset($_POST['subir'])) {
  $asig = 0;
  }

if(isset($_SESSION['NombreUsuario'])) {
     if ($_SESSION["NivelUsuario"] == 2) {
            $user = $_SESSION['NombreUsuario'];
                $codigo = $_SESSION["Codigo"];
        ?>
           <?php 
          $consulta1="SELECT idNumeroAsignacion, numeroAsignado FROM numeros_asignaciones";
          $numero=mysqli_query($conexion, $consulta1);

           $consulta2="SELECT asignaturas.idAsignatura as id, asignaturas.NombreAsignatura as asignatura
                      FROM asignaciones INNER JOIN asignaturas ON  asignaciones.idAsignatura =  asignaturas.idAsignatura
                      where idDocente = $codigo and asignaciones.Estado = 1";
          $asignatura=mysqli_query($conexion, $consulta2);


                $consulta = mysqli_query($conexion, "SELECT Foto FROM usuarios WHERE Codigo = $codigo");
                while ($filas = mysqli_fetch_array($consulta)) {
                    $foto = $filas['Foto'];
                }
                 $consultaD2 = mysqli_query($conexion, "select concat (NombresDocente, ' ', ApellidosDocente) as Docente from docentes where idDocente = $codigo"); 
                 while($filas2=mysqli_fetch_array($consultaD2)){
                         $docente=$filas2['Docente'];                           
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
    <title>Politecnico</title>
     <link rel="shortcut icon" href="../imagenes/politecnico.jpg" type="image/x-icon">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="../css/modern-business.css" rel="stylesheet">
    <link href="../css/estilo.css" rel="stylesheet">
    <link href="../css/modern-business.css" rel="stylesheet">
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script src="../js/jquery.js"></script>
    <script src="../js/back-to-top.js"></script>
    <script src="../js/bootstrap.min.js"></script>

      <link rel="stylesheet" type="text/css" href="../alertas/sweetalert.css">
  <script src="../alertas/sweetalert.min.js"></script>
</head>
<body>
           <?php
       include ('menu_inicio_docente.php');
            ?>
       <br>
        <div class="container">
            <div class="row">
            <div class="col-lg-12">
            <div class="col-md-3"><img src="../imagenes/Politecnico.jpg" width="80" height="80" class="img-responsive"></div>
             <div class="col-md-6">         
               
                <img src="../imagenes/banerDoc.png" class="img-responsive">
                     
             </div>
               <div class="col-md-3">
                 <img class="img-responsive img-circle" src="<?php echo $foto ?>" width="50px" height="50px">
              <h5><i class="fa fa-circle fa-stack-1x fa-inverse" style="color:green; text-align: left; "></i><b> &nbsp; Online:</b> <?php echo $user ?></h5>
               </div> 

            </div>
             <div class="col-lg-12">
                    <ol class="breadcrumb">
                    <li><a href="../index.php">Inicio</a></li>
                    <li><a href="docentes.php">Docentes</a></li>
                     <li><a href="pantalla_reportes.php">Reportes</a></li>
                    <li class="active">Estudiantes por Asignaturas</a></li>
                </ol>
            </div>
        </div> 
        <!-- /.row -->
        <div class="row">
            <!-- Content Column -->
              <?php
    include('menu_docente.php');
 ?>

    <div class="col-md-9">
                <div class="containe">
      <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="btn-group pull-right">
                </div>
                <center><h4><b>Reporte de Estudiantes por Asignaturas</b></h4></center>
            </div>
                    <div class="panel-body">
                        <div class="row">
                            <div style="margin: 10px;">
                  <form id="formulario" class="form-group" action="" method="post">
            <div class="modal-body">

            <input type="text" class="form-control" required readonly id="id-registro" name="id-registro" readonly="readonly" style="visibility:hidden; height:5px;"/>

          <div class="form-group"> <label for="carrera" class="col-md-3 control-label">Seleccionar Asignatura:</label>
                         <div class="col-md-9">
                      <select class="form-control" id="asignatura" name="asignatura">
                          <option>---- Seleccione una Asignatura -----</option>
                                   <?php 
                          while($fila=mysqli_fetch_row($asignatura)){
                          echo "<option value='".$fila['0']."'>".$fila['1']."</option>";
                          }
                          ?>
                      </select>

                       </div>
                    </div> <br><br>
               <center><input type="submit" value="Buscar Estudiantes" name="subir" class="btn btn-success" id="reg"/></center>         
             </div>         
            </form>       
        </div>
      </div>
                         <!-- Fin del Row -->       
      </div>
      </div>

       <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="btn-group pull-right">
                </div>
                <center><h4><b>Listado de Estudiantes</b></h4></center>
            </div>
                    <div class="panel-body">
                        <div class="row">
                            <div style="margin: 10px;">
                         <table class="table table-striped table-condensed table-hover table-responsive">
                    <tr>
                     <th>Asignatura</th>
                      <th>Estudiantes</th>
                      <th>Fecha de Inscripcion</th>
                      <th>Comentarios</th>
                    </tr>
                        <?php

                       if (!isset($_POST['asignatura'])){
                        $consulta = " ";
                        $sql = "0 ";
                       // $contador = " ";
                       echo "<td colspan='3'>No existen Estudiantes que Mostrar</td>";
                      }
                      else {
                        $asig = $_POST['asignatura'];
                        $consulta=mysqli_query($conexion, "SELECT asignaturas.idAsignatura as id, asignaturas.NombreAsignatura as Asignatura, concat(estudiantes.NombresEstudiante,' ' ,estudiantes.ApellidosEstudiante) as Estudiante, inscripciones_asignaturas.fechaInscripcion as Fecha, inscripciones_Asignaturas.observaciones as Observaciones
                       FROM asignaturas INNER JOIN inscripciones_Asignaturas ON  asignaturas.idAsignatura =  inscripciones_Asignaturas.idAsignatura 
                          INNER JOIN estudiantes ON  inscripciones_Asignaturas.idEstudiante =  estudiantes.idEstudiante
                       WHERE asignaturas.idAsignatura = '$asig' group by estudiantes.idEstudiante "); 

                        $sql = mysqli_num_rows($consulta);
                     
                           while($filas=mysqli_fetch_array($consulta)){
                                 $id = $filas['id'];
                                 $asignatura = $filas['Asignatura'];
                                 $nombre=$filas['Estudiante'];
                                 $fecha=$filas['Fecha'];
                                 $observaciones=$filas['Observaciones'];
                      //  $contador = $contador + 1;       
                     ?>
                      <tr>
                       <td><?php echo $asignatura ?></td>
                       <td><?php echo $nombre ?></td>
                        <td><?php echo $fecha ?></td>
                         <td><?php echo $observaciones ?></td>
                           <td></td>
                      <td>
                      <?php  } }?>
                      </td>
                    </tr>

                  </table>
                 <?php
                    echo '<a href="Reporte_Estudiantes_X_Asignaturas.php?id='.$asig.'"> <button class="btn btn-warning" style="float: left; "><i class="fa fa-arrow-left"></i> Exportar Listado a PDF</button> </a> ';
                  ?>

                     <center><h4 style="color:green;">Estudiantes Encontrados: <?php echo $sql ?></h4></center>
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
         echo '<script> window.location="../../login.php"; </script>';
     }
}else{
 echo '<script> window.location="../../login.php"; </script>';
}
?>
