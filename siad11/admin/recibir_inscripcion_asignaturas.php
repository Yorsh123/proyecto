<?php 
session_start();
//$codigo = $_SESSION["Codigo"];

include ('conexion.php');

$carrera=$_POST['carrera'];
$asignaturas=$_POST['asignaturas'];
$observaciones=$_POST['observaciones'];
$estudiante=$_POST['estudiante'];
$fecha = date("Y-m-d");
 
$guardar = mysqli_query($conexion, "INSERT INTO inscripciones_asignaturas (idCarrera, idAsignatura, idEstudiante, fechaInscripcion, observaciones) VALUES('$carrera', '$asignaturas','$estudiante','$fecha','$observaciones')");
					if ($guardar) {
							  echo '<script> alert("Inscripcion Realizada Correctamente.");</script>';
					       echo '<script> window.location="inscripcion_Asignaturas.php"; </script>';
					}
					else
					{
							  echo '<script> alert("Error al Inscribir la asignatura. Intente de Nuevo.");</script>';
					          echo '<script> window.location="inscripcion_Asignaturas.php"; </script>';
					}
?>