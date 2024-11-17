<!DOCTYPE html>

<html class="no-js">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Politecnico</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="shortcut icon" href="imagenes/politecnico.jpg" type="image/x-icon">
    <link rel="stylesheet" href="admin/css/bootstrap.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/estilo.css">
       <link rel="shortcut icon" href="imagenes/politecnico.jpg" type="image/x-icon">

      <script src="js/jquery.js"></script>
         <link href="admin/sweetalert/sweetalert.css" rel="stylesheet">
    <script src="admin/sweetalert/sweetalert.min.js"></script>
     <script src="admin/sweetalert/sweetalert-dev.js"></script>
      <script src="js/jquery.js"></script>
</head>
<body>

    <section id="login-container" style="background-color: #868186; ">
        <div class="row">
            <div class="col-md-3" id="login-wrapper">
                <div class="panel panel-primary animated flipInY">
                    <div class="panel-heading">
                        <div  style="text-align: center;">
                            <h3 class="panel-title"> <i class="glyphicon glyphicon-off"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Acceso al Sistema </h3>  
                        </div>       
                    </div>
                    <div class="panel-body">
                   <div style="text-align: center;">
                       <img src="imagenes/politecnico.jpg"  width="150" height="160>
                   </div>
                   <br> 
                           <div  style="text-align: center;">
                             <p style="font-weight: bold"> Introduce tus datos de acceso</p>   
                           </div>                   
                        <form class="form-horizontal" role="form" method="post" action="login/validar.php">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="text" style="text-align: center;" class="form-control" name="usuario" placeholder="Introduce tu Email" required="true">
                                    <i class="fa fa-envelope"></i>
                                </div>
                            </div>
                            <div class="form-group">
                               <div class="col-md-12">
                                    <input type="password" style="text-align: center;" class="form-control" name="password" placeholder="Introduce tu Password" required="true">
                                    <i class="fa fa-lock"></i>
                                </div>
                            </div>
                            <center><h6 style="color:green;">Contacte al administrador para obtener sus credenciales de acceso</h6></center>
                            <div class="form-group">
                               <div class="col-md-12">
                               <center>
                                <input type="submit" name="Submit" value="Entrar"  class="btn btn-success" >
                                <a href="index.php" class="btn btn-danger">Salir</a>                             
                                 </center> 
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>
