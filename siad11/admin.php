<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SIAD</title>

    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/modern-business.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body>

   <?php
include ('../includes/menuEstudiante.php');
    ?>
    <!-- Page Content -->
    <br>
    <div class="container">
        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
            <div class="col-md-3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="imagenes/admin.png" width="100" height="100"></div>
             <div class="col-md-9">         
                <h1 class="page-header">Administracion del Sitio</h1>        
             </div>                 
            </div>
        </div>
        <!-- /.row -->
        <!-- Content Row -->
        <div class="row">
            <!-- Sidebar Column -->
            <?php
            include('includes/menu_admin.php');
             ?>
            <!-- Content Column -->
            <div class="col-md-9">
                <h2>Pagina Principal</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta, et temporibus, facere perferendis veniam beatae non debitis, numquam blanditiis necessitatibus vel mollitia dolorum laudantium, voluptate dolores iure maxime ducimus fugit.</p>
            </div>
        </div>
        <!-- /.row -->
        <hr>
    </div>
 
    <script src="js/jquery.js"></script>
         <script src="js/back-to-top.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <?php
include('includes/footer.php');
 ?>
</body>
</html>
