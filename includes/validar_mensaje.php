<?php include ('../admin/conexion.php');

$nombre=$_POST['nombre'];
$email=$_POST['email'];
$mensaje=$_POST['mensaje'];
$fechaMensaje=date("Y-m-d");

$sql="INSERT into mensajes(Remitente,correo,Mensaje,FechaEnvio) values ('$nombre','$email','$mensaje','$fechaMensaje')";

$res=mysql_query($sql,$conexion);
if($res){ 
	echo '<script> alert("Hemos enviado tu Mensaje de forma Correcta. Gracias por tu Mensaje");</script>';
		echo '<script> window.location="../contacto.php"; </script>';
	}else {
		echo '<script> alert("Lo sentimos no pudimos mandar el mensaje");</script>';
		echo '<script> window.location="../contacto.php"; </script>';
		}
?>