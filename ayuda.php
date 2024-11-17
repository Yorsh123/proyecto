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
       <link rel="shortcut icon" href="imagenes/politecnico.jpg" type="image/x-icon">

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

</head>

<body>

<?php include('includes/menuPublico.php') ?>
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
      <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Ayuda
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.php">Inicio</a>
                    </li>
                    <li class="active">Ayuda</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

           <!-- Content Row -->
        <div class="row">
            <!-- Map Column -->
   <h3>Ver el Manual de Usuario</h3>
   <img src="imagenes/manual.png">
   <br><br>
   <form action="includes/help.php" method="post">
       <input type="submit" name="" value="Ver Manual" class="btn btn-primary">
   </form>
        </div>
        <br><br><br><br><br><br>
        <!-- /.row -->

        
        <!-- /.row -->

        <hr>
    </div>

  <?php
    include('includes/footer.php');
 ?>
</body>

</html>
