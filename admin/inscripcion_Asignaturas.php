<?php
session_start();
include 'conexion.php';

if (isset($_SESSION['NombreUsuario'])) {
    if ($_SESSION["NivelUsuario"] == 1) {
        $user = $_SESSION['NombreUsuario'];
        $codigo = $_SESSION["Codigo"];

        $consulta = mysqli_query($conexion, "SELECT Foto FROM usuarios WHERE Codigo = $codigo");
        while ($filas = mysqli_fetch_array($consulta)) {
            $foto = $filas['Foto'];
        }
        ?>

        <?php
        $consulta1 = "SELECT idCarrera, NombreCarrera FROM carreras";
        $carrera = mysqli_query($conexion, $consulta1);
        $consulta2 = "SELECT idAsignatura, NombreAsignatura FROM asignaturas";
        $asignaturas = mysqli_query($conexion, $consulta2);
  

        $consulta = mysqli_query($conexion, "SELECT Foto FROM estudiantes WHERE idEstudiante = $codigo");
        while ($filas = mysqli_fetch_array($consulta)) {
            $foto = $filas['Foto'];
        }

        $consulta2 = mysqli_query($conexion, "SELECT CONCAT(NombresEstudiante, ' ', ApellidosEstudiante) AS Estudiante FROM estudiantes WHERE idEstudiante = $codigo");
        while ($filas2 = mysqli_fetch_array($consulta2)) {
            $estudiante = $filas2['Estudiante'];
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
    <title>SIAD UNI</title>
    <link rel="shortcut icon" href="../imagenes/politecnico.jpg" type="image/x-icon">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="../css/modern-business.css" rel="stylesheet">
    <link href="../css/estilo.css" rel="stylesheet">
    <link href="../css/modern-business.css" rel="stylesheet">
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script src="js/jquery-1-10.2.js"></script>
     <script src="js/bootstrap.min.js"></script>
    <script src="js/back-to-top.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="incripciones_asignaturas/myjava.js"></script>

</head>
<body>
           <?php
        include ('menuAdmin.php');
            ?>
       <br>
        <div class="container">
            <div class="row">
            <div class="col-lg-12">
            <div class="col-md-3"><img src="../imagenes/politecnico.jpg" width="80" height="80" class="img-responsive"></div>
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
                    <li class="active">Inscripciones</li>
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
            <center><h4><b>Incripciones de Clases</b></h4></center>
        </div>
        <div class="panel-body">
            <div class="row">
		               <form id="formulario" class="form-group" action="recibir_inscripcion_asignaturas.php" method="post">
            <div class="modal-body">

          <div class="form-group"> <label for="carrera" class="col-md-3 control-label">Carrera:</label>
                         <div class="col-md-9">
                       <select class="form-control" id="carrera" name="carrera">
                       <option>---- Seleccione una Carrera -----</option>
                      <?php 
                          while($fila=mysqli_fetch_row($carrera)){
                          echo "<option value='".$fila['0']."'>".$fila['1']."</option>";
                          }
                          ?>
                      </select>
                       </div>
                    </div> <br>

                       <div class="form-group"> <label for="carrera" class="col-md-3 control-label">Asignaturas:</label>
                         <div class="col-md-9">
                       <select class="form-control" id="asignaturas" name="asignaturas">
                        <option>---- Seleccione una Asignatura -----</option>
                      <?php 
                          while($fila=mysqli_fetch_row($asignaturas)){
                          echo "<option value='".$fila['0']."'>".$fila['1']."</option>";
                          }
                          ?>
                      </select>
                       </div>
                    </div> <br>

                     <div class="form-group"> <label for="carrera" class="col-md-3 control-label">Codigo Estudiante:</label>
                         <div class="col-md-9">
                       <input type="text" class="form-control" name="estudiante" required="true" placeholder="Escriba el Codigo del Estudiante">
                       </div>
                    </div> <br>

                      <div class="form-group"> <label for="carrera" class="col-md-3 control-label">Observaciones:</label>
                         <div class="col-md-9">
                       <input type="text" class="form-control" name="observaciones" required="true" placeholder="Escriba las observaciones necesarias">
                       </div>
                    </div> <br>



              <div style="margin-top: 10px"> <center><input type="submit" value="Inscribir Asignatura"  class="btn btn-success" /></center>    </div>         
             </div>         
            </form>
	              <br>
 <br>

 <div class="row">
                   <div class="col-md-1"><h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Buscar:</h4></div>
                   <div class="col-md-5">
                   <form name="form1" action="" method="post">
                   <input type="text" name="txtbuscar" id="txtbuscar" class="form-control" placeholder="Escribir el nombre del Estudiante">
                   
                   </div>
                    <div class="col-md-6">
                      <input type="submit" id="nuevo-producto" class="btn btn-success" value="Buscar Inscripcion"> 
                      </form>
                   </div>
                <br>
  </div>

    <div class="registros" style="width:100%;" id="agrega-registros">
<?php
include('conexion.php');


$registro = mysqli_query($conexion, "SELECT inscripciones_asignaturas.idInscripcion as Codigo, carreras.NombreCarrera as Carrera, asignaturas.NombreAsignatura as Asignatura, concat(estudiantes.NombresEstudiante, ' ' ,estudiantes.ApellidosEstudiante) as Estudiantes,
inscripciones_asignaturas.fechaInscripcion as fecha, inscripciones_asignaturas.observaciones as observaciones 
FROM inscripciones_asignaturas INNER JOIN carreras ON inscripciones_asignaturas.idCarrera=carreras.idCarrera 
INNER JOIN asignaturas ON inscripciones_asignaturas.idAsignatura=asignaturas.idasignatura 
INNER JOIN estudiantes ON inscripciones_asignaturas.idEstudiante=estudiantes.idestudiante");

if (isset($_POST['txtbuscar'])){
      $registro=mysqli_query($conexion, "SELECT inscripciones_asignaturas.idInscripcion as Codigo, carreras.NombreCarrera as Carrera, asignaturas.NombreAsignatura as Asignatura, concat(estudiantes.NombresEstudiante, ' ' ,estudiantes.ApellidosEstudiante) as Estudiantes,
inscripciones_asignaturas.fechaInscripcion as fecha, inscripciones_asignaturas.observaciones as observaciones 
FROM inscripciones_asignaturas INNER JOIN carreras ON inscripciones_asignaturas.idCarrera=carreras.idCarrera 
INNER JOIN asignaturas ON inscripciones_asignaturas.idAsignatura=asignaturas.idasignatura 
INNER JOIN estudiantes ON inscripciones_asignaturas.idEstudiante=estudiantes.idestudiante
where estudiantes.NombresEstudiante like '%".$_POST['txtbuscar']."%'"); 
    }

       echo '<table class="table table-striped table-condensed table-hover table-responsive">
          <tr>
                      <th width="5%">Codigo</th>  
                        <th width="15%">Carrera</th>        
                        <th width="20%">Asignatura</th>
                        <th width="10%">Estudiantes</th>  
                        <th width="10%">Fecha</th>        
                        <th width="40%">Observaciones</th>
            </tr>';
      if(mysqli_num_rows($registro)>0){
       while($registro2 = mysqli_fetch_array($registro)){
          echo '<tr>
                              <td>'.$registro2['Codigo'].'</td>
                              <td>'.$registro2['Carrera'].'</td>
                              <td>'.$registro2['Asignatura'].'</td>
                              <td>'.$registro2['Estudiantes'].'</td>
                              <td>'.$registro2['fecha'].'</td>
                              <td>'.$registro2['observaciones'].'</td>
                       </tr>';
        }
      }else{
        echo '<tr>
              <td colspan="10">No se encontraron resultados</td>
            </tr>';
      }
      echo '</table>';
?>
    </div>
      <div class="col-md-6" style="text-align: left;">
		    <center>
		        <ul class="pagination" id="pagination"></ul>
		    </center>
      </div>
      <div class="col-md-6">
		   <center>
		   <h4 style="font-weight: bold;"> 
    <?php
include('conexion.php');
    $numeroRegistros = mysqli_num_rows(mysqli_query($conexion, "SELECT * FROM inscripciones_asignaturas"));
    echo "Registros Totales: $numeroRegistros";
        ?>
        </h4>
          </center>
      </div>
   
  
    <!-- MODAL PARA EL REGISTRO-->

            </div>
                    
        </div>
        <!-- Fin del Panel -->
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
