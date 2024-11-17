

<!DOCTYPE html>
<html lang="es">

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
    <!-- Incluir menú de navegación -->
    <?php include('../includes/menuEstudiante.php'); ?>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Administración del Sitio</h1>
            </div>
        </div>

        <!-- Formulario de registro -->
        <div class="row">
            <div class="col-md-3">
                <img src="imagenes/admin.png" width="100" height="100">
            </div>
            <div class="col-md-9">
                <h2>Registrar Nuevo Usuario</h2>
                <form action="admin.php" method="POST">
                    <!-- Campos del formulario -->
                    Nombre: <input type="text" name="nombre" required><br>
                    Correo: <input type="email" name="correo" required><br>
                    Contraseña: <input type="password" name="contraseña" required><br>
                    Nivel:
                    <select name="nivel">
                        <option value="1">Administrador</option>
                        <option value="2">Docente</option>
                        <option value="3">Estudiante</option>
                    </select><br><br>

                    <input type="submit" value="Registrar">
                </form>
            </div>
        </div>

    </div>

    <!-- Agregar scripts de JavaScript -->
    <script src="js/jquery.js"></script>
    <script src="js/back-to-top.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <?php include('includes/footer.php'); ?>
    <?php
// Verifica si se han enviado datos
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    var_dump($_POST); // Muestra todos los datos recibidos por POST
}
?>

</body>

</html>
