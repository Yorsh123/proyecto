<?php
session_start();
include '../admin/conexion.php';

if (isset($_SESSION['NombreUsuario'])) {
    if ($_SESSION["NivelUsuario"] == 2) {
        $user = $_SESSION['NombreUsuario'];
        $codigo = $_SESSION["Codigo"];

        $consulta = mysqli_query($conexion, "SELECT Foto FROM usuarios WHERE Codigo = $codigo");
        while ($filas = mysqli_fetch_array($consulta)) {
            $foto = $filas['Foto'];
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
    <script src="js/bootstrap.min.js"></script>
    <script src="material_didactico/myjava.js"></script>

</head>
<body>
           <?php
        include ('menu_inicio_docente.php');
            ?>
       <br>
        <div class="container">
            <div class="row">
            <div class="row">
            <div class="col-lg-12">
            <div class="col-md-3"><img src="../imagenes/politecnico.jpg" width="80" height="80" class="img-responsive"></div>
                       <div class="col-md-6">              
                          <img src="../imagenes/banerDoc.png" class="img-responsive">
                       </div>
               <div class="col-md-3">
                 <img class="img-responsive img-circle" src="<?php echo $foto ?>" width="50px" height="50px">
              <h5><i class="fa fa-circle fa-stack-1x fa-inverse" style="color:green; text-align: left; "></i><b> &nbsp; Online:</b> <?php echo isset($docente) ? $docente : ''; ?>
               </div> 
            </div>
          <div class="col-lg-12">
                    <ol class="breadcrumb">
                    <li><a href="docentes.php">Inicio</a></li>
                    <li><a href="docentes.php">Docentes</a></li>
                    <li class="active">Material Didactico</li>
                </ol>
            </div>
        </div> 
        <!-- /.row -->

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
            <center><h4><b>Administracion de Materiales Didacticos</b></h4></center>
        </div>
        <div class="panel-body">
            <div class="row">
                  <!--Fin del Segundo Row !-->

		               <div class="col-md-1"><h4>Buscar:</h4></div>
		               
                   <div class="col-md-5">
		                  <input type="text" name="s" id="bs-prod" class="form-control" placeholder="Escribir la Descripcion del Material">
		               </div>
		               	<div class="col-md-6">
                      <a href="material_didactico/subirMaterial.php"><button class="btn btn-success"> <i class="glyphicon glyphicon-plus"></i> Nuevo Material Didactico</button></a>
		               </div>
	              <br>
 <br>
    <div class="registros" id="agrega-registros"></div>
      <div class="col-md-6" style="text-align: left;">
		    <center>
		        <ul class="pagination" id="pagination"></ul>
		    </center>
      </div>
      </div>
      <div class="col-md-6">
		   <center>
		   <h4 style="font-weight: bold;"> 
       <?php
        include('../admin/conexion.php');
        $consulta = mysqli_query($conexion, "SELECT * FROM material_didactico");
        $numeroRegistros = mysqli_num_rows($consulta);
        echo "Registros Totales: $numeroRegistros";
        ?>
    
        </h4>
          </center>
      </div>
 

     
                    
        </div>
        <!-- Fin del Panel -->
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
