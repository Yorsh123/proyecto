<?php
include('../conexion.php');
$id = $_POST['id'];
$valores = mysqli_query($conexion, "SELECT * FROM carreras WHERE idCarrera = '$id'");
$valores2 = mysqli_fetch_array($valores);
$datos = array(
    0 => $valores2['NombreCarrera'],
); 
echo json_encode($datos);
?>
