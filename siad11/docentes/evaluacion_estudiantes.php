<?php
session_start();
include '../admin/conexion.php';

if(isset($_SESSION['NombreUsuario'])) {
     if ($_SESSION["NivelUsuario"] == 2) {
            $user = $_SESSION['NombreUsuario'];
            $codigo = $_SESSION["Codigo"];
        ?>
           <?php 
          $consulta2="SELECT asignaturas.idAsignatura as id, asignaturas.NombreAsignatura as asignatura
                      FROM asignaciones INNER JOIN asignaturas ON  asignaciones.idAsignatura =  asignaturas.idAsignatura
                      where idDocente = $codigo and asignaciones.Estado = 1";
          $asignatura=mysqli_query($conexion, $consulta2);
          
          $consulta3="SELECT estudiantes.idEstudiante as id, concat (estudiantes.NombresEstudiante,' ', estudiantes.ApellidosEstudiante) as estudiante
          FROM asignaciones INNER JOIN asignaturas ON  asignaciones.idAsignatura =  asignaturas.idAsignatura 
                  INNER JOIN inscripciones_Asignaturas ON  asignaturas.idAsignatura =  inscripciones_Asignaturas.idAsignatura 
          INNER JOIN estudiantes ON  inscripciones_Asignaturas.idEstudiante =  estudiantes.idEstudiante
          where asignaciones.idDocente = $codigo and asignaciones.Estado = 1 group by estudiantes.idEstudiante";
          $estudiante=mysqli_query($conexion, $consulta3);

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
    <script src="js/back-to-top.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="evaluacion_estudiantes/myjava.js"></script>

</head>
<body>
           <?php
        include ('menu_inicio_docente.php');
            ?>
       <br>
        <div class="container">
            <div class="row">
            <div class="col-lg-12">
            <div class="col-md-3"><img src="../imagenes/politecnico.jpg" width="80" height="80" class="img-responsive"></div>
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
                    <li><a href="docentes.php">Inicio</a></li>
                    <li><a href="docentes.php">Docentes</a></li>
                    <li class="active">Evaluacion de Estudiantes</li>
                </ol>
            </div>
        </div> 
        <!-- /.row -->
        <!-- Content Row -->
<?php //include('otros/menuAdministrador.php') ?>
        <div class="row">
            <!-- Content Column -->
                        <?php
    include('../docentes/menu_docente.php');
 ?>
            <div class="col-md-9">
                <div class="containe">
      <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="btn-group pull-right">
            </div>
            <center><h4><b>Evaluacion de Estudiantes</b></h4></center>
        </div>
        <div class="panel-body">
            <div class="row">
		               <div class="col-md-1"><h4>Buscar:</h4></div>
		               
                   <div class="col-md-5">
		                  <input type="text" name="s" id="bs-prod" class="form-control" placeholder="Escriba el Numero de Carnet del Estudiante">
		               </div>
		               	<div class="col-md-6">
		                  <button id="nuevo-producto" class="btn btn-success"> <i class="glyphicon glyphicon-plus"></i> Nueva Evaluacion</button> 
		                  <a href="reportes/Reporte_Asignaciones.php"> <button class="btn btn-primary"><i class="fa fa-file-pdf-o"></i>  Exportar a PDF</button> </a>
		               </div>
	              <br>
 <br>
    <div class="registros" style="width:100%;" id="agrega-registros"></div>
      <div class="col-md-6" style="text-align: left;">
		    <center>
		        <ul class="pagination" id="pagination"></ul>
		    </center>
      </div>
      <div class="col-md-6">
		   <center>
		   <h4 style="font-weight: bold;"> 
    <?php
include('../admin/conexion.php');
    $numeroRegistros = mysqli_num_rows(mysqli_query($conexion, "SELECT * FROM evaluaciones where idDocente = $codigo"));
    echo "Registros Totales: $numeroRegistros";
        ?>
        </h4>
          </center>
      </div>
   
  
    <!-- MODAL PARA EL REGISTRO-->
    <div class="modal fade" id="registra-datos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header" style="background:#337ab7; text-align: center;">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" style="color:white;" id="myModalLabel"><b>
              <i class='glyphicon glyphicon-pencil'></i>&nbsp;&nbsp;Evaluacion a los Estudiantes</b></h4>
            </div>
            <form id="formulario" class="form-group" onsubmit="return agregarRegistro();">
            <div class="modal-body">

            <input type="text" class="form-control" required readonly id="id-registro" name="id-registro" readonly="readonly" style="visibility:hidden; height:5px;"/>

                 <div class="form-group"> <label for="codigo" class="col-md-4 control-label">Proceso:</label>
				<div class="col-md-8"><input type="text" class="form-control" required readonly id="pro" name="pro" hidden="true" /></div>
			   </div> <br>
                     <div class="form-group"> <label for="carnet" class="col-md-4 control-label">Observaciones:</label>
                     <div class="col-md-8">
                     <textarea class="form-control" id="descripcion" name="descripcion" required maxlength="100"></textarea>
                     </div>
               </div> <br>
   
                    <div class="form-group"> <label for="cuatrimestre" class="col-md-4 control-label">Estudiantes:</label>
                         <div class="col-md-8">
                       <select class="form-control" id="estudiante" name="estudiante">
                        
                                    <?php 
                                    echo $consulta3;
                          while($fila=mysqli_fetch_row($estudiante)){
                          echo "<option value='".$fila['0']."'>".$fila['1']."</option>";
                          }
                          ?>
                      </select>
                       </div>
                    </div> <br>

                      <div class="form-group"> <label for="cuatrimestre" class="col-md-4 control-label">Asignatura:</label>
                         <div class="col-md-8">
                       <select class="form-control" id="asignatura" name="asignatura">
                                   <?php 
                          while($fila=mysqli_fetch_row($asignatura)){
                          echo "<option value='".$fila['0']."'>".$fila['1']."</option>";
                          }
                          ?>
                      </select>
                       </div>
                    </div> <br>
                    
                <div class="form-group"> <label for="carnet" class="col-md-4 control-label">Unidad:</label>
                     <div class="col-md-8">
                     <input type="text" class="form-control" id="unidad" name="unidad" required maxlength="50">
                     </div>
               </div> <br>

                <div class="form-group"> <label for="carnet" class="col-md-4 control-label">Tarea:</label>
        <div class="col-md-8"><input type="text" class="form-control" id="tarea" name="tarea" required maxlength="50"></div>
         </div> <br>

<div class="form-group"> <label for="carnet" class="col-md-4 control-label">Puntaje:</label>
        <div class="col-md-8"><input type="number" class="form-control" name="puntaje" id="puntaje" required maxlength="50"></div>
         </div> <br><br><br>


                    

                 <div id="mensaje"></div>           
             </div>         
            <div class="modal-footer">
                <input type="submit" value="Registrar" class="btn btn-success" id="reg"/>
                <input type="submit" value="Editar" class="btn btn-warning"  id="edi"/>
            </div>
            </form>
          </div>
        </div>
      </div>
            </div>
        </div>
    </div>

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
