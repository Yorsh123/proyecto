<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Politecnico</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/modern-business.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
       <link rel="shortcut icon" href="imagenes/politecnico.jpg" type="image/x-icon">

    <script type="text/javascript" src="fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
      <script type="text/javascript" src="fancybox/jquery.fancybox-1.3.4.js"></script>
    <link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox-1.3.4.css"/>
    <link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox.css"/>

    <script type="text/javascript" src="fancybox/jquery.easing-1.3.pack.js"></script>

</head>

<body>

<?php include('includes/menuPublico.php') ?>
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
      <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Contacto
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.php">Inicio</a>
                    </li>
                    <li class="active">Contacto</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

           <!-- Content Row -->
        <div class="row">
            <!-- Map Column -->
            <div class="col-md-8">
                <!-- Embedded Google Map -->
                <iframe width="100%" height="400px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?hl=en&amp;ie=UTF8&amp;ll=37.0625,-95.677068&amp;spn=56.506174,79.013672&amp;t=m&amp;z=4&amp;output=embed"></iframe>
            </div>
            <!-- Contact Details Column -->
            <div class="col-md-4">
                <h3>Detalles de Contacto</h3>
                <p>
                    Managua<br>Rotonda El Periodista<br>
                </p>
                <p><i class="fa fa-phone"></i> 
                    <abbr title="Phone">Telefono</abbr>: 2222-6789</p>
                <p><i class="fa fa-envelope-o"></i> 
                    <abbr title="Email">Email</abbr>: <a href="mailto:name@example.com">adminsiad@gmail.com</a>
                </p>
                <p><i class="fa fa-clock-o"></i> 
                    <abbr title="Hours">Horario</abbr>: Lunes a Viernes: 8:00 AM - 5:00 PM</p>
                <ul class="list-unstyled list-inline list-social-icons">
                    <li>
                        <a href="#"><i class="fa fa-facebook-square fa-2x" style="color:#286090"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-linkedin-square fa-2x"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-twitter-square fa-2x" style="color:#26a1ab"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-google-plus-square fa-2x" style="color:#e12330;"></i></a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /.row -->

      <div class="row">
            <div class="col-md-8">
                <h3>Envianos un Mensaje</h3>
                <form action="includes/validar_mensaje.php" method="post" >
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Nombre Completo:</label>
                            <input type="text" class="form-control" name="nombre" required="true">
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Correo Electronico:</label>
                            <input type="email" class="form-control" name="email" required="true">
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Mensaje:</label>
                            <textarea rows="5" cols="100" class="form-control" name="mensaje" style="resize:none"></textarea>
                        </div>
                    </div>
                    <div id="success"></div>
                    <!-- For success/fail messages -->
                    <button type="submit" class="btn btn-primary">Enviar Mensaje</button>
                </form>
            </div>

        </div>

        
        <!-- /.row -->

        <hr>
    </div>

  <?php
    include('includes/footer.php');
 ?>
</body>

</html>
