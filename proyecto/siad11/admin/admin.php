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
            <link href="../css/bootstrap.css" rel="stylesheet">
            <link href="../css/modern-business.css" rel="stylesheet">
            <link href="../css/estilo.css" rel="stylesheet">
            <link href="../css/modern-business.css" rel="stylesheet">
            <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
            <script src="../js/jquery.js"></script>
            <script src="js/back-to-top.js"></script>
            <script src="../js/bootstrap.min.js"></script>
            <script src="estudiantes/myjava.js"></script>
        </head>
        <body>
        <?php
        include('menuAdmin.php');
        ?>
        <br>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-md-3"><img src="../imagenes/politecnico.jpg" width="80" height="80"
                                               class="img-responsive"></div>
                    <div class="col-md-6">

                        <img src="../imagenes/baner.png" class="img-responsive">

                    </div>
                    <div class="col-md-3">
                        <img class="img-responsive img-circle" src="<?php echo $foto ?>" width="50px" height="50px">
                        <h5><i class="fa fa-circle fa-stack-1x fa-inverse"
                               style="color:green; text-align: left; "></i><b> &nbsp; Online: </b><?php echo $user ?>
                        </h5>
                    </div>

                </div>
                <div class="col-lg-12">
                    <ol class="breadcrumb">
                        <li><a href="../index.php">Inicio</a>
                        </li>
                        <li class="active">Administrador</li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->
            <!-- Content Row -->
            <?php include('otros/menuAdministrador.php') ?>
        </div>
        <?php
        include('../includes/footer.php');
        ?>
        </body>
        </html>

        <?php
    } else {
        echo '<script> alert("No tienes los permisos para acceder a esta página.");</script>';
        echo '<script> window.location="../login.php"; </script>';
    }
} else {
    echo '<script> window.location="../login.php"; </script>';
}
?>
