<?php
include('../conexion.php');
$id = $_POST['id'];
$valores = mysqli_query($conexion, "SELECT * FROM estudiantes WHERE idEstudiante = '$id'");
$valores2 = mysqli_fetch_array($valores);
$datos = array(
				0 => $valores2['CarnetEstudiante'], 
				1 => $valores2['NombresEstudiante'], 
			    2 => $valores2['ApellidosEstudiante'], 
				3 => $valores2['CedulaEstudiante'], 
				4 => $valores2['CorreoEstudiante'], 
				5 => $valores2['CelularEstudiante'], 
			    6 => $valores2['TelefonoEstudiante'], 
				7 => $valores2['DireccionEstudiante'],
				8 => $valores2['Estado'],
				9 => $valores2['IdGrupo'],
				); 
echo json_encode($datos);
?>