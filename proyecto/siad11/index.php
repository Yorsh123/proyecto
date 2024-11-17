<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>POLITECNICO</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/modern-business.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
      <link rel="shortcut icon" href="imagenes/politecnico.jpg" type="image/x-icon">
</head>

<body>

<?php 

    include('includes/menuPublico.php') ?>

    <!-- Header Carousel -->
    <header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <div class="fill" style="background-image:url('imagenes/ban0.png');"></div>
                <div class="carousel-caption">
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('imagenes/ban1.png');"></div>
                <div class="carousel-caption">
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('imagenes/ban2.jpg');"></div>
                <div class="carousel-caption">
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('imagenes/ban3.jpg');"></div>
                <div class="carousel-caption">
                </div>
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>
    </header>

    <!-- Page Content -->
    <div class="container">

        <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    POLITECNICO RAFAEL SANTIAGO LOAYZA GUEVERA
                </h1>
            </div>
            <div class="col-lg-12">
                <p>
                     Bienvenidos al Sistema de Informacion Administrativo Docente
                <p>
                <br>
            </div>
             <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <img src="imagenes/profesores.png">
                    </div>
                    <div class="panel-body">
                        <h4>Docentes</h4>
                        <p>Esta seccion es solo para los docentes en la cual pueden asignar tareas, recibirlas y asignarle el puntaje correspondiente, de igual forma podra subir el material de las clases que impartio anteriormente en el aula.</p>
                        <a href="docentes/docentes.php" class="btn btn-primary"><i class="glyphicon glyphicon-download-alt"></i> Entrar</a>
                    </div>
                </div>
            </div>
             <div class="col-md-3 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <img src="imagenes/estudiantes.png">
                    </div>
                    <div class="panel-body">
                        <h4>Estudiantes</h4>
                        <p>Esta seccion es solo para los estudiantes registrados en la cual pueden subir las tareas asignadas de los docentes, recibirlas y ver el puntaje que se le asigno, ademas pueden ver y descargar material didactico</p>
                        <a href="estudiantes/estudiantes.php" class="btn btn-primary"><i class="glyphicon glyphicon-download-alt"></i> Entrar</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <img src="imagenes/admin1.png">
                    </div>
                    <div class="panel-body">
                        <h4>Administrador</h4>
                        <p>Esta seccion es solo para el administrador del SIAD, este es el encargado de administrar y supervisar todas las actividades de todos los usuarios (estudiantes y docentes) y lo relacionado con la parte academica.</p>
                        <a href="admin/admin.php" class="btn btn-primary"> <i class="glyphicon glyphicon-download-alt"></i> Entrar</a>
                    </div>
                </div>
            </div>          
        </div>
        </div>
        <!-- /.row -->
        <!-- Features Section -->
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Que puede hacer el administrador?</h2>
            </div>
            <div class="col-md-6">
                
                <ul>
                    <li><strong>Administracion de Docentes</strong></li>
                    <li><strong>Administracion de Estudiantes</strong></li>
                    <li><strong>Inscripcion de Asignaturas</strong></li>
                    <li><strong>Facilitar las evaluaciones</strong></li>
                    <li><strong>Administrar las tareas de los estudiantes y evaluarlas</strong></li>
                    <li><strong>Realizacion de Reportes Estadisticos</strong></li>
                </ul>
                <p>.</p>
            </div>
            <div class="col-md-6">
                <img class="img-responsive img-circle" src="imagenes/students.jpg" width="400" height="250"  alt="">
            </div>
        </div>
        <!-- /.row -->
   <hr>
    </div>
    <script src="js/jquery.js"></script>
     <script src="js/back-to-top.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>
    
<?php
include('includes/footer.php');
 ?>

</body>

</html>
