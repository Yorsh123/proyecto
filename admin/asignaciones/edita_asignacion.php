<?php
include('../conexion.php');
$id = $_POST['id'];
$valores = mysql_query("SELECT * FROM asignaciones WHERE idAsignacion = '$id'");
$valores2 = mysql_fetch_array($valores);
$datos = array(
				0 => $valores2['Descripcion'], 
				1 => $valores2['idDocente'], 
		        2 => $valores2['idAsignatura'], 
		        3 => $valores2['idGrupo'], 
		        4 => $valores2['idTurno'], 
		        5 => $valores2['idHorario'],
		        6 => $valores2['Estado'],
		        7 => $valores2['NumeroAsignacion'],
				); 

echo json_encode($datos);
?>