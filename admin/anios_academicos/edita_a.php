<?php
include('../conexion.php');

$id = $_POST['id'];

$valores = mysqli_query($conexion, "SELECT * FROM years_academicos WHERE idYearAcademico = '$id'");
$valores2 = mysqli_fetch_array($valores);
$datos = array(
    0 => $valores2['NombreYear'],
); 
echo json_encode($datos);
?>
