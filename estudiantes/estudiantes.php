<?php
session_start();
include '../admin/conexion.php';

if(isset($_SESSION['NombreUsuario'])) {
    if ($_SESSION["NivelUsuario"] == 3) {
        $user = $_SESSION['NombreUsuario'];
        $codigo = $_SESSION["Codigo"];

        $consulta = mysqli_query($conexion, "SELECT Foto FROM usuarios WHERE Codigo = $codigo");

            while ($filas = mysqli_fetch_array($consulta)) {
                $foto = $filas['Foto'];
            }

        $consulta2 = mysqli_query($conexion, "SELECT CONCAT(NombresEstudiante, ' ', ApellidosEstudiante) AS Estudiante FROM estudiantes WHERE idEstudiante = $codigo");
        $estudiante = "";
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

            <title>Politecnico</title>
            <link rel="shortcut icon" href="../imagenes/politecnico.jpg" type="image/x-icon">
            <link href="../admin/css/bootstrap.css" rel="stylesheet">
            <link href="../css/modern-business.css" rel="stylesheet">
            <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        </head>

        <body>
        <?php
        include ('menu_inicio_estudiante.php');
        ?>

        <!-- Page Content -->
        <div class="container">

            <!-- Page Heading/Breadcrumbs -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="col-md-3"><img src="../imagenes/politecnico.jpg" width="80" height="80" class="img-responsive"></div>
                    <div class="col-md-6">
                        <img src="../imagenes/banerEst.png" class="img-responsive">
                    </div>
                    <div class="col-md-3">
                        <br>
                        <img class="img-responsive img-circle" src="<?php echo $foto ?>" width="50px" height="50px">
                        <h5><i class="fa fa-circle fa-stack-1x fa-inverse" style="color:green; text-align: left; "></i><b> &nbsp; Online:</b> <?php echo $user ?>
                        </h5>
                    </div>

                </div>

                <div class="col-lg-12">
                    <ol class="breadcrumb">
                        <li><a href="../index.php">Inicio</a></li>
                        <li class="active">Estudiantes</li>
                    </ol>
                </div>
                <!-- /.row -->

                <!-- Content Row -->

                <!-- Sidebar Column -->
                <?php
                include ('menu_estudiante.php');
                ?>
                <!-- Content Column -->
                <div class="col-md-9">
                    <h3>Bienvenido Estudiante : <b style="color:green;"><?php echo $estudiante; ?></b></h3>
                    <p>En esta seccion del sistema usted podra inscibir las asignaturas correspondientes a su año y carrera, ademas de ver y descargar los archivos de apoyo de las clases impartidas, entregar tareas y ver las notas asignadas a estas tareas.</p>

                    <div class="row">
                        <div class="col-md-3 col-sm-6">
                            <div class="panel panel-default text-center">
                                <div class="panel-heading">
                                    <span class="fa-stack fa-5x">
                                          <img src="images/Signature.png" class="img-responsive">
                                    </span>
                                </div>
                                <div class="panel-body">
                                    <h4>Inscripciones</h4>
                                    <a href="inscripcion_asignatura.php" class="btn btn-primary"> <i class="glyphicon glyphicon-download"></i>   Entrar</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="panel panel-default text-center">
                                <div class="panel-heading">
                                    <span class="fa-stack fa-5x">
                                        <img src="../imagenes/docente1.png" class="img-responsive">
                                    </span>
                                </div>
                                <div class="panel-body">
                                    <h4>Material de Estudio</h4>
                                    <a href="material_didactico.php" class="btn btn-primary"><i class="glyphicon glyphicon-download"></i>  Entrar</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6">
                            <div class="panel panel-default text-center">
                                <div class="panel-heading">
                                    <span class="fa-stack fa-5x">
                                         <img src="images/tarea.png" class="img-responsive">
                                    </span>
                                </div>
                                <div class="panel-body">
                                    <h4>Tareas Asignadas</h4>
                                    <a href="tareas_recibidas.php" class="btn btn-primary"><i class="glyphicon glyphicon-download"></i>   Entrar</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6">
                            <div class="panel panel-default text-center">
                                <div class="panel-heading">
                                    <span class="fa-stack fa-5x">
                                           <img src="images/entrega.png" class="img-responsive">
                                    </span>
                                </div>
                                <div class="panel-body">
                                    <h4>Entregar Tareas</h4>
                                    <a href="entrega_tarea.php" class="btn btn-primary"><i class="glyphicon glyphicon-download"></i>   Entrar</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6">
                            <div class="panel panel-default text-center">
                                <div class="panel-heading">
                                    <span class="fa-stack fa-5x">
                                         <img src="../imagenes/docente4.png" class="img-responsive">
                                    </span>
                                </div>
                                <div class="panel-body">
                                    <h4>Mis Calificaciones</h4>
                                    <a href="mis_calificaciones.php" class="btn btn-primary"><i class="glyphicon glyphicon-download"></i>   Entrar</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6">
                            <div class="panel panel-default text-center">
                                <div class="panel-heading">
                                    <span class="fa-stack fa-5x">
                                         <img src="images/estadistica.png" class="img-responsive">
                                    </span>
                                </div>
                                <div class="panel-body">
                                    <h4>Mis Estadisticas</h4>
                                    <a href="tareas_recibidas.php" class="btn btn-primary"><i class="glyphicon glyphicon-download"></i>   Entrar</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- /.row -->

            <hr>

            <!-- Footer -->


        </div>
        <!-- /.container -->

        <!-- jQuery -->
        <script src="../js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../js/bootstrap.min.js"></script>
        <?php
        include('../includes/footer.php');
        ?>
        </body>

        </html>

        <?php
    } else {
        echo '<script> alert("No Tienes los permisos para acceder a esta pagina.");</script>';
        echo '<script> window.location="../login.php"; </script>';
    }
} else {
    echo '<script> window.location="../login.php"; </script>';
}
?>
